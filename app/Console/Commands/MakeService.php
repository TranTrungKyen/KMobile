<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name} {--web} {--api}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $interfaceName = $name . 'Interface';
        $type = $this->option('api') ? 'Api' : 'Web';

        $servicePath = app_path("Services/$type/{$name}.php");
        $interfacePath = app_path("Services/Contracts/{$interfaceName}.php");

        if (File::exists($servicePath) || File::exists($interfacePath)) {
            $this->error("service or interface already exists!");
            return;
        }

        // Create the service
        $serviceTemplate = str_replace(
            ['{{serviceName}}', '{{interfaceName}}', '{{type}}'],
            [$name, $interfaceName, $type],
            $this->getServiceStub()
        );

        File::ensureDirectoryExists(app_path("Services/{$type}"));
        File::put($servicePath, $serviceTemplate);

        // Create the interface
        $interfaceTemplate = str_replace(
            ['{{interfaceName}}', '{{type}}'],
            [$interfaceName, $type],
            $this->getInterfaceStub()
        );

        File::ensureDirectoryExists(app_path('Repositories/Contracts'));
        File::put($interfacePath, $interfaceTemplate);

        // binding service
        $this->bindService($name, $interfaceName, $type);

        $this->info("Repository {$name} and interface {$interfaceName} created successfully.");
    }

    protected function getServiceStub()
    {
        return <<<EOT
<?php

namespace App\Services\{{type}};

use App\Services\Contracts\{{interfaceName}};

/**
 * Class {{serviceName}}.
 *
 * @package namespace App\Services\{{type}};
 */
class {{serviceName}} implements {{interfaceName}}
{
    //
}

EOT;
    }

    protected function getInterfaceStub()
    {
        return <<<EOT
<?php

namespace App\Services\Contracts;

/**
 * Interface {{interfaceName}}.
 *
 * @package namespace App\Services\Contracts;
 */
interface {{interfaceName}}
{
    // Add your interface methods here
}

EOT;
    }

    protected function bindService($name, $interfaceName, $type)
    {
        $providerPath = app_path('Providers/ServiceServiceProvider.php');
        $providerContent = File::get($providerPath);

        // Prepare the new binding line
        $newBinding = "        \\App\\Services\\Contracts\\{$interfaceName}::class => \\App\\Services\\$type\\{$name}::class,";

        // Insert the new binding at $services array
        $providerContent = preg_replace(
            '/(protected \$services = \[)/',
            "$1\n$newBinding",
            $providerContent
        );

        File::put($providerPath, $providerContent);
    }
}

