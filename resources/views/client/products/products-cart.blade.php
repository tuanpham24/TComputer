{{-- extends layout --}}
@extends('client.layouts.home')

{{-- Title --}}
@section('title')
    Cart
@endsection

{{-- Style --}}
@section('page-css')
    <link rel="stylesheet" href="{{asset('css/client/products/products-cart.css')}}">
@endsection

{{-- section content --}}
@section('content')
    <div class="cart-container">

        <form method="POST" action="{{route('cart.update')}}" >
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox"> Chon tat ca
                        </th>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
         
                <tbody>
                    @php
                        $cartTotal = 0;
                    @endphp
                    @foreach (Cart::content() as $product)
                        <tr>
                            <td>
                                <input type="checkbox">
                            </td>
                            <td>
                                <a href="{{asset(URL::to("product/detail/$product->id"))}}">
                                    <img src="{{asset('images/product/macbook-air-m1.jpeg')}}" alt="img" style="max-width: 150px">
                                </a>
                            </td>
                            <td>
                                <h5>{{$product->name}}</h5>
                                {{-- <h5>{{$product->title}}</h5> --}}
                            </td>
                            <td>
                                <h5><span class="prev-price" style="text-decoration: underline">đ</span>{{number_format($product->price)}}</h5>
                            </td>
                            <td><input type="number" min=1 style="max-width:60px; text-align: center" name="qty[{{$product->rowId}}]" value="{{$product->qty}}"></td>
                            <td>
                                @php
                                    $total = ($product->price) * ($product->qty);
                                    $tax = $total * 1/100;
                                    $total = $total + $tax;
                                @endphp
                                <h5><span class="prev-price" style="text-decoration: underline">đ</span>{{number_format($total)}}</h5>
                                <h5>
                                    <i style="opacity: 0.7; font-size: 0.75rem;">
                                    Thue BT 2% =  <span style="text-decoration: underline">đ</span>{{number_format($tax)}}
                                    </i>
                                </h5>
                            </td>
                            <td>
                                {{-- <a id="delete-btn" href="{{URL::to("product/update/quantity=/$product->rowId")}}" class="btn btn-warning">Sua</a> --}}
                                <a id="delete-btn" href="{{URL::to("product/cart/remove/$product->rowId")}}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        @php
                            $cartTotal += $total;
                        @endphp
                    @endforeach
         
                </tbody>
                {{-- <tfoot>
                    <tr>
                      <td>Total</td>
                      <td><span style="text-decoration: underline">đ</span>{{number_format($cartTotal)}}</td>
                    </tr>
                </tfoot> --}}
            </table>
            <div class="row">
                <div class="col-xl-6">
                    <button class="btn btn-warning" type="submit" name="update_btn">Update all</button>
                </div>
                <h5 class="col-xl-6" style="text-align: right; color: rgb(185, 30, 30);">Total: <span style="text-decoration: underline">đ</span>{{number_format($cartTotal)}}</h5>
            </div>
        </form>
        
    </div>

    {{-- <script>
        let deleteBtn = document.querySelector('#delete-btn')
        deleteBtn.onclick = () => {
            let isConfirm = confirm("Ban co chac chan muon xoa san pham nay?")
            if(isConfirm){
                deleteBtn.href = '{{URL::to("product/remove/$product->rowId")}}';
            }
            else{
                deleteBtn.href = "";
            }
        }
    </script> --}}
@endsection



