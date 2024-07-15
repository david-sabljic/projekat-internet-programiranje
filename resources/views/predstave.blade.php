@extends('layout')

@section('content')



    <section class="bg-dark text-light p-5 text-center text-sm-start">
        <div class="contsiner">
            <div class="row justify-content-start p-4 text-center mb-4">
                @foreach ($posts as $post)
                    <div class="col-md-auto col align-self-start mb-4">
                        <a href="{{ route('oPredstavi', ['id' => $post->id]) }}" style="text-decoration: none;">
                        <div class="card bg-dark border-warning text-light" style="width: 18rem;">
                            <img src="{{asset('storage/images/'.$post->slika)}}" alt="greska">
                            <div class="card-body">
                                <h4>{{ $post->naziv }}</h4>
                                <p class="card-text"><span>Reziser: </span>{{ $post->reziser }}</p>
                            </div>
                        </div></a>
                    </div>
                @endforeach
        </div>
    </section>
    
@endsection
