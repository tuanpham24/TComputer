{{-- extends layout --}}
@extends('client.layouts.home')

{{-- Title --}}
@section('title')
    List products
@endsection

{{-- Style --}}
@section('page-css')
    <link rel="stylesheet" href="{{asset('css/client/products/products-list.css')}}">
@endsection

{{-- section content --}}
@section('content')
    {{-- <h1>Content</h1> --}}
    {{-- <img src="{{asset(config('constrants.no_avatar_url'))}}" alt="img"> --}}

    <div class="product-detail">
        <div class="row">
            <div class="product-thumbnail col-xl-4">
                <img src="{{asset($product_detail->thumbnail)}}" alt="Img: {{$product_detail->name}}">
            </div>
            <div class="product-info col-xl-8">
                <h4>{{$product_detail->title}}</h4>
                <h4 class="col-xl-6 price text-danger"><span class="prev-price">đ</span>{{number_format($product_detail->price)}}</h4>
                
                <table class="table table-borderless">
                    <tbody>
                      <tr>
                        <td><h5>Tên</h5></td>
                        <td><h5>{{$product_detail->name}}</h5></td>
                      </tr>
                      <tr>
                        <td><h5>Cấu hình</h5></td>
                        <td><h5>{{$product_detail->configuration}}</h5></td>
                      </tr>
                      <tr>
                        <td><h5>Tình trạng</h5></td>
                        <td>
                            <h5 class="col-xl-6 status"> 
                                @php
                                    $status = $product_detail->status;
                                    if($status == 1){
                                        echo 'Hang moi';
                                    }
                                    else{
                                        echo 'Da qua su dung';
                                    }
                                @endphp
                                </h5>
                            </td>
                      </tr>
                      
                    </tbody>
                </table>

                <div class="services-option">
                    <h4>Thong tin them</h4>
                    @php
                        // Cau hinh product_status trong config/constrants.php
                        // Dung ham config de lay status ra
                        $status_flag = '';
                        if($status == 1){
                            $status_flag = 'constrants.product_status.new';
                        }
                        else{
                            $status_flag = 'constrants.product_status.used';
                        }
                    @endphp
                    <ul>
                        {{config('')}}
                        <li><h5>{{config($status_flag.'.seal')}}</h5></li>
                        <li><h5>{{config($status_flag.'.price')}}</h5></li>
                        <li><h5>{{config($status_flag.'.time')}}</h5></li>
                        <li><h5>{{config($status_flag.'.sale')}}</h5></li>
                    </ul>
                </div>

                <div class="add-cart">
                    <a class="btn" href="{{ URL::to("product/cart/add/{$product_detail->id}") }}">
                        <i class="fa-solid fa-cart-plus"></i>
                        Them vao gio hang
                    </a>
                    <a class="btn" href="{{ URL::to("product/pay")}}">Mua ngay</a>
                </div>
            </div>
        </div>
    </div>
@endsection



