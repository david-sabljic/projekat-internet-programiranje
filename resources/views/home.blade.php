@extends('layout')

@section('content')
    
    <!-- showcase -->
    <section class="bg-dark text-light p-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-conntent-between">
                <div>
                <h1>Dobrodošli u <span class="text-warning">pozorište Jazavac</span></h1>
                <p class="lead my-4">Gradsko pozorište Jazavac osnovano je 2006. godine kao neprofitna organizacija sa ciljem da postane pozorište jasnog i prepoznatljivog 
                    identiteta, prije svega kroz vlastitu produkciju i prikazivačku djelatnost, a zatim i kroz ostale programske djelatnosti.</p>
                <a href="{{route('about')}}"><button class="btn btn-warning btn-lg">porcitaj vise</button></a>
                </div>
                    <img class="img-fluid w-50 d-none d-sm-block" src="https://cdn-icons-png.freepik.com/512/212/212813.png" alt="">
            </div>
        </div>
    </section>

    <!-- divaider -->
    <section class="bg-warning p-5">
        <div class="container"></div>
    </section>

    <!-- boxes -->
    <section class="p-5 bg-dark">
        <div class="container ">
            <div class="row justify-content-around p-4 text-center mb-4">
                @foreach ($posts as $post)
                    @php
                        $glumci = DB::table('glumci')->get();
                        $glume = DB::table('glumi_u_predstavi')->where('predstava_id','=',$post->id)->get();
                        $stringGlume = "Igraju: ";
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
                    @if ($existsInIstaknuti)
                        <div class="col-md-4 d-flex align-items-stretch mb-4">
                            <div class="card bg-dark border-warning text-light w-100">
                                <img src="{{asset('storage/images/'.$post->slika)}}" class="card-img-top" alt="greska">
                                <div class="card-body">
                                    <h4>{{ $post->naziv }}</h4>
                                    <p class="card-text">{{$stringGlume}}</p>
                                    <p class="card-text"><span>Reziser: </span>{{ $post->reziser }}</p>
                                    <a href="{{ route('oPredstavi', ['id' => $post->id]) }}" class="btn btn-warning">procitaj vise</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        
    </section>
@endsection
