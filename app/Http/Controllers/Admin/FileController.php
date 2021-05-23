<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function index()
    {
        return view('admin.files.index');
    }


    public function create()
    {
        return view('admin.files.create');
    }


    public function store(Request $request)
    {
        $request->validate([                            //valido los datos, que hayan elegido una imagen
            'file' => 'required|image|max:2048'
        ]);

        //al seleccionar un archivo desde un formulario, este se copia a la carpeta xampp\tmp
        //este metodo copia el archivo seleccionado (que esta en xampp\tmp) a la carpeta public\storage\imagenes
       if($request->file('file')){
            //$url = $request->file('file')->store('imagenes');     //me devuelve imagenes/{nombre imagen}
            //esto de abajo es lo mismo que el anterior
            $url = Storage::put('imagenes', $request->file('file'));    //me devuelve imagenes/{nombre imagen}

            //esto luego me devuelve la url completa, http://imagenes.test/storage/imagenes/{nombre imagen}
            //$url = Storage::url($url); 
        }

        $imagen = File::create(['url' => $url]);       //insercion en la BD

        return redirect()->route('admin.files.index');
    }


    public function show(File $file)
    {
        return view('admin.files.show');
    }


    public function edit(File $file)
    {
        return view('admin.files.edit');
    }


    public function update(Request $request, File $file)
    {
        //
    }


    public function destroy(File $file)
    {
        //
    }
}
