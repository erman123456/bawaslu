<?php

namespace App\model\sengketa;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Sengketa1 extends Model
{
    
    use SoftDeletes;
    protected $table = "sengketa";
    protected $primaryKey = "uid";
    public $incrementing = false;
    protected $fillable = [
        'uid',
        'tanggal',
        'nomor_pemohon',
        'nik',
        'nama_pemohon',
        'alamat',
        'pekerjaan',
        'objek_sengketa',
        'keterangan',
        'jk',
        'tindak_lanjut',
        'putusan_penyelesaian',
        'id_pilih'
    ];
    use Uuid;
}
