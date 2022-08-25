{{-- Extend --}}
@extends('admin.layouts.index')

@section('title')
    TStore Dashboard
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('css/admin/main.css')}}">
@endsection

@section('content')
    <div class="cart-status">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card-item">
                        <h5 class="text-white">Tong san pham</h5>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card-item">
                        <h5 class="text-white">Tong san pham</h5>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card-item">
                        <h5 class="text-white">Tong san pham</h5>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card-item">
                        <h5 class="text-white">Tong san pham</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection