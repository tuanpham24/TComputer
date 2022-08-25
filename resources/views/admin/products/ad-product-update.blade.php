{{-- Extend --}}
@extends('admin.layouts.index')

@section('title')
    Admin-Add product
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('css/admin/main.css')}}">
@endsection

@section('content')
    <div class="product-add">
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><h5><i>{{ $error }}</i></h5></li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        {{-- <form action="{{route('admin.product.update')}}" method="POST" enctype="multipart/form-data"> --}}
        <form action="{{URL::to("admin/product/update/$product_update->id")}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @php
                $id = $product_update->id;
            @endphp --}}
            <div class="row">
                <div class="col-xl-6">
                    <div class="form-group">
                        <label for="product_id" class="form-label"><h5>ID san pham</h5></label>
                        <input type="text" class="form-control" id="product_id" name="id" value="{{$product_update->id}}">
                    </div>
                    <div class="form-group">
                        <label for="product_name" class="form-label"><h5>Ten san pham</h5></label>
                        <input type="text" class="form-control" id="product_name" name="name" value="{{$product_update->name}}">
                    </div>
                    <div class="form-group">
                        <label for="product_title" class="form-label"><h5>Tieu de</h5></label>
                        <input type="text" class="form-control" id="product_title" name="title" value="{{$product_update->title}}">
                    </div>
                    <div class="form-group">
                        <label for="product_price" class="form-label"><h5>Gia</h5></label>
                        <input type="text" class="form-control" id="product_price" name="price" value="{{$product_update->price}}">
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="form-group">
                        <label for="product_status" class="form-label"><h5>Trang thai</h5></label>
                        <select class="form-select" name="status">
                            <option value="1" >Hang moi</option>
                            <option value="0">Da qua su dung</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_category" class="form-label"><h5>Phan loai</h5></label>
                        <select class="form-select" name="category">
                            <option value="1" selected >Macbook</option>
                            <option value="2">iPad</option>
                            <option value="3">DELL</option>
                            <option value="4">ASUS</option>
                            <option value="5">LENOVO</option>
                            <option value="6">Phụ kiện</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_thumbnail" class="form-label"><h5>Anh san pham</h5></label>
                        <input class="form-control" style="font-size: 1rem; color: #8B4C70;" type="file" name="thumbnail" 
                            id="product_thumbnail" 
                            value="{{$product_update->thumbnail}}">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xl-12">
                    <div class="form-group">
                        <label for="product_config" class="form-label"><h5>Cau hinh</h5></label>
                        <input type="text" class="form-control" id="product_config" name="configuration" value="{{$product_update->configuration}}">
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="form-group">
                        <label for="product_created_at" class="form-label"><h5>Ngay nhap kho</h5></label>
                        <input type="datetime-local" class="form-control" id="product_created_at" name="created_at" value="{{$product_update->created_at}}"> 
                    </div>
                </div>

                <div class="col-xl-6 align-self-center" style="text-align: left;">
                    {{-- <a href="{{ URL::to("admin/product/update/$product_update->id")}}" class="btn btn-primary btn-add-product" name="btn_add_product">Update product</a> --}}
                    <button type="submit" class="btn btn-primary btn-add-product" name="btn_add_product">Update product</button>
                </div>
            </div>
            
        </form>
    </div>
@endsection