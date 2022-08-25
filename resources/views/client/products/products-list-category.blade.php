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


    <div class="list-products">
        <div class="row">
            @php
                // Get current year
                $current_year = now()->year;
            @endphp

            @foreach ($list_category as $product)
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





