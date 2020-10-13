<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSengketa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sengketa')){
            Schema::create('sengketa', function (Blueprint $table) {
                if(config('database.default') == 'pgsql')
                    $table->string('uid')->default(DB::raw('gen_uuid()'));
                else if(config('database.default') == 'mysql')
                    $table->string('uid')->default(DB::raw('uuid()'));

                $table->timestamp('tanggal')->nullable();
                $table->string('nomor_pemohon')->nullable();
                $table->string('nik')->nullable();
                $table->string('nama_pemohon')->nullable();
                $table->string('alamat')->nullable();
                $table->string('tempat_lahir')->nullable();
                $table->string('tanggal_lahir')->nullable();
                $table->string('pekerjaan')->nullable(); 
                $table->string('objek_sengketa')->nullable();
                $table->string('keterangan')->nullable();
                $table->string('tindak_lanjut')->nullable();
                $table->string('file')->nullable();
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
        Schema::dropIfExists('sengketa');
    }
}
