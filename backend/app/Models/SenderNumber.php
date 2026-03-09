<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SenderNumber extends Model
{
    use HasFactory;
    protected $table = 'sender_numbers';

    public function envios()
    {
        return $this->hasMany(Envio::class);
    }

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class);
    }
}
