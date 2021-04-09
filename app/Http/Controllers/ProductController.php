<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $product=DB::table('products');
        return view('product.index',compact('product'));
    }
    public function create()
    {

        return view('product.add');

    }
    public function store(Request $request)
    {
        $product= new Product();
        $product->fill($request->all());

        $path = $request->file('image')->store('avatars','public');
        $product->image = $path;

        $product->save();
        toastr()->success('Congratulations on your successful creation!!!');
        if ($request->hasFile('image')){
            $file=$request->file('image');
            $file->storeAs('public/avatars', 'anh_' . $product->id);
        }
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit',compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->fill($request->all());

        if ($request->hasFile('image')){
            $file=$request->file('image');
            $file->storeAs('public/avatars', 'anh_' . $product->id);
            $product->image = 'avatars/anh_' . $product->id;
        }

        $product->save();
        toastr()->success('You have successfully updated your information!!!');
        return redirect()->route('product.index');

    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        try {
            $product=$this->productService->getByID($id);
            Storage::disk('public')->delete($product->image);
            $product->roles()->detach();
            $product->delete();
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            \toastr()->error('chuc nang bi loi , lien he admin');
        }
        toastr()->success('You have remove to public!');
        return redirect()->route('product.index');

    }

    public function search(Request $request)
    {
        $search= $request->search;
        $products = DB::table('products')->where('name','LIKE',"%$search%")->paginate(4);
        return view('back-end.product.index',compact('products'));
    }
//    function shopProducts(){
//        $products = DB::table('products')->get();
//        return view('front-end.shop.index',compact('products'));    }


}
