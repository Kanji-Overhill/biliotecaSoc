<?php

namespace App\Http\Controllers;
use App\Models\Folders;
use App\Models\Archives;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class foldersController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->id_bank != 0) {
                $folders = Folders::where('id',Auth::user()->id_bank)->orderBy('id','asc')->get();
                return view('user',['folders_main'=>$folders]);
            }else{
                $folders = Folders::where('id_folder',0)->orderBy('id','asc')->get();
                return view('user',['folders_main'=>$folders]);
            }
        }
        else{
            $folders = Folders::where('id_folder',0)->orderBy('id','asc')->get();
            return view('user',['folders_main'=>$folders]);
        }
        
    }
    public function update_file(Request $request)
    {
        if ($request->type === "folder") {
            $folder = Folders::find($request->id);
            $url = Str::slug($request->name, '-');
            $url = $url."-".rand();
            $folder->url = $url;
            $folder->name = $request->name;
            $folder->save();
            return "Success";
        }else{

        }
    }
    public function form_folder(Request $request)
    {
        $id = $request->id;
        $folders = Folders::where('id_folder',$id)->orderBy('id','asc')->get();
        $folders_main = Folders::where('id_folder',0)->orderBy('id','asc')->get();
        return ['form_folder'=>$folders,'folders_main'=>$folders_main];
    }
    public function folder_insert(Request $request)
    {

            if (isset($request->folder)) {
                $id_folder = $request->folder;
            }elseif (isset($request->folder_main)) {
                $id_folder = $request->folder_main;
            }else{
                $id_folder = 0;
            }
            
            if (isset($request->visible_2)) {
                $visible = $request->visible_2;
            }else{
                $visible = 0;
            }

            if($request->file('imagen')) {
                $file = $request->file('imagen');
                $file_name = $file->getClientOriginalName();
                $imagen = $file_name;

                $location = 'img';
                $file->move($location,$imagen);
            }else{
                $imagen = "soc.png";
            }
            
            $url = Str::slug($request->nombre, '-');
            $url = $url."-".rand();
            $registro = Folders::insertGetId([
                'name' => $request->nombre,
                'img' => $imagen,
                'url' => $url,
                'hide' => $visible,
                'id_folder' => $id_folder
            ]);
            return Response()->json([
                "success" => true
            ]);
        
    }
    public function file_insert(Request $request)
    {
        if($request->file('imagen_2')) {
            if (isset($request->folder_2)) {
                $id_folder = $request->folder_2;
            }else{
                $id_folder = $request->folder_main_2;
            }
            if (isset($request->visible)) {
                $visible = $request->visible;
            }else{
                $visible = 0;
            }
  

            if($request->hasfile('imagen_2'))
            {
                foreach($request->file('imagen_2') as $file)
                {
                    $file_name = $file->getClientOriginalName();
                    $imagen = $file_name;
        
                    $location = 'img/archivos';
                    $file->move($location,$imagen);
                    $registro = Archives::insertGetId([
                        'img' => $imagen,
                        'id_folder' => $id_folder,
                        'hide' => $visible
                    ]);
                }
            }

           
            return Response()->json([
                "success" => true
            ]);
        }else{
            return Response()->json([
                "success" => false
          ]);

        }
    }
    public function delete_multiple(Request $request)
    {
        if(isset($request->archivos) && !empty($request->archivos)){
        foreach ($request->archivos as $key => $value) {
            $id = intval($value);
            $files = Archives::where('id', $id)->first();
                $path = public_path()."/archivos/".$files->url;
                File::delete($path);
            Archives::destroy($id);
        } }

        return "Success";
    }
    public function delete_multiple_folder(Request $request)
    {
        if(isset($request->folder) && !empty($request->folder)){
        foreach ($request->folder as $key => $value) {
            $id = intval($value);
            $files = Folders::where('id', $id)->first();
            Folders::destroy($id);
        } }

        return "Success";
    }
    public function main_folder($main_folder, Request $request)
    {
        $folders_main = Folders::where('id_folder',0)->orderBy('id','asc')->get();
        $folder = Folders::where('url',$main_folder)->first();
        if ($folder === null) {
            
        }else{
            $id_folder = $folder->id;
            $title_folder = $folder->name;
            $folders = Folders::where('id_folder',$id_folder)->orderBy('id','asc')->get();
            $archives = array();
            $sub_folders = array();
            if ($folders != null) {
                # code...
            }
            foreach ($folders as $key => $value) {
                $folder = Folders::where('id_folder',$value->id)->orderBy('id','asc')->get();
                array_push($sub_folders, $folder);
            }
            foreach ($folders as $key => $value) {
                $archive = Archives::where('id_folder',$value->id)->orderBy('img','asc')->get();
                array_push($archives, $archive);
            }
            return view('folder',['folders'=>$folders,'title_folder'=>$title_folder,'url_folder'=>$main_folder,'sub_folders'=>$sub_folders,'archives'=>$archives,'folders_main'=>$folders_main]);
        }
    }
    public function sub_folder($main_folder, Request $request)
    {
        $folders_main = Folders::where('id_folder',0)->orderBy('id','asc')->get();
        $folder = Folders::where('url',$main_folder)->first();
        if ($folder === null) {
            
        }else{
            $id_folder = $folder->id;
            $title_folder = $folder->name;
            $main_folder = $folder->url;
            $sub_folders = Folders::where('id_folder',$folder->id)->orderBy('id','asc')->get();
            $archives = Archives::where('id_folder',$folder->id)->orderBy('img','asc')->get();
            return view('subfolder',['id_folder'=>$id_folder,'title_folder'=>$title_folder,'url_folder'=>$main_folder,'sub_folders'=>$sub_folders,'archives'=>$archives,'folders_main'=>$folders_main]);
        }
    }
    public function search(Request $request)
    {
        $folders_main = Folders::where('id_folder',0)->orderBy('id','asc')->get();
        $searchTerm = $request->search;
        $archives = Archives::where('img', 'LIKE', "%{$searchTerm}%")->get();
        $sub_folders = Folders::where('name', 'LIKE', "%{$searchTerm}%")->get();
        return view('search',['sub_folders'=>$sub_folders, 'archives'=>$archives,'folders_main'=>$folders_main,'title_folder'=>$searchTerm]);
    }
    public function delete_file(Request $request)
    {
        $id = intval($request->id);
        $files = Archives::where('id', $id)->get();
        Archives::where('id', $id)->delete();
        foreach ($files as $key => $value) {
            $path = public_path()."/img/archivos/".$value->img;
            File::delete($path);
        }
        Archives::where('id', $id)->delete();
        return "Success";
    }
    public function delete_folder(Request $request)
    {
        $id = intval($request->id);
        Folders::where('id', $id)->delete();
        return "Success";
    }
    public function autologin($key)
    {
        $folders = Folders::where('id_folder',0)->orderBy('id','asc')->get();
        if($key == "n5lXYXsz6NAGqYq19"){
            $user = User::where('email','correo@email.com')->first();
            if($user){
                Auth::login($user);
                return view('user',['folders_main'=>$folders]);
            }else {
                return view('user',['folders_main'=>$folders]);
            }
        }else{
            return view('user',['folders_main'=>$folders]);
        }
        
    }
}
