@extends('layouts.main')

@section('content')
    <section class="home-1">
        <div class="container">
            <div class="row align-items-end">
                @foreach($folders_main as $key => $value)
                    <div class="col-md-3 position-relative">
                        <a href="{{url('/')}}/{{$value->url}}">
                            <div class="content">
                                <div class="img-back" style="background-image: url({{url('/')}}/img/{{$value->img}})"></div>
                            </div>
                        </a>
                        <p class="title menu-more" id="menu-more-{{$value->id}}">{{$value->name}} <a href="" class="more-link" data-id="{{$value->id}}"><img src="{{ url('img/more.png') }}" alt="" class="img-fluid"></a></p>
                        <input type="text" class="more-name form-control d-none" id="more-name-{{ $value->id }}" data-id="{{ $value->id }}" data-type="folder" value="{{$value->name}}">
                        <div class="menu-more-items d-none" id="more_{{$value->id}}">
                            <a href="" class="more_name_link d-block" data-type="folder" data-id="{{ $value->id }}">Cambiar nombre</a>
                            <a class="delete delete_folder d-block text-center link_folder_{{$value->id}}" id="{{$value->id}}" href="">Eliminar</a>    
                        </div>
                    </div>
                @endforeach   
            </div>
        </div>
    </section>
@endsection
