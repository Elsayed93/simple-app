<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Http\Requests\Product\Api\StoreRequest;
use App\Http\Requests\Product\Api\UpdateRequest;
use App\Traits\ProductTrait;

class ProductsController extends Controller
{
    use ProductTrait;


    // index all products
    public function index()
    {
        $products = ProductResource::collection(Product::paginate($this->paginateNumber));
        return $this->apiResponse($products);
    }

    // show product with id 
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return $this->notFoundResponse(); // 'Not Found' with 404 status code 
        }

        return $this->apiResponse(new ProductResource($product));
    }


    // Store Product in Database
    public function store(StoreRequest $request)
    {
        $product = Product::create($request->all());

        if ($product) {
            return $this->apiResponse($product, 201);
        }

        return $this->apiResponse(null, 400, validator()->errors()); //unknown error with 400 status code 
    }

    //update the product 
    public function update(UpdateRequest $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return $this->notFoundResponse(); // 'Not Found' with 404 status code 
        }
        $product = $product->update($request->all());

        if ($product) {
            return $this->apiResponse($product);
        }

        return $this->unknownError(); // Unknown Error 
    }

    //delete product 
    public function destroy($id)
    {

        $product = Product::find($id);

        if (!$product) {
            return $this->notFoundResponse();
        }

        $product->delete();

        if ($product) {
            return $this->apiResponse(null, 200, 'Deleted Successfully');
        }

        return $this->unknownError(); // Unknown Error 
    }
}
