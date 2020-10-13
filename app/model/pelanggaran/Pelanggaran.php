<?php

namespace App\model\pelanggaran;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Pelanggaran extends Model
{
    use SoftDeletes;
    protected $table = "pelanggaran";
    protected $primaryKey = "uid";
    public $incrementing = false;
    protected $fillable = [
        'uid',
        'nama_pelanggaran',
        'uid_parent',
        'id_pilih'
    ];
    use Uuid;
    protected $appends =[
        'jumlah',
        'jumlah_temuan',
    ];
    public function jumlah_append()
    {
        return $this->hasMany(PenangananPelanggaran::class, 'uid_pelanggaran', 'uid');
    }

    public function jumlah_temuan_append()
    {
        return $this->hasMany(PenangananPelanggaran::class, 'tindakan_penanganan', 'uid');
    }

    public function getJumlahAttribute()
    {
       $data = $this->jumlah_append()->get();
        return $data->count();
    }

    public function getJumlahTemuanAttribute()
    {
       $data = $this->jumlah_temuan_append()->get();
        return $data->count();
    }

}

