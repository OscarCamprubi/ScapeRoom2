<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reserves';

    public function sala()
    {
        return $this->hasOne(Sala::class);
    }

    public function participant()
    {
        return $this->hasMany(Participant::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function voucher(){
        return $this->belongsTo(Voucher::class);
    }

    public function experiencia(){
        return $this->belongsTo(Experiencia::class);
    }
}
