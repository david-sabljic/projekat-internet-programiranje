@extends('layout')

@section('content')

<section class="bg-dark text-light p-5 text-center text-sm-start">
    <div class="container">
        <h2 class="mb-4">Moje Rezervacije</h2>
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Naziv predstave</th>
                        <th scope="col">Datum i vrijeme</th>
                        <th scope="col">Broj karata</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rezervacije as $rezervacija)
                    <tr>
                        <td>{{ $rezervacija->naziv }}</td>
                        <td>{{ $rezervacija->datum_vreme }}</td>
                        <td>{{ $rezervacija->broj_karata }}</td>
                        <td>
                            <form action="{{ route('otkazi',['id' => $rezervacija->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-lg">Otkazi</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
