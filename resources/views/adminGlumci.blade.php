@extends('adminLayout')

@section('navbar')
@include('parts.adminNavbar')
@endsection

@section('content')
    
<div class="container  py-5">
    <table class="table table-sm table-dark">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">ime</th>
            <th scope="col">prezime</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post )
          <tr>
            <form action="{{route('adminGlumciIzbrisi', ['id' => $post->id])}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$post->id}}">
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->ime}}</td>
                <td>{{$post->prezime}}</td>
                <td><button class="btn btn-light btn-rounded" type="submit">izbrisi</button></td>
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
                <h4 class="mb-4">Dodaj glumca</h4>
                <form action="{{route('adminGlumciPost')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Ime</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Enter ime">
                    </div>
                    <div class="form-group my-4">
                        <label for="prezime">Prezime</label>
                        <input type="text" class="form-control" id="prezime" name="prezime" aria-describedby="prezime" placeholder="Enter prezime">
                    </div>
                    <button type="submit" class="btn btn-warning mt-3">Dodaj</button> 
                </form>
            </div>
        </div>
    </div>
</div>

@endsection