<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    protected $table = 'sales';

    public function joc()
    {
        return $this->belongsTo(Joc::class);
    }

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}
