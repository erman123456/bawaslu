<?php

namespace App\model\pelanggaran;

use App\model\pelanggaran\Pelanggaran;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LaporanPelanggaran extends Model
{
    
    use SoftDeletes;
    protected $table = "laporan_pelanggaran";
    protected $primaryKey = "uid";
    public $incrementing = false;
    protected $fillable = [
        'uid',
        'tanggal',
        'file',
        'uid_pelanggaran',
        'id_pilih'
    ];
    use Uuid;
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
}