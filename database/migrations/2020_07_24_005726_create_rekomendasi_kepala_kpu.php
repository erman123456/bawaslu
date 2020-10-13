<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateRekomendasiKepalaKpu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('RekomendasiKepalaKPU')){
            Schema::create('RekomendasiKepalaKPU', function (Blueprint $table) {
                if(config('database.default') == 'pgsql')
                    $table->uuid('uid')->default(DB::raw('gen_uuid()'));
                else if(config('database.default') == 'mysql')
                    $table->uuid('uid')->default(DB::raw('uuid()'));

                $table->uuid('uid_dapil')->nullable();
                $table->string('nama_kepala')->nullable();
                $table->string('foto')->nullable();
                $table->string('jumlah_anggota')->nullable();
                $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('RekomendasiKepalaKPU');
    }
}

