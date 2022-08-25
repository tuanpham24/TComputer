<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class AdminProductController extends Controller
{
    //
    function index(){

        return view('admin.dashboard');
    }

    function add(){
        return view('admin.products.ad-product-add');
    }

    function show(){
        $products = Product::all();
        return view('admin.products.ad-product-list', compact('products'));
    }
    function store(Request $request){
        $validated = $request->validate(
            [
                'name' => ['required', 'min:5', 'max:255'],
                'title' => ['required', 'min:5', 'max:255'],
                'price' => ['required', 'integer'],
                'configuration' => ['required', 'min:5', 'max:255'],
                'status' => ['required'],
                'thumbnail' => 'mimes:jpg,jpeg,png,bmp,gif,svg,mp4,qt',
                'category' => ['required'],
                'created_at' => ['required']
            ],
            [
                'required' => ':attribute khong duoc trong',
                'min' => ':attribute it nhat 2 ky tu',
                'max' => ':attribute toi da 255 ky tu',
                'integer' => ':attribute phai la so nguyen',
            ],
            [
                'name' => 'Ten san pham',
                'title' => 'Tieu de san pham',
                'price' => 'Gia san pham',
                'configuration' => 'Cau hinh san pham',
                'status' => 'Trang thai san pham',
                'thumbnail' => 'Anh san pham',
                'category' => 'Phan loai san pham',
                'created_at' => 'Thoi gian nhap kho'
            ],
        );

        $input = $request->all();

        if($request->hasFile('thumbnail')){
            $thumbnail_file = $request->file('thumbnail');

            $thumbnail_name = $thumbnail_file->getClientOriginalName();
            $thumbnail_file->move('uploads/images/products', $thumbnail_name);

            $thumbnail_path = 'uploads/images/products/'.$thumbnail_name;

            $input['thumbnail'] = $thumbnail_path;

        }
        
        Product::create($input);
        return redirect() -> route('admin.product.show');
    }
    
    function getProducts(){
        $products = Product::all();
        return view('admin.products.ad-product-list', compact('products'));
    }

    function showFormUpdate(Request $request, $id){
        $product_update = Product::find($id);
        return view('admin.products.ad-product-update', compact('product_update'));
    }

    
    function update(Request $request, $id){
        $product =  $request->all();
        if($request->hasFile('thumbnail')){
            $thumbnail_file = $request->file('thumbnail');

            $thumbnail_name = $thumbnail_file->getClientOriginalName();
            $thumbnail_file->move('uploads/images/products', $thumbnail_name);

            $thumbnail_path = 'uploads/images/products/'.$thumbnail_name;

            $product['thumbnail'] = $thumbnail_path;

        }
        unset($product['btn_add_product']);
        unset($product['_token']);
        Product::where('id', '=', $id)
            ->update($product);
        return redirect() -> route('admin.product.list');
    }

    function delete($id){
        Product::where('id', '=', $id)->delete();
        return redirect() -> route('admin.product.list');
    }
}
