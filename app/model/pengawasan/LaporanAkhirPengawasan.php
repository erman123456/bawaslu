<?php

namespace App\model\pengawasan;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaporanAkhirPengawasan extends Model
{
    use SoftDeletes;
    protected $table = "laporanakhirpengawasan";
    protected $primaryKey = "uid";
    public $incrementing = false;
    protected $fillable = [
        'uid',
        'tanggal',
        'judul',
        'file',
        'keterangan',
        'id_pilih'
    ];
    use Uuid;
}
