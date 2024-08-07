<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $interfaceName = $this->argument('name');
        $name = $interfaceName . 'Eloquent';

        $repositoryPath = app_path("Repositories/Eloquent/{$name}.php");
        $interfacePath = app_path("Repositories/Contracts/{$interfaceName}.php");

        if (File::exists($repositoryPath) || File::exists($interfacePath)) {
            $this->error("Repository or interface already exists!");
            return;
        }

        // Create the repository
        $repositoryTemplate = str_replace(
            ['{{repositoryName}}', '{{interfaceName}}'],
            [$name, $interfaceName],
            $this->getRepositoryStub()
        );

        File::ensureDirectoryExists(app_path('Repositories/Eloquent'));
        File::put($repositoryPath, $repositoryTemplate);

        // Create the interface
        $interfaceTemplate = str_replace(
            ['{{interfaceName}}'],
            [$interfaceName],
            $this->getInterfaceStub()
        );

        File::ensureDirectoryExists(app_path('Repositories/Contracts'));
        File::put($interfacePath, $interfaceTemplate);

        // binding repository
        $this->bindRepository($name, $interfaceName);

        $this->info("Repository {$name} and interface {$interfaceName} created successfully.");
    }

    protected function getRepositoryStub()
    {
        return <<<EOT
<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Traits\RepositoryTraits;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\Contracts\{{interfaceName}};

/**
 * Class {{repositoryName}}.
 *
 * @package namespace App\Repositories;
 */
class {{repositoryName}} extends BaseRepository implements {{interfaceName}}
{
    use RepositoryTraits;
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        //
    }

    public function buildQuery()
    {
        //
    }

}

EOT;
    }

    protected function getInterfaceStub()
    {
        return <<<EOT
<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface {{interfaceName}}.
 *
 * @package namespace App\Repositories\Contracts;
 */
interface {{interfaceName}} extends RepositoryInterface
{
    // Add your interface methods here
}

EOT;
    }

    protected function bindRepository($name, $interfaceName)
    {
        $providerPath = app_path('Providers/RepositoryServiceProvider.php');
        $providerContent = File::get($providerPath);

        // Prepare the new binding line
        $newBinding = "        \\App\\Repositories\\Contracts\\{$interfaceName}::class => \\App\\Repositories\\Eloquent\\{$name}::class,";

        // Insert the new binding at $repositories array
        $providerContent = preg_replace(
            '/(protected \$repositories = \[)/',
            "$1\n$newBinding",
            $providerContent
        );

        File::put($providerPath, $providerContent);
    }
}
