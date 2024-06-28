<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadisticas extends Model
{
    use HasFactory;

    protected $table = 'estadisticas'; // Reemplaza 'nombre_de_la_tabla' por el nombre real de tu tabla en la base de datos

    protected $fillable = [
        'partido_id',
        'puntos_local',
        'puntos_visitante',
        // Agrega aquí todos los campos que quieres manejar
    ];

    // Define relaciones u otros métodos si es necesario
}