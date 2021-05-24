<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	Storage::deleteDirectory('imagenes');	//borro la carpeta public/storage/posts donde almaceno imagenes
    	Storage::makeDirectory('imagenes');	//creo la carpeta public/storage/posts donde almaceno imagenes

    	// \App\Models\User::factory(10)->create();
    }
}
