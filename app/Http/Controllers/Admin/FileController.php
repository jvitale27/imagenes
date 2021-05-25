<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class FileController extends Controller
{

/*  ESTO AHORA LO HADO CON EL MIDDLEWARE DE LA AGRUPACION DE RUTAS EN EL ARCHIVO web.php
    //verifico que este logueado, sino lo obliga a loguearse
    public function __construct(){
        $this->middleware('auth');
    }
*/

    public function index()
    {
        $files = File::where('user_id', auth()->user()->id)->paginate(20);

        return view('admin.files.index', compact('files'));
    }


    public function create()
    {
        return view('admin.files.create');
    }


    public function store(Request $request)
    {

        $request->validate([                            //valido los datos, que hayan elegido una imagen
            //'file' => 'required|image|max:2048'//esto ya lo valida 'dropzone' o lo achica 'Intervention Image'
            'file' => 'required|image'
        ]);
/*
        //si NO utilizo el plugin 'Intervention Image' puedo hacer lo siguiente para guardar las imagenes

        //al seleccionar un archivo desde un formulario, este se copia a la carpeta xampp\tmp
        //este metodo copia el archivo seleccionado (que esta en xampp\tmp) a la carpeta public\storage\imagenes
        //renombrando el nombre del archivo, dandole un nombre aleatorio.
       if($request->file('file')){
            //$url = $request->file('file')->store('imagenes');     //me devuelve imagenes/{nombre imagen}
            //esto de abajo es lo mismo que el anterior
            $url = Storage::put('imagenes', $request->file('file'));    //me devuelve imagenes/{nombre imagen}

            //esto luego me devuelve la url completa, http://imagenes.test/storage/imagenes/{nombre imagen}
            //$url = Storage::url($url); 
        }

        //insercion en la BD
        $imagen = File::create([
            'user_id' => auth()->user()->id(),
            'url'     => $url]);
*/

        //si utilizo plugin 'Intervention Image' puedo alterar la imagen a subir http://image.intervention.io/

        //storage_path();                         //devuleve 'C:\xampp\htdocs\imagenes\storage'
        $nombre = $request->file('file')->getClientOriginalName();   //el nombre del archivo
        //el nombre del archivo + cadena aleatoria, para que no se pisen los mismos archivos de imagen
        $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();
        $ruta = storage_path() . '\app\public\imagenes/' . $nombre;

        //metodo de 'Intervention Image' para guardar imagen.
        Image::make( $request->file('file'))
                    ->resize(1024, null, function ($constraint) {        //redimensiono si asi lo quiero
                            $constraint->aspectRatio(); })
                    ->save( $ruta);                                     //guarda

        //guardo en la BD la ruta imagenes/{nombre imagen}
        $imagen = File::create([
            'user_id' => auth()->user()->id,
            'url'     => 'imagenes/' . $nombre         //concateno
        ]);
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

        if($file->url)                          //borro el archivo de imagen
            Storage::delete($file->url); 
        
        $file->delete();                        //boroo el registro de la BD

        return redirect()->route('admin.files.index')
                           ->with('info', 'El post se eliminó con éxito');      //mensaje de sesion
    }
}
