<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    // public function search(Request $request)
    // {
    //     return view('search-advance');
    // }

    // public function getProductSearch(Request $request)
    // {
    //     $product = Product::query();

    //     if ($request->has('name')) {
    //         $product->where('name', 'LIKE', '%' . $request->name . '%');
    //     }

    //     if ($request->has('status')) {
    //         $product->where('status', $request->status);
    //     }
    //     if ($request->has('type')) {
    //         $product->where('type', $request->type);
    //     }

    //     if ($request->has('price')) {
    //         $product->where('price', $request->price);
    //     }

    //     $products =  $product->get();
    //     return view('search-product_result', ['products' => $products]);
    // }
}
