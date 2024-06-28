<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EquiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipos')->insert([
            ['nombre'=>'Colo Colo','entrenador'=>'Jorge Almiron','created_at'=>Carbon::now()],
            ['nombre'=>'Universidad Catolica','entrenador'=>'Tiago Nunes','created_at'=>Carbon::now()],
            ['nombre'=>'Everton','entrenador'=>'Francisco Meneghini','created_at'=>Carbon::now()],

        ]);
    }
}
