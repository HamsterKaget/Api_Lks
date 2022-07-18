<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class costumer extends Model
{
    use HasFactory;

    protected $table = 'Tbl_User';
    protected $fillable = [
        'Tipe_User',
        'Nama_User',
        'Alamat',
        'Telpon',
        'Username',
        'Password',
    ];

}
