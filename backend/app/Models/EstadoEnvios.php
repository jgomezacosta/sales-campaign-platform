<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoEnvios extends Model
{
    use HasFactory;


    public function envios()
    {
        return $this->hasMany(Envio::class);
    }
}
