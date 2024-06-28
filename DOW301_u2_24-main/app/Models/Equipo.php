<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'equipos';
    protected $fillable = ['nombre', 'entrenador']; // Agregar 'nombre' aquí

    public function jugadores()
    {
        return $this->hasMany(Jugador::class); // Asegúrate de que 'Jugador' esté bien referenciado si es necesario
    }

    public function equipo_a()
    {
        return $this->belongsTo(Equipo::class, 'equipo_a_id');
    }

    public function equipo_b()
    {
        return $this->belongsTo(Equipo::class, 'equipo_b_id');
    }

    public function partidosA()
    {
        return $this->hasMany(Partido::class, 'equipo_a_id');
    }

    public function partidosB()
    {
        return $this->hasMany(Partido::class, 'equipo_b_id');
    }
}
