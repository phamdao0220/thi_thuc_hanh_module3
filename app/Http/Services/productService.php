<?php
/**
 * Created by PhpStorm.
 * User: lananh
 * Date: 2021-04-09
 * Time: 09:31
 */

namespace App\Services;


use App\Http\Repositories\ProductRepository;

class productService
{
protected $productRepo;
public function __construct(ProductRepository $productRepo)
{
    $this->productRepo=$productRepo;
}
function getAll(){
    return $this->productRepo->getAll();
}
    function findById($id)
    {
        return Product::findOrFail($id);
    }
    function getById($id)
    {
        return $this->productRepo->findById($id);
    }
    function store($request){
        $product = new Product();
        $product->fill($request->all());
        $product->password = Hash::make($request->password);
        $path = $this->updateLoadFile($request, 'image', 'avatar');
        $product->image = $path;
        $roles = $request->role_id;
        $this->productRepo->store($product, $roles);
    }
    function update($product, $request)
    {
        $product->fill($request->all());
        $roles = $request->role_id;
        $this->productRepo->store($product, $roles);
    }

}
