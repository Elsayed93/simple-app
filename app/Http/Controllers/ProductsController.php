<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Traits\ProductTrait;
use App\Traits\ProductImageTrait;


class ProductsController extends Controller
{
    use ProductTrait, ProductImageTrait;


    // list all products
    public function index()
    {

        $products = Product::paginate($this->paginateNumber); // >>>> handle pagination 
        return view('products.index', compact('products'));
    }


    //show a form to create a product 
    public function create()
    {
        return view('products.create');
    }


    // store product in database 
    public function store(StoreRequest $storeRequest)
    {

        $data = $storeRequest->except(['_token', 'image']);

        if ($storeRequest->hasFile('image')) {
            //save photo
            $path = 'images/products';
            $file_name = $this->saveImage($storeRequest->image, $path);

            $data['image']  = $file_name;
        }

        Product::create($data);

        return redirect()->back()->with(['updateMessage' => 'Product Updated Successfully']);
    }

    // show product with id
    public function show($id)
    {
        // find product
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    // show form to edit a product
    public function edit($id)
    {
        // find product
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back();
        }

        return view('products.edit', ['product' => $product]);
    }

    // update a product
    public function update(UpdateRequest $updateRequest, $id)
    {

        $product = Product::find($id);

        if ($updateRequest->hasFile('image')) {

            $path = 'images/products';
            $file_name = $this->saveImage($updateRequest->image, $path);
        }

        $product->name = $updateRequest->name;
        $product->price = $updateRequest->price;
        $product->details = $updateRequest->details;
        $product->image = $file_name;
        $product->save();

        return redirect()->back()->with('updatedMessage', 'product was updated successfully');
    }

    //delete a product
    public function destroy($id)
    {
        // find product
        $product = Product::find($id);
        if (!$product) {
            return 'not found error'; // >>>> handle error here
        }

        $product->delete();

        return redirect()->back()->with('deleteMessage', 'product was deleted successfully');
    }
}
