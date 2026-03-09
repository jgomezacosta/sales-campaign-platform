<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;
    protected $table = 'vendedores';

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function senderNumbers()
    {
        return $this->hasMany(SenderNumber::class);
    }
}
