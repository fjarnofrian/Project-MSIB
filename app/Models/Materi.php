<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Materi extends Model
{
    //use HasFactory;
    protected $table = 'materi';
    protected $fillable = ['kode_materi','nama','desk','kelas_id'];
    public $timestamps = false;

    // public function kategori() : BelongsTo
    // {
    //     return $this->belongsTo(Kategori::class);
    // }

    public function jadwals()
    {
        return $this->hasMany(jadwal::class);
    }

}
