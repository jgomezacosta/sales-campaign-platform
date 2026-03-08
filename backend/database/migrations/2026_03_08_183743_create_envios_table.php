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
        Schema::create('envios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cliente_id')
                ->constrained('clientes')
                ->cascadeOnDelete();

            $table->foreignId('campana_id')
                ->constrained('campanas')
                ->cascadeOnDelete();

            $table->foreignId('sender_number_id')
                ->nullable()
                ->constrained('sender_numbers')
                ->nullOnDelete();

            $table->foreignId('estado_envio_id')
                ->constrained('estados_envios');

            // mensaje enviado
            $table->text('mensaje');

            // id del proveedor de mensajería
            $table->string('external_message_id')->nullable();

            $table->timestamp('fecha_envio')->nullable();

            $table->text('mensaje_respuesta')->nullable();

            $table->text('error')->nullable();

            $table->index('cliente_id');
            $table->index('campana_id');
            $table->index('estado_envio_id');
            $table->index('sender_number_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envios');
    }
};
