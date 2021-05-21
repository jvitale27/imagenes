<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

	//verifico que este logueado, sino lo obliga a loguearse
	public function __construct(){
		$this->middleware('auth');
	}

    public function index(){
    	return view('admin.home');
    }
}
