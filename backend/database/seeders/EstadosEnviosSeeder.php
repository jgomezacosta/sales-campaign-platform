<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EstadosEnvio;

class EstadosEnviosSeeder extends Seeder
{
    public function run(): void
    {
        $estados = [
            ['codigo' => 'pendiente', 'nombre' => 'Pendiente'],
            ['codigo' => 'enviado', 'nombre' => 'Enviado'],
            ['codigo' => 'fallido', 'nombre' => 'Fallido'],
            ['codigo' => 'reintentando', 'nombre' => 'Reintentando'],
            ['codigo' => 'cancelado', 'nombre' => 'Cancelado'],
        ];

        foreach ($estados as $estado) {
            EstadosEnvio::create($estado);
        }
    }
}
