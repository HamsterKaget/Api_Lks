<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'Tbl_Obat';
    protected $fillable = [
        'Kode_Obat',
        'Nama_Obat',
        'Expired_Date',
        'Jumlah',
        'Harga',
    ];

    public $timestamps = false;
}
