@extends('layouts.main')

@section('content')
    <section class="folder-1 {{$url_folder}}">
        <h1 class="{{$url_folder}}">
            {{$title_folder}}
        </h1>
        <div class="container">
            <div class="row align-items-start">
                @foreach($sub_folders as $key => $sub_folder)
                    @if (isset($sub_folder->id_folder))
                        @if ($id_folder === $sub_folder->id_folder)
                            <div class="col-md-2">
                                <a href="{{url('/')}}/folder/{{$sub_folder->url}}" id="folder_{{$sub_folder->id}}">
                                    <div class="content text-center" style="box-shadow: 0px 3px 6px #00000029; border-radius: 5px; padding: 10px">
                                        <img src="{{url('img')}}/{{$sub_folder->img}}" class="img-fluid" alt="">
                                        @if ($sub_folder->hide == 0)
                                                                    <p>{{$sub_folder->name}}</p>
                                                                @endif
                                    </div>
                                </a>
                                @if (Auth::check())
                                                            <a class="delete delete_folder text-center link_folder_{{$sub_folder->id}}" id="{{$sub_folder->id}}" href=""><i class="far fa-trash-alt"></i></a>                 
                                                        @else
                                                        @endif
                            </div>
                        @endif
                    @endif
                @endforeach
            </div> 
            <div class="row align-items-start">
                @foreach($archives as $key => $archives)
                    @if (isset($archives->id_folder))
                        @if ($id_folder === $archives->id_folder)
                            <div class="col-md-2">
                                <a href="{{url('img')}}/archivos/{{$archives->img}}" id="files_{{$archives->id}}" target="_blank">
                                    <div class="content text-center">
                                        @php
                                            $imagen = explode(".", $archives->img);
                                            if (end($imagen) == "jpg" || end($imagen) == "png" || end($imagen) == "jpeg") {
                                                $registro_imagen = "archivos/".$archives->img;
                                            }else if ($imagen[1] == "pdf") {
                                                $registro_imagen = "/icons/pdf.png";
                                            }else if ($imagen[1] == "3ds") {
                                                $registro_imagen = "/icons/3ds.png";
                                            }else if ($imagen[1] == "jpeg") {
                                                                            $registro_imagen = "/icons/jpg.png";
                                                                        }else if ($imagen[1] == "aac") {
                                                $registro_imagen = "/icons/aac.png";
                                            }else if ($imagen[1] == "ai") {
                                                $registro_imagen = "/icons/ai.png";
                                            }else if ($imagen[1] == "avi") {
                                                $registro_imagen = "/icons/avi.png";
                                            }else if ($imagen[1] == "bmp") {
                                                $registro_imagen = "/icons/bmp.png";
                                            }else if ($imagen[1] == "cad") {
                                                $registro_imagen = "/icons/cad.png";
                                            }else if ($imagen[1] == "cdr") {
                                                $registro_imagen = "/icons/cdr.png";
                                            }else if ($imagen[1] == "css") {
                                                $registro_imagen = "/icons/css.png";
                                            }else if ($imagen[1] == "dat") {
                                                $registro_imagen = "/icons/dat.png";
                                            }else if ($imagen[1] == "dll") {
                                                $registro_imagen = "/icons/dll.png";
                                            }else if ($imagen[1] == "dmg") {
                                                $registro_imagen = "/icons/dmg.png";
                                            }else if ($imagen[1] == "doc") {
                                                $registro_imagen = "/icons/doc.png";
                                            }else if ($imagen[1] == "eps") {
                                                $registro_imagen = "/icons/eps.png";
                                            }else if ($imagen[1] == "fla") {
                                                $registro_imagen = "/icons/fla.png";
                                            }else if ($imagen[1] == "flv") {
                                                $registro_imagen = "/icons/flv.png";
                                            }else if ($imagen[1] == "gif") {
                                                $registro_imagen = "/icons/gif.png";
                                            }else if ($imagen[1] == "html") {
                                                $registro_imagen = "/icons/html.png";
                                            }else if ($imagen[1] == "indd") {
                                                $registro_imagen = "/icons/indd.png";
                                            }else if ($imagen[1] == "iso") {
                                                $registro_imagen = "/icons/iso.png";
                                            }else if ($imagen[1] == "js") {
                                                $registro_imagen = "/icons/js.png";
                                            }else if ($imagen[1] == "midi") {
                                                $registro_imagen = "/icons/midi.png";
                                            }else if ($imagen[1] == "mov") {
                                                $registro_imagen = "/icons/mov.png";
                                            }else if ($imagen[1] == "mp3") {
                                                $registro_imagen = "/icons/mp3.png";
                                            }else if ($imagen[1] == "mpg") {
                                                $registro_imagen = "/icons/mpg.png";
                                            }else if ($imagen[1] == "php") {
                                                $registro_imagen = "/icons/php.png";
                                            }else if ($imagen[1] == "ppt") {
                                                $registro_imagen = "/icons/ppt.png";
                                            }else if ($imagen[1] == "pptx") {
                                                $registro_imagen = "/icons/ppt.png";
                                            }else if ($imagen[1] == "ps") {
                                                $registro_imagen = "/icons/ps.png";
                                            }else if ($imagen[1] == "psd") {
                                                $registro_imagen = "/icons/psd.png";
                                            }else if ($imagen[1] == "raw") {
                                                $registro_imagen = "/icons/raw.png";
                                            }else if ($imagen[1] == "sql") {
                                                $registro_imagen = "/icons/sql.png";
                                            }else if ($imagen[1] == "svg") {
                                                $registro_imagen = "/icons/svg.png";
                                            }else if ($imagen[1] == "tif") {
                                                $registro_imagen = "/icons/tif.png";
                                            }else if ($imagen[1] == "txt") {
                                                $registro_imagen = "/icons/txt.png";
                                            }else if ($imagen[1] == "wmv") {
                                                $registro_imagen = "/icons/wmv.png";
                                            }else if ($imagen[1] == "xls") {
                                                $registro_imagen = "/icons/xls.png";
                                            }else if ($imagen[1] == "xlsx") {
                                                $registro_imagen = "/icons/xls.png";
                                            }else if ($imagen[1] == "xml") {
                                                $registro_imagen = "/icons/xml.png";
                                            }else if ($imagen[1] == "zip") {
                                                $registro_imagen = "/icons/zip.png";
                                            }else if ($imagen[1] == "mp4") {
                                                $registro_imagen = "/icons/mp4.png";
                                            }else{
                                                $registro_imagen = "document.png";
                                            }
                                        @endphp
                                        <img src="{{url('img')}}/{{$registro_imagen}}" class="img-fluid" alt="">
                                        @if ($archives->hide == 0)
                                            <p> {{$archives->img}}     </p>     
                                        @else
                                      @endif
                                    </div>
                                </a>
                                 @if (Auth::check())
                                                                <a class="delete delete_file text-center link_files_{{$archives->id}}" id="{{$archives->id}}" href=""><i class="far fa-trash-alt"></i></a>                 
                                                            @else
                                                            @endif
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
