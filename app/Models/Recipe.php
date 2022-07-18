<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'Tbl_Resep';
    protected $fillable = [
        'No_Resep',
        'Tgl_Resep',
        'Nama_Dokter',
        'Nama_Pasien',
        'Nama_ObatDibeli',
        'Jumlah_ObatDibeli',
    ];
}
