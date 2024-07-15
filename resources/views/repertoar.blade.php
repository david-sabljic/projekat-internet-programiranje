@extends('layout')

@section('content')

<!-- main -->
<section class="bg-dark text-light p-5 text-center text-sm-start">
    <div class="container">
        @foreach ($repertoars as $repertoar)
            @include('parts.repertoar', ['repertoar' => $repertoar])
        @endforeach 
    </div>
</section>

@endsection
