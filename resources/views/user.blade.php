@extends('layouts.main')

@section('content')
    <section class="home-1">
        <div class="container">
            @if (Auth::check())
                @if(Auth::user()->type == 0)
            <div class="container">
                <div class="row" style="min-height:48px;">
                    <div class="col-12 mb-4 delete-multiple-btn" style="display:none;">
                        <a href="" class="mr-4 delete-multiple" data-toggle="modal" data-target="#exampleModalDelete2" style="color: red;"><i class="fa-solid fa-trash-can"></i> Eliminar archivos seleccionados</a>
                        <a href="" id="cancel_selection"><i class="fa fa-times"></i> Cancelar</a>
                    </div>
                </div>
            </div>
                @endif
            @endif

            <div class="row align-items-end">
                @php
                    $total_items = @count($folders_main);
                    $items_last_row = $total_items % 4 > 0 ? ($total_items % 4) : 4;
                @endphp
                @foreach($folders_main as $key => $value)
                    <div class="col-md-3 position-relative" id="home_folder{{ $value->id }}">
                        <div class="position-relative">
                            @if (Auth::check())   
                                @if(Auth::user()->type == 0)
                                <label class="floating-checkbox">
                                    <input type="checkbox" class="form-check-input folder_multiple" data-id="{{ $value->id }}" name="select_folder[]">
                                </label>
                                @endif
                            @endif
                            <a href="{{url('/')}}/{{$value->url}}">
                                <div class="content">
                                    <div class="img-back" style="background-image: url({{url('/')}}/img/{{$value->img}})"></div>
                                </div>
                            </a>
                        </div>
                        <div class="position-relative">
                            <p class="title menu-more" id="menu-more-{{$value->id}}"><span>{{$value->name}}</span> <a href="" class="more-link" data-id="{{$value->id}}"><img src="{{ url('img/more.png') }}" alt="" class="img-fluid"></a></p>
                            <input type="text" class="more-name form-control d-none" id="more-name-{{ $value->id }}" data-id="{{ $value->id }}" data-type="folder" value="{{$value->name}}">
                            <div class="menu-more-items {{ $key >= (count($folders_main) - $items_last_row)  ? 'last-row-4' : '' }} d-none" id="more_{{$value->id}}">
                                <a href="" class="more_name_link d-block" data-type="folder" data-id="{{ $value->id }}">Cambiar nombre</a>
                                <a href="" class="select_link" data-id="{{ $value->id }}">Selecionar</a>
                                <a class="delete delete_folder d-block link_folder_{{$value->id}}" id="{{$value->id}}" href="">Eliminar</a>    
                            </div>
                        </div>
                    </div>
                @endforeach   
            </div>
        </div>
    </section>
@endsection
