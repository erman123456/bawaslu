<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class PenggunaHakPilih extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('PenggunaHakPilih')){
            Schema::create('PenggunaHakPilih', function (Blueprint $table) {
                if(config('database.default') == 'pgsql')
                    $table->string('uid')->default(DB::raw('gen_uuid()'));
                else if(config('database.default') == 'mysql')
                    $table->string('uid')->default(DB::raw('uuid()'));

                $table->string('nik')->nullable();
                $table->string('nama')->nullable()->unique();
                $table->string('id_jk')->nullable();
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
        Schema::dropIfExists('PenggunaHakPilih');
    }
}

