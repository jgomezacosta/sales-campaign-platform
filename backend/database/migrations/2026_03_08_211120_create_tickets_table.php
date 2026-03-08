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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vendedor_id')->constrained('vendedores')->cascadeOnDelete();
            $table->foreignId('campana_id')->constrained()->cascadeOnDelete();
            $table->string('numero_ticket')->nullable();
            $table->decimal('monto', 10, 2)->nullable();
            $table->date('fecha_compra')->nullable();
            $table->text('observaciones')->nullable();

            $table->index('cliente_id');
            $table->index('vendedor_id');
            $table->index('campana_id');

            $table->timestamps();
            $table->unique(['numero_ticket','campana_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
