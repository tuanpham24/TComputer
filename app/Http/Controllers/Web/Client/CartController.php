<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //
    function index(){
        return view('client.products.products-cart');
    }
    function add(Request $request, $id){
        // Cart::destroy();
        $product = Product::find($id);
        Cart::add([
            'id' => $product->id, 
            'name' => $product->name, 
            // 'color' => 'gray',
            'qty' => 1, 
            'price' => $product->price
        ]);

        return redirect()->route('products.cart');
    }

    function update(Request $request){
        // Cart::update($rowId, ['qty' => '']);
        $dataUpdated = $request->get('qty');
        // return $dataUpdated;
        foreach($dataUpdated as $key => $value){
            Cart::update($key, $value);
        }
        return redirect() -> route('products.cart');
    }

    function remove($rowId){
        Cart::remove($rowId);
        return redirect()-> route('products.cart');
    }

    function pay(){
        // $total_bill = C
    }
}

