<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePenangananPelanggaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('penanganan_pelanggaran')){
            Schema::create('penanganan_pelanggaran', function (Blueprint $table) {
                if(config('database.default') == 'pgsql')
                    $table->uuid('uid')->default(DB::raw('gen_uuid()'));
                else if(config('database.default') == 'mysql')
                    $table->uuid('uid')->default(DB::raw('uuid()'));

                $table->uuid('uid_pelanggaran')->nullable();
                $table->timestamp('tanggal')->nullable();
                $table->string('nama_pelanggaran')->nullable();
                $table->string('keterangan')->nullable();
                $table->string('tindakan_penanganan')->nullable();
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
        Schema::dropIfExists('penanganan_pelanggaran');
    }
}
