<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Material | SOC Asesores</title>
    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ab58011517.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ url('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <a href="{{url('/')}}"><img src="{{url('img')}}/logo.svg" alt="" class="img-fluid"></a>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="d-inline">
                            @if (Auth::check())   
                                @if(Auth::user()->type == 0)
                                  <form action="{{url('search')}}" method="post" class="d-inline">
                                    @csrf
                                        <input type="image" src="{{url('img')}}/loupe.png" class="loupe" alt="Submit Form" />
                                        <input type="text" class="search" name="search" placeholder="Buscar">
                                    </form>                                
                                @endif
                                @else
                                    <form action="{{url('search')}}" method="post" class="d-inline">
                                    @csrf
                                        <input type="image" src="{{url('img')}}/loupe.png" class="loupe" alt="Submit Form" />
                                        <input type="text" class="search" name="search" placeholder="Buscar">
                                    </form>
                            @endif
                            
                        </div>
                         @if (Auth::check())
                        
                        <div class="d-inline">
                                @if(Auth::user()->type == 0)
                                    <a href="" class="new-folder"><img src="{{url('img')}}/folder.png" alt="">
                                        Nueva Carpeta
                                    </a> 
                                @endif            
                           
                            
                            <div class="carpeta d-none">
                                <form method="POST" enctype="multipart/form-data" id="laravel-ajax-file-upload" action="javascript:void(0)" >
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" required>
                                    <label for="imagen">Imagen</label>
                                    <input type="file" name="imagen" id="imagen">
                                    <label for="folder_main">Guardar en</label>
                                    <div id="select_folder">
                                        <select name="folder_main" id="folder_main">
                                            <option value="" select hidden></option>
                                            @foreach($folders_main as $key => $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                        <select name="folder" id="folder" class="d-none"></select>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" value="1" id="visible_2" name="visible_2" style="margin-left: -7rem;">
                                        <label class="form-check-label" for="visible_2">¿Ocultar nombre?</label>
                                    </div>
                                    <input type="submit" class="btn btn-success" value="Guardar">
                                </form>
                            </div>
                        </div>
                       
                            <div class="d-inline">
                                <a href="" class="more-files"><img src="{{url('img')}}/plus.png" alt=""> Agregar material</a>
                                <div class="carpeta_2 d-none">
                                    <form method="POST" enctype="multipart/form-data" id="file-upload" action="javascript:void(0)" >
                                        <label for="imagen_2">Imagen</label>
                                        <input type="file" name="imagen_2[]" id="imagen_2" multiple="multiple" required>
                                        <label for="folder_main_2">Guardar en</label>
                                        <div id="select_folder">
                                            <select name="folder_main_2" id="folder_main_2" required data-bank="{{ Auth::user()->id_bank; }}" data-type="{{ Auth::user()->type; }}">
                                                <option value="" select hidden></option>
                                                
                                                    @foreach($folders_main as $key => $value)
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                    @endforeach
                                                
                                            </select>
                                            <select name="folder_2" id="folder_2" class="d-none"></select>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" value="1" id="visible" name="visible" style="margin-left: -7rem;">
                                            <label class="form-check-label" for="visible">¿Ocultar nombre?</label>
                                        </div>
                                        <input type="submit" class="btn btn-success" value="Guardar">
                                    </form>
                                </div>
                            </div>        
                        @else
                        @endif
                    </div>
                </div>
            </div>
        </header>
        <main class="position-relative">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-3">
                    <div class="alert alert-success text-venter d-none" role="alert">
                        <strong>Se guardo con éxito</strong>
                    </div>
                    <div class="alert alert-danger text-center d-none" role="alert">
                        <strong>Archivo Eliminado</strong>
                    </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </main>
    </div>
</body>
    <div class="modal" id="exampleModalDelete2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center w-100" id="exampleModalLabel">¿Deseas eliminar estos archivos?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
            <a href="" class="delete-multiple-send" style="color: red" data-id=""><i class="far fa-trash-alt" aria-hidden="true"></i> Sí eliminar</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.new-folder').click(function(e){
                e.preventDefault();
                $(".carpeta").toggleClass("d-none");
                $(".carpeta_2").addClass("d-none");
            });
            $('.more-files').click(function(e){
                e.preventDefault();
                $(".carpeta_2").toggleClass("d-none");
                $(".carpeta").addClass("d-none");
            });
            $('.delete_file').click(function(e){
                e.preventDefault();
                var id = $(this).attr("id");
               $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{url('folder/delete_file')}}",
                        type: 'POST',
                        data: {
                            id: id,
                        },
                        success: function(response){
                            console.log(response)
                            if(response === "Success"){
                                $(".alert-danger").removeClass("d-none");
                                $("#files_"+id).addClass("d-none");
                                $(".link_files_"+id).addClass("d-none");
                            }else{
                                
                            }
                        }
                }); 
            });
            $('.delete_folder').click(function(e){
                e.preventDefault();
                var id = $(this).attr("id");
               $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{url('folder/delete_folder')}}",
                        type: 'POST',
                        data: {
                            id: id,
                        },
                        success: function(response){
                            if(response === "Success"){
                                $(".alert-danger").removeClass("d-none");
                                $("#folder_"+id).addClass("d-none");
                                $("#"+id).addClass("d-none");
                                $(".link_folder_"+id).addClass("d-none");
                            }else{
                                
                            }
                        }
                }); 
            });
            $('#folder_main').change(function(e){
                e.preventDefault();
                var id = $(this).val();
                $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{url('folder/form_folder')}}",
                        type: 'POST',
                        data: {
                            id: id,
                        },
                        success: function(response){
                            if(response["form_folder"][0] != null){
                                $("#folder").removeClass("d-none");
                                $("#folder").html('');
                                $("#folder").append('<option value="" select hidden></option>');
                                $.each(response["form_folder"], function(index, val) {
                                    $("#folder").append('<option value="'+val.id+'">'+val.name+'</option>');
                                });
                            }else{
                                $("#folder").addClass("d-none");
                                $("#folder").html('');
                            }
                        }
                }); 
            });

            $('#folder_main_2').change(function(e){
                e.preventDefault();
                var id = $(this).val();
                var type = $(this).attr("data-type");
                var id_bank = $(this).attr("data-bank");
                $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{url('folder/form_folder')}}",
                        type: 'POST',
                        data: {
                            id: id,
                            type: type,
                            id_bank: id_bank
                        },
                        success: function(response){
                            if(response["form_folder"][0] != null){
                                $("#folder_2").removeClass("d-none");
                                $("#folder_2").html('');
                                $("#folder_2").append('<option value="" select hidden></option>');
                                $.each(response["form_folder"], function(index, val) {
                                    $("#folder_2").append('<option value="'+val.id+'">'+val.name+'</option>');
                                });
                            }else{
                                $("#folder_2").addClass("d-none");
                                $("#folder_2").html('');
                            }
                        }
                }); 
            });

            $('#folder').change(function(e){
                e.preventDefault();
                var id = $(this).val();
                var text = $( "#folder option:selected" ).text();
                $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{url('folder/form_folder')}}",
                        type: 'POST',
                        data: {
                            id: id,
                        },
                        success: function(response){
                            if(response["form_folder"][0] != null){
                                $("#folder").removeClass("d-none");
                                $("#folder").html('');
                                $("#folder").append('<option value="" select hidden></option>');
                                $.each(response["form_folder"], function(index, val) {
                                    $("#folder").append('<option value="'+val.id+'">'+val.name+'</option>');
                                });
                                $("#folder_main").html('<option value="'+id+'" select>'+text+'</option>');
                            }else{
                                
                            }
                        }
                }); 
            });

            $('#folder_2').change(function(e){
                e.preventDefault();
                var id = $(this).val();
                var text = $( "#folder_2 option:selected" ).text();
                
                $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{url('folder/form_folder')}}",
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response){
                            if(response["form_folder"][0] != null){
                                $("#folder_2").removeClass("d-none");
                                $("#folder_2").html('');
                                $("#folder_2").append('<option value="" select hidden></option>');
                                $.each(response["form_folder"], function(index, val) {
                                    $("#folder_2").append('<option value="'+val.id+'">'+val.name+'</option>');
                                });
                                $("#folder_main_2").html('<option value="'+id+'" select>'+text+'</option>');
                            }else{
                                
                            }
                        }
                }); 
            });

            $('#file-upload').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type:'POST',
                    url: "{{ url('folder/file_insert')}}",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $(".alert-success").removeClass("d-none");
                        $(".carpeta_2").addClass("d-none");
                        console.log(data);
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            });

            $('#laravel-ajax-file-upload').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type:'POST',
                    url: "{{ url('folder/insert')}}",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $(".alert-success").removeClass("d-none");
                        $(".carpeta").addClass("d-none");
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            });
            $(".more-link").click(function(e){
                e.preventDefault();
                var id = $(this).attr("data-id");
                $(".menu-more-items").addClass("d-none");
                $("#more_"+id).removeClass("d-none");
                $(".more-name").addClass("d-none");
                $(".menu-more").removeClass("d-none");
            });
            $(".more_name_link").click(function(e){
                e.preventDefault();
                var id = $(this).attr("data-id");
                $(".menu-more").removeClass("d-none");
                $(".more-name").addClass("d-none");
                $("#more-name-"+id).removeClass("d-none");
                $("#menu-more-"+id).addClass("d-none");
            });
            $('.more-name').keypress(function(event){
              var id = $(this).attr("data-id");
              var type = $(this).attr("data-type");
              var name = $(this).val();
              var keycode = (event.keyCode ? event.keyCode : event.which);
              if(keycode == '13'){
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{route('update-file')}}",
                    type: 'POST',
                    data: {
                      id: id,
                      type: type,
                      name: name
                    },
                    success: function(response){
                      
                    },
                    error: function(xhr, textStatus, error) {
                      console.log(xhr.responseText);
                      console.log(xhr.statusText);
                      console.log(textStatus);
                      console.log(error);
                    }
                  }); 
              }
            });
            $(".delete-multiple-send").click(function(e){
              e.preventDefault();
              let archivos = [];
              let folder = [];
              $('.archivos_multiple:checked').each(function() {
                  archivos.push($(this).attr("data-id"));
              });
              $('.folder_multiple:checked').each(function() {
                  folder.push($(this).attr("data-id"));
              });
              $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{route('delete_file_multiple')}}",
                type: 'POST',
                data: {
                  archivos: archivos,
                },
                success: function(response){
                  $.each(archivos, function(index, val) {
                    $("#content_files_"+val).addClass("d-none");
                  });
                },
                error: function(xhr, textStatus, error) {
                  console.log(xhr.responseText);
                  console.log(xhr.statusText);
                  console.log(textStatus);
                  console.log(error);
                }
              });
              $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{route('delete_folder_multiple')}}",
                type: 'POST',
                data: {
                  folder: folder,
                },
                success: function(response){
                  $.each(folder, function(index, val) {
                    $("#sub_folder"+val).addClass("d-none");
                  });
                },
                error: function(xhr, textStatus, error) {
                  console.log(xhr.responseText);
                  console.log(xhr.statusText);
                  console.log(textStatus);
                  console.log(error);
                }
              });
            });
        });
    </script>
</html>
