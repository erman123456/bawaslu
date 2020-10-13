<?php

namespace App\model\sengketa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// use App\model\Wilayah;

class Pilih extends Model
{
    use SoftDeletes;
    protected $table = "pilih";
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $fillable = [
        'id',
        'nama'
    ];
 
    protected $appends =[
        'jumlah',
    ];

    public function jumlah_append()
    {
        
        return $this->hasMany(LaporanSengketa::class, 'id_pilih', 'id');
    
    }
    public function getJumlahAttribute()
    {
       $data = $this->jumlah_append()->get();
        return $data->count();
    }

}
