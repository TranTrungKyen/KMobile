<?php

namespace App\Services\Web;

use App\Repositories\Contracts\BrandRepository;
use App\Services\Contracts\BrandServiceInterface;
use App\Traits\FileTrait;

/**
 * Class BrandService.
 *
 * @package namespace App\Services\Web;
 */
class BrandService implements BrandServiceInterface
{
    use FileTrait{
        delete as traitDelete;
    }

    protected $repository;

    public function __construct(BrandRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll() 
    {
        return $this->repository->all();
    }

    public function getBrand($id) 
    {
        return $this->repository->find($id);
    }

    public function store($request) 
    {
        $path = null;
        if ($request->hasFile('path')) {
            $path = $this->upload($request->file('path'), AVT_URL['STORAGE_PATH']);
        }

        $data = [
            'name' => $request->name,
            'path' => $path,
        ];

        return $this->repository->create($data);
    }

    public function update($request, $id) 
    {
        $brand = $this->repository->firstById($id);
        $path = $brand->path;
        if ($request->hasFile('path')) {
            if (!is_null($brand->avatar)) {
                $this->traitDelete($brand->avatar);
            }
            $path = $this->upload($request->file('path'), AVT_URL['STORAGE_PATH']);
        }

        $data = [
            'name' => $request->name,
            'path' => $path,
        ];

        return $this->repository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function getBrandsOrderByQtyProduct()
    {
        return $this->repository->withCount(['products' => function ($query) {
                                        $query->where('active', true);
                                    }])
                                    ->orderBy('products_count', 'desc')
                                    ->get();
    }
}
