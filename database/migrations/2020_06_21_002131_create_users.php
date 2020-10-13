<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('users')){
            Schema::create('users', function (Blueprint $table) {
                if(config('database.default') == 'pgsql')
                    $table->string('uid')->default(DB::raw('gen_uuid()'));
                else if(config('database.default') == 'mysql')
                    $table->string('uid')->default(DB::raw('uuid()'));

                $table->string('nama')->nullable();
                $table->string('email')->nullable()->unique();
                $table->string('password')->nullable();
                $table->string('tanggal_lahir')->nullable();
                $table->string('alamat')->nullable();
                $table->string('nik')->nullable()->unique();
                $table->string('foto')->nullable();
                $table->string('id_jk')->nullable();
                $table->string('id_agama')->nullable();
                $table->string('id_jabatan')->nullable();
                $table->uuid('uid_divisi')->nullable();
                $table->string('id_office')->nullable();
                $table->string('no_npwp')->nullable();
                $table->string('no_bpjs_kesehatan')->nullable();
                $table->string('no_bpjs_ketenagakerjaan')->nullable();
                $table->string('no_kontak')->nullable();
                $table->string('no_wa')->nullable();
                $table->integer('gaji')->nullable();
                $table->string('uid_atasan')->nullable();
                $table->string('no_emergency_1')->nullable();
                $table->string('no_emergency_2')->nullable();
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
        Schema::dropIfExists('users');
    }
}

