<?php
use Illuminate\Http\Request;
use App\Models\Folders;
use App\Models\Archivos;

    function getFolders($id){
        $folders_child = Folders::where("id_folder","=",$id)->get();
        return $folders_child;
    }

