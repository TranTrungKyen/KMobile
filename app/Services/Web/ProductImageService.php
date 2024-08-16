<?php

namespace App\Services\Web;

use App\Repositories\Contracts\ProductImageRepository;
use App\Services\Contracts\ProductImageServiceInterface;
use App\Traits\FileTrait;
use Illuminate\Support\Facades\Log;

/**
 * Class ProductImageService.
 *
 * @package namespace App\Services\Web;
 */
class ProductImageService implements ProductImageServiceInterface
{
    use FileTrait{
        delete as traitDelete;
    }

    protected $repository;

    public function __construct(ProductImageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store($dataProductDetailForm, $productId)
    {
        try {
            if ($dataProductDetailForm->hasFile('product_images')) {
                foreach ($dataProductDetailForm->file('product_images') as $image) {
                    $path = $this->upload($image, AVT_URL['STORAGE_PATH']);
                    $data = [
                        'product_id' => $productId,
                        'path' => $path,
                    ];

                    $this->repository->create($data);
                }
            }
        } catch (\Exception $e) {
            // Log the error or handle it
            Log::error('Lỗi tải tệp: ' . $e->getMessage());
            return false;
        }
        return true;
    }
}
