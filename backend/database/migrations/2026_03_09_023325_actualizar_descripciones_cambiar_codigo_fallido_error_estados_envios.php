<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // cambiar codigo fallido -> error
        DB::table('estados_envios')
            ->where('codigo', 'fallido')
            ->update(['codigo' => 'error']);

        DB::table('estados_envios')
            ->where('codigo', 'error')
            ->update(['nombre' => 'Error']);

        // actualizar descripciones
        DB::table('estados_envios')->where('codigo', 'pendiente')->update([
            'descripcion' => 'El mensaje aún no fue enviado'
        ]);

        DB::table('estados_envios')->where('codigo', 'enviado')->update([
            'descripcion' => 'Mensaje enviado correctamente'
        ]);

        DB::table('estados_envios')->where('codigo', 'error')->update([
            'descripcion' => 'Ocurrió un error al enviar el mensaje'
        ]);

        DB::table('estados_envios')->where('codigo', 'reintentando')->update([
            'descripcion' => 'El sistema está intentando reenviar el mensaje'
        ]);

        DB::table('estados_envios')->where('codigo', 'cancelado')->update([
            'descripcion' => 'El envío fue cancelado manualmente'
        ]);
    }

    public function down(): void
    {
        // volver a fallido
        DB::table('estados_envios')
            ->where('codigo', 'error')
            ->update(['codigo' => 'fallido']);

        // borrar descripciones
        DB::table('estados_envios')->update([
            'descripcion' => null
        ]);
    }
};
