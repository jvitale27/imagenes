<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

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
        //
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
