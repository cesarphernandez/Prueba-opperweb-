<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    //Nombre de la tabla
    protected $table = 'posts';
    //Campos a definir sin valor por defecto
    protected $fillable = ['titulo','contenido','categorias_id'];
    //No creacion de timestamp automatico de las migraciones
    public $timestamps = false;
}
