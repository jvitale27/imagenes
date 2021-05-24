<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

//cuando hay insercion masiva, solo guardo en la BD estos campos indicados aqui. Es por seguridad
    protected $fillable = ['user_id', 'url'];

//cuando hay insercion masiva, NO guardo en la BD estos campos indicados aqui. Lo contrario al anterior
    protected $guarded = [];            //nada que proteger 


    //relacion 1 a muchos inversa
    public  function user(){                              //metodo que me devuelve el usuario de un file
        return $this->belongsTo(User::class);       //una manera mucho mas resumida que la anterior
    }

}
