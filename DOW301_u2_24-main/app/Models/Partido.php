<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $table = 'partidos';  

    protected $fillable = [
        'equipo_a_id', 'equipo_b_id', 'resultado_a', 'resultado_b', 'fecha', 'estadisticas',
    ];
    

    public function equipoA()
    {
        return $this->belongsTo(Equipo::class, 'equipo_a_id');
    }

    public function equipoB()
    {
        return $this->belongsTo(Equipo::class, 'equipo_b_id');
    }
}
