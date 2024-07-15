@extends('layout')

@section('content')


<section class="bg-dark text-light py-5">
    <div class="container w-50">
        <form action="{{route('registerPost')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" name="name">
                <span style="color:red">@error('name'){{$message}}@enderror</span>
            </div>
            <div class="form-group my-2">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
            <span style="color:red">@error('email'){{$message}}@enderror</span>
            </div>
            <div class="form-group my-2">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            <span style="color:red">@error('password'){{$message}}@enderror</span>
            </div>
            <div class="form-group my-2">
                <label for="exampleInputPassword2">Ponovite password</label>
                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name="password_confirmation">
                <span style="color:red">@error('password_confirmation'){{$message}}@enderror</span>
            </div>
            <button type="submit" class="btn btn-warning my-5">Register</button>
        </form>
    </div>
</section>  
    
@endsection