@extends('layout')
@section('content')

<!-- main -->
<section class="bg-dark text-light p-5 text-center text-sm-start">
    <div class="container">
        @foreach ($posts as $post )
            @php
                $glumci = DB::table('glumci')->get();
                $glume = DB::table('glumi_u_predstavi')->where('predstava_id','=',$post->id)->get();
                $stringGlume = "Igraju: ";
            @endphp
            @foreach ($glumci as $glumac )
                @foreach ($glume as $glumi )
                    @if ($glumac->id == $glumi->glumac_id)
                        @php
                            $stringGlume = $stringGlume.$glumac->ime." ".$glumac->prezime.", ";
                            break;
                        @endphp
                    @endif
                @endforeach    
            @endforeach    
            <div class="d-sm-flex align-items-center justify-conntent-between">
                <img class="img-fluid w-25 d-none d-sm-block" src="{{asset('storage/images/'.$post->slika)}}" alt="">
                <div>
                <h3 class="mx-4 my-4 text-start">{{ $post->naziv }}</h3>
                <p class="mx-4 my-4 text-start"><span>Reziser: </span>{{ $post->reziser }}</p>
                <p class="mx-4 my-4 text-start">{{$stringGlume}}</p>
                </div>
            </div>  
        @endforeach 
    </div>
</section>

@endsection