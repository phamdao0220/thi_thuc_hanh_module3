<?php
/**
 * Created by PhpStorm.
 * User: lananh
 * Date: 2021-04-09
 * Time: 09:40
 */

namespace App\Http\Repositories;

use App\Http\Controllers\ProductController;
use App\Models\Product;

class ProductRepository
{
function getAll(){
    return Product::orderBy('id','DESC')->paginate(5);
}
    function findById($id)
    {
        return Product::findOrFail($id);
    }

}
