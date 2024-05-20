<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    public function relasis(){

        return $this->HasMany(Relasi::class);
    }
    public function solusis(){

        return $this->HasOne(Solusi::class);
    }
}
