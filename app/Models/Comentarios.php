<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    use HasFactory;
    //Nombre de la tabla
    protected $table = 'comentarios';
    //Campos a definir sin valor por defecto
    protected $fillable = ['contenido','post_id'];
    public $timestamps = false;
}
