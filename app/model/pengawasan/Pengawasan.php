<?php

namespace App\model\pengawasan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\model\Lembaga;
use App\Traits\Uuid;

// use App\model\Wilayah;

class Pengawasan extends Model
{
    use SoftDeletes;
    protected $table = "data_pengawasan";
    protected $primaryKey = "uid";
    public $incrementing = false;
    protected $fillable = [
        'uid',
        'keterangan',
        'paslon',
        'pengguna_hak_pilih',
        'rekapitulasi_hasil_suara',
        'rekomendasi',
        'tanggal',
        'id_pilih'
    ];
    use Uuid;
}
