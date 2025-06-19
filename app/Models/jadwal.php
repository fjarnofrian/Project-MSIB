<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class jadwal extends Model
{
    protected $table = 'penjadwalan_kelas';
    protected $fillable = ['pengajar_id','peserta_id','materi_id','kode_kelas','kelas','jam_masuk','jam_keluar','tgl_mulai','tgl_akhir'];
    public $timestamps = false;
    public function materi()
    {
        return $this->hasMany(materi::class);
    }
}
