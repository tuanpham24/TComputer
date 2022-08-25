{{-- Extend --}}
@extends('admin.layouts.index')

@section('title')
    Admin - List product
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('css/admin/main.css')}}">

@endsection

@section('content')
    <div class="container-fluid">
        <div class="product-list">
            {{-- <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><h5>ID</h5></th>
                        <th scope="col"><h5>Name</h5></th>
                        <th scope="col"><h5>Title</h5></th>
                        <th scope="col"><h5>Price</h5></th>
                        <th scope="col"><h5>Configuration</h5></th>
                        <th scope="col"><h5>Status</h5></th>
                        <th scope="col"><h5>Category</h5></th>
                        <th scope="col"><h5>Create at</h5></th>
                        <th scope="col"><h5>Updated at</h5></th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($products as $product)
                        <tr>
                            <td><h5>{{$product->id}}</h5></td>
                            <td><h5>{{$product->name}}</h5></td>
                            <td><h5>{{$product->title}}</h5></td>
                            <td><h5>{{$product->price}}</h5></td>
                            <td><h5>{{$product->configuration}}</h5></td>
                            <td><h5>{{$product->status}}</h5></td>
                            <td><h5>{{$product->category}}</h5></td>
                            <td><h5>{{$product->created_at}}</h5></td>
                            <td><h5>{{$product->updated_at}}</h5></td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table> --}}
            
            @foreach ($products as $product)

            <div class="row item"  style="border-bottom: 1px solid #bfc6cb; padding: 15px 0px;">
                
                    <div class="col-xl-4">
                        <img src="{{asset($product->thumbnail)}}" width="90%" alt="Image: {{$product->name}}">
                    </div>
                    <div class="col-xl-8">
                        {{-- <form action="{{route('admin.product.delete')}}" method="POST"> --}}
                            <ul>
                                <li><h5><span>ID:</span> {{$product->id}}</h5></li>
                                <li><h5><span>Name:</span> {{$product->name}}</h5></li>
                                <li><h5><span>Title:</span> {{$product->title}}</h5></li>
                                <li><h5><span>Price:</span> {{number_format($product->price)}}</h5></li>
                                <li><h5><span>Configuration:</span> {{$product->configuration}}</h5></li>
                                <li><h5><span>Status:</span> {{$product->status}}</h5></li>
                                <li><h5><span>Category:</span> {{$product->category}}</h5></li>
                                <li><h5><span>Created at:</span> {{$product->created_at}}</h5></li>
                                <li><h5><span>Update at:</span> {{$product->updated_at}}</h5></li>
                            </ul>
                            
                            <div class="function-group">
                                <a href="{{ URL::to("admin/product/getupdate/$product->id")}}" class="btn btn-warning">Update</a>
                                <a href="{{ URL::to("admin/product/delete/$product->id")}}" class="btn btn-danger">Delete</a>
                                {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                            </div>
                        {{-- </form> --}}

                    </div>

            </div>

            @endforeach

            {{-- <table class="table">
                <tbody>
                    <tr>
                        <td><h5>ID</h5></td>
                        <td><h5>{{$product->id}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5>Tên</h5></td>
                        <td><h5>{{$product->name}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5>Title</h5></td>
                        <td><h5>{{$product->title}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5>Price</h5></td>
                        <td><h5>{{number_format($product->price)}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5>Configuration</h5></td>
                        <td><h5>{{$product->configuration}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5>Status</h5></td>
                        <td><h5>{{$product->status}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5>Category</h5></td>
                        <td><h5>{{$product->category}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5>Created at</h5></td>
                        <td><h5>{{$product->created_at}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5>Updated ar</h5></td>
                        <td><h5>{{$product->updated_at}}</h5></td>
                    </tr>
                </tbody>
            </table> --}}
        </div>
    </div>
@endsection