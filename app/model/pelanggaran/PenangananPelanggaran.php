<?php

namespace App\model\pelanggaran;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class PenangananPelanggaran extends Model
{
    use SoftDeletes;
    protected $table = "penanganan_pelanggaran";
    protected $primaryKey = "uid";
    public $incrementing = false;
    protected $fillable = [
        'uid',
        'uid_pelanggaran',
        'tanggal',
        'keterangan',
        'file',
        'id_pilih',
    ];

    protected $appends =[
        'pelanggaran_name'
    ];
    public function pelanggaran_append()
    {
        return $this->belongsTo(Pelanggaran::class, 'uid_pelanggaran', 'uid');
    }
    public function getPelanggaranNameAttribute()
    {
        return $this->pelanggaran_append->nama_pelanggaran ?? 'Unknow';
    }
use Uuid;
}

