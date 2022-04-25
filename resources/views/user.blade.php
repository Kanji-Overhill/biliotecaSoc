@extends('layouts.main')

@section('content')
    <section class="home-1">
        <div class="container">
            <div class="row align-items-end">
                @foreach($folders_main as $key => $value)
                    <div class="col-md-3">
                        <a href="{{url('/')}}/{{$value->url}}">
                            <div class="content">
                                <div class="img-back" style="background-image: url({{url('/')}}/img/{{$value->img}})"></div>
                                <p class="title">{{$value->name}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach   
            </div>
        </div>
    </section>
@endsection
