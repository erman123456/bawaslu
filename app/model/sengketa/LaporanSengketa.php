<?php

namespace App\model\sengketa;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LaporanSengketa extends Model
{
    
    use SoftDeletes;
    protected $table = "laporan_sengketa";
    protected $primaryKey = "uid";
    public $incrementing = false;
    protected $fillable = [
        'uid',
        'tanggal',
        'file',
        'id_pilih'
    ];
    use Uuid;

}