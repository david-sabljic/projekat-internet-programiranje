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
            @php
              $existsInGlume = false;
            @endphp
            @foreach ($glume as $glumi)
              @if ($post->id == $glumi->glumac_id)
                @php
                  $existsInGlume = true;
                  break;
                @endphp
              @endif
            @endforeach
            <tr>
              @if ($existsInGlume)
                  <form action="{{ route('adminDodajeGlumcePredstaviIzbrisi', ['id' => $post->id , 'id2' => $id_pred]) }}" method="POST">
                      @csrf
                      <input type="hidden" name="id" value="{{ $post->id }}">
                      <th scope="row">{{ $post->id }}</th>
                      <td>{{ $post->ime }}</td>
                      <td>{{ $post->prezime }}</td>
                      <td><button class="btn btn-light btn-rounded" type="submit">izbaci</button></td>
                  </form>
              @else
                  <form action="{{ route("adminDodajeGlumcePredstaviDodaj",[$id_pred]) }}" method="POST">
                      @csrf
                      <input type="hidden" name="id_glumca" value="{{ $post->id }}">
                      <input type="hidden" name="id_predstave" value="{{ $id_pred }}">
                      <th scope="row">{{ $post->id }}</th>
                      <td>{{ $post->ime }}</td>
                      <td>{{ $post->prezime }}</td>
                      <td><button class="btn btn-light btn-rounded" type="submit">dodaj</button></td>
                  </form>
              @endif
            </tr>
          @endforeach       
        </tbody>
    </table>
</div>

@endsection