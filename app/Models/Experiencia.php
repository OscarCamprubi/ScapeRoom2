<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    use HasFactory;

    protected $table = 'experiencies';

    public function reserva()
    {
        return $this->hasOne(Reserva::class);
    }

    public function valoracio()
    {
        return $this->hasOne(Valoracio::class);
    }
}
