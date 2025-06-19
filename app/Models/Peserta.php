<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Peserta extends Model
{
    protected $table = 'peserta';
    protected $fillable = ['nama', 'gender', 'telp', 'email', 'alamat', 'foto'];
    public $timestamps =false;

    public function peserta(): HasMany
    {
        return $this->hasMany(peserta::class);
    }
}