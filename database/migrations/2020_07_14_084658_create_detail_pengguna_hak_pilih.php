<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateDetailPenggunaHakPilih extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('DetailPenggunaHakPilih')){
            Schema::create('DetailPenggunaHakPilih', function (Blueprint $table) {
                if(config('database.default') == 'pgsql')
                    $table->string('uid')->default(DB::raw('gen_uuid()'));
                else if(config('database.default') == 'mysql')
                    $table->string('uid')->default(DB::raw('uuid()'));

                $table->uuid('uid_pengguna')->nullable();
                $table->uuid('uid_wilayah')->nullable();
                $table->uuid('uid_paslon')->nullable();
                $table->uuid('uid_lembaga')->nullable();
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
        Schema::dropIfExists('DetailPenggunaHakPilih');
    }
}

