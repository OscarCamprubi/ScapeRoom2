<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Resource_;

class Participant extends Model
{
    use HasFactory;
    protected $table = 'participants';

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}
