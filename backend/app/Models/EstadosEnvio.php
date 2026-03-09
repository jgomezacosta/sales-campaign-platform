<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadosEnvio extends Model
{
    use HasFactory;
    protected $table = 'estados_envios';

    public function envios()
    {
        return $this->hasMany(Envio::class);
    }
}
