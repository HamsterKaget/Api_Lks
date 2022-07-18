<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'Tbl_Transaksi';
    protected $fillable = [
        'No_Transaksi',
        'Tgl_Transaksi',
        'Total_Bayar',
        'Id_User',
        'Id_Obat',
    ];
    public $timestamps = false;



}
