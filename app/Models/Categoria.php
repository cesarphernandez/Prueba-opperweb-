<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    //Nombre de la tabla
    protected $table = 'categorias';
    //Campos a definir sin valor por defecto
    protected $fillable = ['nombre','fecha_actualizacion'];
    //No creacion de timestamp automatico de las migraciones
    public $timestamps = false;

}
