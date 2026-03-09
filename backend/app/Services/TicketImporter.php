<?php

namespace App\Services;

use App\Models\Cliente;
use App\Models\Campana;
use App\Models\Vendedor;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class TicketImporter
{
    public static function importRow(array $row)
    {
        DB::transaction(function () use ($row) {

            $cliente = Cliente::firstOrCreate(
                ['telefono' => $row[1]],
                ['nombre' => $row[0]]
            );

            $campana = Campana::where('nombre', $row[2])->firstOrFail();

            $vendedor = Vendedor::where('nombre', $row[4])->firstOrFail();

            Ticket::create([
                'cliente_id' => $cliente->id,
                'campana_id' => $campana->id,
                'vendedor_id' => $vendedor->id,
                'numero_ticket' => $row[3],
                'observaciones' => $row[5] ?? null
            ]);

        });
    }
}