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
            <th scope="col">naziv</th>
            <th scope="col">reziser</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post )
          @php
              $existsInIstaknuti = false;
            @endphp
            @foreach ($istaknuti as $istaknut)
              @if ($post->id == $istaknut->predstava_id)
                @php
                  $existsInIstaknuti = true;
                  break;
                @endphp
              @endif
            @endforeach
          <tr>
            @if ($existsInIstaknuti)
            <form action="{{route('adminPredstaveIzbrisi', ['id' => $post->id])}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$post->id}}">
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->naziv}}</td>
                <td>{{$post->reziser}}</td>
                <td><a class="btn btn-light btn-rounded" href="{{ route('adminDodajeGlumcePredstavi', ['id' => $post->id]) }}">dodaj glumce</a></td>
                <td><a class="btn btn-light btn-rounded" href="{{ route('adminPredstavaIzbaci', ['id' => $post->id]) }}">izbaci</a></td>
                <td><button class="btn btn-light btn-rounded" type="submit">izbrisi</button></td>
            </form>
            @else
            <form action="{{route('adminPredstaveIzbrisi', ['id' => $post->id])}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$post->id}}">
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->naziv}}</td>
                <td>{{$post->reziser}}</td>
                <td><a class="btn btn-light btn-rounded" href="{{ route('adminDodajeGlumcePredstavi', ['id' => $post->id]) }}">dodaj glumce</a></td>
                <td><a class="btn btn-light btn-rounded" href="{{ route('adminPredstavaIstakni', ['id' => $post->id]) }}">istakni</a></td>
                <td><button class="btn btn-light btn-rounded" type="submit">izbrisi</button></td>
            </form>
            @endif
        </tr>
          @endforeach       
        </tbody>
    </table>
</div>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="border border-warning py-5 px-4">
                <h4 class="mb-4">Dodaj predstavu</h4>
                <form action="{{ route('adminPredstavePost') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Naziv predstave</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Enter name">
                    </div>
                    <div class="form-group my-4">
                        <label for="reziser">Reziser</label>
                        <input type="text" class="form-control" id="reziser" name="reziser" aria-describedby="reziser" placeholder="Enter reziser">
                    </div>
                    <div class="form-group my-4">
                        <label for="slika">Slika</label>
                        <input type="file" class="form-control-file form-control-sm" id="slika" name="slika">
                    </div>
                    <button type="submit" class="btn btn-warning mt-3">Dodaj</button>
                </form>
            </div>
        </div>
    </div>
</div>

    


@endsection