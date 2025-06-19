<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['nama'];
    public $timestamps = false;
    // public function materi(): HasMany
    // {
    //     return $this->hasMany(Materi::class);
    // }
}
