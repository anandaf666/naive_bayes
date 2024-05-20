<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'penyakit_id',
        'gejala_id',
    ];
    public function penyakits(){

        return $this->BelongsTo(Penyakit::class, 'penyakit_id', 'id');
    }
    public function gejalas(){

        return $this->BelongsTo(Gejala::class, 'gejala_id', 'id');
    }
}
