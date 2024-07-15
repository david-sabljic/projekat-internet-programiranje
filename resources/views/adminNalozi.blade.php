@extends('adminLayout')

@section('navbar')
@include('parts.adminNavbar')
@endsection

@section('content')

<div class="container  py-5">
    <h1>Admin nalozi: </h1>
    <table class="table table-sm table-dark">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post )
          <tr>
            <form action="{{route('adminNaloziIzbrisi', ['id' => $post->id])}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$post->id}}">
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->name}}</td>
                <td>{{$post->email}}</td>
               <?php if($post->id!=1){ ?>
                    <td><button class="btn btn-light btn-rounded" type="submit">izbrisi</button></td>
                <?php }?>
            </form>
        </tr>
          @endforeach       
        </tbody>
    </table>
</div>

<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-lg-6"> 
            <div class="border border-warning py-5 px-4">
                <h4 class="mb-4">Dodaj admina</h4>
                <form action="{{route('adminNaloziPost')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Ime</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Enter ime">
                        <span style="color:red">@error('name'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group my-4">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                        <span style="color:red">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group my-4">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        <span style="color:red">@error('password'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group my-4">
                        <label for="exampleInputPassword2">Ponovite password</label>
                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name="password_confirmation">
                        <span style="color:red">@error('password_confirmation'){{$message}}@enderror</span>
                    </div>
                    <button type="submit" class="btn btn-warning mt-3">Dodaj</button> 
                </form>
            </div>
        </div>
    </div>
</div>

@endsection