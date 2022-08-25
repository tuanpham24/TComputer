{{-- extends layout --}}
@extends('client.layouts.home')

{{-- Title --}}
@section('title')
    Home
@endsection

{{-- Style --}}
@section('page-css')
    <link rel="stylesheet" href="{{asset('css/client/products/products-list.css')}}">
@endsection

{{-- section content --}}
@section('content')
    {{-- product carousel --}}
    <div class="banner">
        <div class="row">
            <div class="col-xl-3">
                <div class="banner-sidebar">
                    {{-- <div class="container-fluid"> --}}
                        <ul class="sidebar-list" style="padding: 0; margin: 0; list-style: none;">
                            <li><a href="{{asset(URL::to("product/list-category/". config('constrants.product_category.macbook') ))}}">Macbook</a></li>
                            <li><a href="{{asset(URL::to("product/list-category/". config('constrants.product_category.ipad') ))}}">iPad</a></li>
                            <li><a href="{{asset(URL::to("product/list-category/". config('constrants.product_category.dell') ))}}">DELL</a></li>
                            <li><a href="{{asset(URL::to("product/list-category/". config('constrants.product_category.asus') ))}}">ASUS</a></li>
                            <li><a href="{{asset(URL::to("product/list-category/". config('constrants.product_category.lenovo') ))}}">LENOVO</a></li>
                            <li><a href="{{asset(URL::to("product/list-category/". config('constrants.product_category.accessory') ))}}">Phụ kiện</a></li>
                        </ul>
                    {{-- </div> --}}
                </div>
            </div>

            <div class="col-xl-9 product-carousel">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($products as $productKey => $productValue)
                            <div class="carousel-item {{$productKey == 0 ? 'active' : ''}}">
                                <div class="row">
                                    <div class="col-xl-4 slider-thumbnail">
                                        <img src="{{asset($productValue->thumbnail)}}" alt="img" width="250px" height="250px">
                                    </div>
                                    <div class="col-xl-8 slider-info">
                                        <h4 class="item">{{$productValue->name}}</h4>
                                        <ul>
                                            <li><h5 class="item">{{$productValue->configuration}}</h5></li>
                                            <li>
                                                <h5 class="item">
                                                    <span class="prev-price">đ</span>
                                                    {{number_format($productValue->price)}}
                                                </h5>
                                            </li>
                                        </ul>
                                        {{-- <h4 class="item">{{$productValue->name}}</h4> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">>Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            
        </div>
    </div>
    {{-- end carousel --}}

    <div class="list-products">
        <div class="row">
            @php
                // Get current year
                $current_year = now()->year;
            @endphp

            @foreach ($products as $product)
                <div class="col-xl-2 col-md-2 col-sm-3 col-4 col">
                    <div class="product-item">
                        {{-- @php
                            echo  App\Http\Controllers\Web\Client\ProductController::getAmountSold($products->id);
                            echo $products_sale;
                        @endphp --}}
                        <div class="product-thumb">
                            @if ($product->created_at->year == $current_year)
                                <div class="product-label success"><i>Mới về</i></div>
                            @endif
                            
                            {{-- ??????????????????? Xem xet lai --}}
                            @if ($product->price < 25000000 && $product->category == 1)
                                <div class="product-label hot"><i>Bán chạy</i></div>
                            @endif

                            <img class="img-fluid" src="{{asset($product->thumbnail)}}" alt="{{$product->name}}">
                        </div>
                        <div class="product-info">
                            <p class="product-name">
                                {{-- Truncate string : Dai hon 20 ky tu -> '...' --}}
                                {{ \Illuminate\Support\Str::limit($product->name, 20, $end='...') }}
                            </p>
                            <p class="product-title">
                                {{-- Truncate string : Dai hon 20 ky tu -> '...' --}}
                                {{ \Illuminate\Support\Str::limit($product->title, 20, $end='...') }}
                            </p>
                            <div>
                                @php
                                    $old_price = $product->price + 1200000;
                                @endphp
                                <p class="price text-danger"><span class="prev-price">đ</span>{{number_format($product->price)}}</p>
                                @if ($product->status == 1)
                                    <p class="price price-old"><span class="prev-price">đ</span><i>{{number_format($old_price)}}</i></p>
                                @endif
                                
                            </div>
                        </div>
                        <div class="show-detail">
                            <a href="{{ URL::to("product/detail/{$product->id}") }}">Xem chi tiet</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection





