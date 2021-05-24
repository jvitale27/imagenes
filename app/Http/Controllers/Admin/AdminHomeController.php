<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{

/*  ESTO AHORA LO HADO CON EL MIDDLEWARE DE LA AGRUPACION DE RUTAS EN EL ARCHIVO web.php
    //verifico que este logueado, sino lo obliga a loguearse
    public function __construct(){
        $this->middleware('auth');
    }
*/

    public function index(){
    	return view('admin.home');
    }
}
