<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;

class ProductController extends Controller
{
    //
    function index(){
        $products = Product::all();
        return view('client.products.products-list', compact('products'));
    }

    function detail($id){
        $product_detail = Product::findOrFail($id);
        return view('client.products.products-detail', compact('product_detail'));
    }

    function getListForCategory($category){
        $list_category = Product::where('category', '=', $category)->get();
        // return $list_category;
        return view('client.products.products-list-category', compact('list_category'));
    }

    function getAmountSold($product_id){
        $products_sale = Sale::find($product_id)->sale;
        return view('client.products.products-list', compact('products_sale'));
    }
    
}
