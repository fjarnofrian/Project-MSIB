<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    use HasFactory;
    protected $table = 'pengajar';
    protected $fillable = ['nip','nama','gender','telp','email','alamat','foto','desk'];
    public $timestamps = false;
}
