@extends('adminLayout')
@section('content')
 
    <div class="container bg-dark text-lifght p-5"></div>
    <div class="container w-50 py-5">
        <h1 class="text-warning">ADMIN PANEL</h1>
    </div>
    <div class="container-fluid bg-dark text-light h-100">
        <div class="container w-50 py-5">
            <form action="{{route('adminLoginPost')}}" method="POST">
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
    </div>

@endsection

