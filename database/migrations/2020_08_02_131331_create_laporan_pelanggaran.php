<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLaporanPelanggaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('laporan_pelanggaran')){
            Schema::create('laporan_pelanggaran', function (Blueprint $table) {
                if(config('database.default') == 'pgsql')
                    $table->string('uid')->default(DB::raw('gen_uuid()'));
                else if(config('database.default') == 'mysql')
                    $table->string('uid')->default(DB::raw('uuid()'));

                $table->timestamp('tanggal')->nullable();
                $table->string('file')->nullable();
                $table->string('uid_pelanggaran')->nullable();
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
        Schema::dropIfExists('laporan_pelanggaran');
    }
}
