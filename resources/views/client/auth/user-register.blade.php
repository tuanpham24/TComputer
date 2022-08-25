
@extends('client.auth.layouts.index')

@section('title')
    User register
@endsection

@section('style')
<style>
    .form-register{
        background-color: #346751;
        padding: 50px;
        border-radius: 15px;
    }
</style>
@endsection

@section('form')
<div class="form-register">
                                        
    @php
        if(session('status')){
            echo "<h5 class='alert alert-success text-center'>". session('status') ."</h5>";
        }
    @endphp

    <h3 class="form-title">Sign up</h3>
    
    <form action="{{route('user.register')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputName">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">I agree all statements in <a href="#!">Terms of service</a></label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection