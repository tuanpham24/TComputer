
@extends('client.auth.layouts.index')

@section('title')
    User register
@endsection

@section('style')
<style>
    .form-login{
        background-color: #346751;
        padding: 20px;
        border-radius: 15px;
        color: #fff
    }
</style>
@endsection

@section('form')
<div class="form-login">
    
        @php
            if(session('status')){
                echo "<h4 class='alert alert-danger'>".session('status') . "</h4>";
            }
        @endphp
    <form action="{{route('user.login')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Log in</button>
    </form>
</div>
@endsection