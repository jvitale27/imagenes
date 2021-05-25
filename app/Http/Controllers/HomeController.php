<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){

    	$files = File::paginate(20);

    	return view('welcome', compact('files'));
    }
}
