@extends('layout')

@section('content')

<section class="bg-dark text-light py-5">
    <div class="container w-50">
        <form action="{{route('loginPost')}}" method="POST">
            @csrf
            <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group my-2">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-warning my-5">Login</button>
        </form>
    </div>
</section>  

@endsection