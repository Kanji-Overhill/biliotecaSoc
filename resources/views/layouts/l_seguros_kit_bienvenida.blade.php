@extends('layouts.app')

@section('content')
<section class="home-section home-1">
    <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Kit de bienvenida</h2>
                </div>
                    <div class="col-md-4">
                        <a href="{{url('/')}}/categoria/l_seguros_redes_sociales" class="" id="" base="">
                            <div class="content-registro" style="background-image: url({{ url('img') }}/logos.png);"></div>
                            <p class="text-center">
                                Redes Sociales
                            </p>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{url('/')}}/categoria/l_seguros_stickers" class="" id="" base="">
                            <div class="content-registro" style="background-image: url({{ url('img') }}/logos.png);"></div>
                            <p class="text-center">
                                Stickers
                            </p>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{url('/')}}/categoria/l_seguros_efemerides" class="" id="" base="">
                            <div class="content-registro" style="background-image: url({{ url('img') }}/logos.png);"></div>
                            <p class="text-center">
                                Efemérides
                            </p>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{url('/')}}/categoria/l_seguros_fondos_de_pantalla" class="" id="" base="">
                            <div class="content-registro" style="background-image: url({{ url('img') }}/logos.png);"></div>
                            <p class="text-center">
                                Fondos de pantalla
                            </p>
                        </a>
                    </div>
                    <!--<div class="col-md-4">
                        <a href="{{url('/')}}/categoria/l_seguros_firma_electronica" class="" id="" base="">
                            <div class="content-registro" style="background-image: url({{ url('img') }}/logos.png);"></div>
                            <p class="text-center">
                                Firma electrónica
                            </p>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{url('/')}}/categoria/l_seguros_tarjeta_presentacion_digital" class="" id="" base="">
                            <div class="content-registro" style="background-image: url({{ url('img') }}/logos.png);"></div>
                            <p class="text-center">
                                Tarjeta de presentación digital
                            </p>
                        </a>
                    </div>-->
                    <div class="col-md-4">
                        <a href="{{url('/')}}/categoria/l_seguros_fotos_promocionales" class="" id="" base="">
                            <div class="content-registro" style="background-image: url({{ url('img') }}/logos.png);"></div>
                            <p class="text-center">
                                Galería de imágenes para diseño
                            </p>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{url('/')}}/categoria/l_seguros_videos_promocionales" class="" id="" base="">
                            <div class="content-registro" style="background-image: url({{ url('img') }}/logos.png);"></div>
                            <p class="text-center">
                                Videos promocionales
                            </p>
                        </a>
                    </div>
            </div>
    </div>
</section>

<section class="registro-section hide">
    <a href="" class="close"><i class="fas fa-times"></i></a>
    @isset($registros)
        <img class="image_registro" src="{{ url('img/registros') }}/{{$registros[0]->imagen}}" alt="">
        <h3 class="title">{{$registros[0]->nombre}}</h3>
        <p class="description">{{$registros[0]->descripcion}}</p>
        <p class="info"><span>{{$count}}</span> Archivos</p>
        <p class="date">Subido el: <span>{{date_format($registros[0]->created_at,"Y/m/d")}}</span></p>
        <a class="open" href="{{url('/')}}/registro/{{$registros[0]->url}}"><i class="fas fa-cloud-download-alt"></i></i> Abrir Carpeta</a>
        <div class="dropdown">
          <button class="dropbtn"><i class="fas fa-share"></i>Compartir</button>
          <div class="dropdown-content">
            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{$registros[0]->url}}" target="_blank"><i class="fab fa-linkedin-in"></i> Linkedin</a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{$registros[0]->url}}" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="https://twitter.com/intent/tweet?url={{$registros[0]->url}}&text=" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
          </div>
        </div>
        <a class="copy" href="{{url('/')}}/archivo/{{$registros[0]->url}}"><i class="far fa-copy"></i> Copiar vínculo</a>
        <a class="delete" id="" href=""><i class="far fa-trash-alt"></i> Eliminar</a>
    @endisset

    @empty($registros)
        <img class="image_registro" src="" alt="">
        <h3 class="title"></h3>
        <p class="description"></p>
        <p class="info"><span></span> Archivos</p>
        <p class="date">Subido el: <span></span></p>
        <a class="open" href=""><i class="far fa-folder-open"></i> Abrir Carpeta</a>
        <div class="dropdown">
          <button class="dropbtn"><i class="fas fa-share"></i>Compartir</button>
          <div class="dropdown-content">
            <a id="linkedin" href="" target="_blank"><i class="fab fa-linkedin-in"></i> Linkedin</a>
            <a id="facebook" href="" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a id="twitter" href="" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
            <a id="whatsapp" href="" target="_blank"><i class="fab fa-whatsapp"></i>Whatsapp</a>
            <a id="mailto" href=""><i class="fas fa-envelope"></i>Correo</a>
          </div>
        </div>
        <a class="copy" href="hola" ><i class="far fa-copy"></i> Copiar vínculo</a>
        <a class="delete" href="" id=""><i class="far fa-trash-alt"></i> Eliminar</a>
    @endempty
</section>
@endsection
