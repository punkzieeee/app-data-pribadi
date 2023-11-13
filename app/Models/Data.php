<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';
    protected $guarded = ['id'];
    protected $fillable = ['nik', 'nama_lengkap', 'jenis_kelamin', 'tgl_lahir', 'alamat', 'negara'];
    protected $casts = ['nik' => 'string', 'tgl_lahir' => 'datetime'];
    use HasFactory;
}
