<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joc extends Model
{
    use HasFactory;

    protected $table = 'jocs';

    public function sala()
    {
        return $this->hasMany(Sala::class);

    }
}
