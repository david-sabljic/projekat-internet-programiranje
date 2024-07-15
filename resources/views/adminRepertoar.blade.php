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
            <th scope="col">predstava</th>
            <th scope="col">datum i vrijeme</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post )
          @php
              $predstave2 = DB::table('predstava')->where('id','=',$post->predstava_id)->get();
              $prtxt="";
          @endphp
          @foreach ($predstave2 as  $pr )
                @php
                    $prtxt = $prtxt.$pr->naziv;
                @endphp
          @endforeach
          <tr>
            <form action="{{route('adminRepertoarIzbrisi', ['id' => $post->id])}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$post->id}}">
                <th scope="row">{{$post->id}}</th>
                <td>{{$prtxt}}</td>
                <td>{{$post->datum_vreme}}</td>
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
                <h4 class="mb-4">Dodaj repertoar</h4>
                <form action="{{route('adminRepertoarDodaj')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="predstava">Predstava</label>
                        <select class="form-control" id="predstava" name="predstava">
                            @foreach($predstave as $predstava)
                                <option value="{{ $predstava->id }}">{{ $predstava->naziv }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group my-4">
                        <label for="datum_vrijeme">Datum i vrijeme</label>
                        <input type="datetime-local" class="form-control" id="datum_vrijeme" name="datum_vrijeme" aria-describedby="datum_vrijeme">
                    </div>
                    <button type="submit" class="btn btn-warning mt-3">Dodaj</button> 
                </form>
            </div>
        </div>
    </div>
</div>

@endsection