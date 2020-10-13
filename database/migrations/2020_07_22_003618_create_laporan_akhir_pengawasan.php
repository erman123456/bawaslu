<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateLaporanAkhirPengawasan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('LaporanAkhirPengawasan')){
            Schema::create('LaporanAkhirPengawasan', function (Blueprint $table) {
                if(config('database.default') == 'pgsql')
                    $table->uuid('uid')->default(DB::raw('gen_uuid()'));
                else if(config('database.default') == 'mysql')
                    $table->uuid('uid')->default(DB::raw('uuid()'));

                $table->string('nama_laporan')->nullable();
                $table->string('tanggal')->nullable();
                $table->string('foto')->nullable();
                $table->string('nama')->nullable();
                $table->string('jk')->nullable();
                $table->uuid('uid_wilayah')->nullable();
                $table->string('deskripsi')->nullable();
                $table->string('hasil')->nullable();
                $table->timestamps();
                $table->softDeletes();
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
        Schema::dropIfExists('LaporanAkhirPengawasan');
    }
}

