@extends('layout')

@section('content')

<!-- main -->
<section class="bg-dark text-light p-5 text-center text-sm-start">
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between my-4">
            <img class="img-fluid w-25 d-none d-sm-block" src="{{ asset('storage/images/' . $repertoar->slika) }}" alt="">
            <div>
                <h3 class="mx-4 my-4 text-start">{{ $repertoar->naziv }}</h3>
                <p class="mx-4 my-4 text-start"><span>Reziser: </span>{{ $repertoar->reziser }}</p>
                <p class="mx-4 my-4 text-start"><span>Datum i vrijeme: </span>{{ $repertoar->datum_vreme }}</p>
                @auth
                    <div class="mx-4 my-4">
                        <form action="{{ route('rezervisi') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="repertoar_id" value="{{ $repertoar->id }}">
                            <div class="form-group my-2">
                                <label for="broj_karata">Broj karata</label>
                                <input type="number" class="form-control" id="broj_karata" name="broj_karata" min="1" max="10" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Potvrdi rezervaciju</button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-warning mx-4 my-4">Rezervisi</a>
                @endauth
            </div>
        </div>
    </div>
</section>

@endsection
