<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('Tbl_User')) {
            Schema::create('Tbl_User', function (Blueprint $table) {
                $table->increments('Id_User');
                $table->string('Tipe_User', 50);
                $table->string('Nama_User', 50);
                $table->string('Alamat', 150);
                $table->string('Telpon', 50);
                $table->string('Username', 50);
                $table->string('Password', 50)->nullable();
            });
        }

        if(!Schema::hasTable('Tbl_Obat')) {
            Schema::create('Tbl_Obat', function (Blueprint $table) {
                $table->increments('Id_Obat');
                $table->string('Kode_Obat', 50);
                $table->string('Nama_Obat', 50);
                $table->dateTime('Expired_Date');
                $table->bigInteger('Jumlah');
                $table->bigInteger('Harga');
            });
        }

        if(!Schema::hasTable('Tbl_Resep')) {
            Schema::create('Tbl_Resep', function (Blueprint $table) {
                $table->increments('Id_Resep');
                $table->string('No_Resep', 50);
                $table->dateTime('Tgl_resep');
                $table->string('Nama_Dokter', 50);
                $table->string('Nama_Pasien', 50);
                $table->string('Nama_ObatDibeli', 50);
                $table->bigInteger('Jumlah_ObatDibeli'); 
            });
        }

        if(!Schema::hasTable('Tbl_Transaksi')) {
            Schema::create('Tbl_Transaksi', function (Blueprint $table) {
                $table->increments('Id_Transaksi');
                $table->string('No_Transaksi', 50);
                $table->dateTime('Tgl_Transaksi');
                $table->bigInteger('Total_Bayar');
                $table->integer('Id_User');
                $table->integer('Id_Obat');
                $table->integer('Id_Resep');
                // foreign key
                $table->foreign('Id_User')->references('Id_User')->on('Tbl_User');
                $table->foreign('Id_Obat')->references('Id_Obat')->on('Tbl_Obat');
                $table->foreign('Id_Resep')->references('Id_Resep')->on('Tbl_Resep');
            });
        }

        if(!Schema::hasTable('Tbl_Log')) {
            Schema::create('Tbl_Log', function (Blueprint $table) {
                $table->increments('Id_Log');
                $table->timestamp('waktu');
                $table->string('aktifitas', 50);
                $table->integer('Id_User');
                // foreign key
                $table->foreign('Id_User')->references('Id_User')->on('Tbl_User');

            });
        
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
