<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobs\ImportTicketsJob;

class ImportController extends Controller
{
    public function importTickets(Request $request)
    {
        // validar request
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv'
        ]);

        // guardar archivo
        $path = $request->file('file')->store('imports');

        // enviar job a la cola
        ImportTicketsJob::dispatch($path);

        return response()->json([
            'message' => 'Importación en proceso'
        ]);
    }
}
