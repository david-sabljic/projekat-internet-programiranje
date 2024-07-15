<div class="d-sm-flex align-items-center justify-content-between my-4">
    <img class="img-fluid w-25 d-none d-sm-block" src="{{ asset('storage/images/' . $repertoar->slika) }}" alt="">
    <div>
        <h3 class="mx-4 my-4 text-start">{{ $repertoar->naziv }}</h3>
        <p class="mx-4 my-4 text-start"><span>Reziser: </span>{{ $repertoar->reziser }}</p>
        <p class="mx-4 my-4 text-start"><span>Datum i vrijeme: </span>{{ $repertoar->datum_vreme }}</p>
        <a href="{{ route('rezervisi.show', $repertoar->id) }}" class="btn btn-warning mx-4 my-4">Rezervisi</a>
    </div>
</div>
