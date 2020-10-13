<?php

namespace App\model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use App\model\join\Divisi;

class Users extends Authenticatable
{

    use SoftDeletes;
    protected $table = "users";
    protected $primaryKey = "uid";
    public $incrementing = false;
    protected $fillable = [
        'id_jk',
        'id_agama',
        'id_jabatan',
        'id_divisi',
        'nama',
        'email',
        'password',
        'tanggal_lahir',
        'alamat',
        'nik',
        'foto',
        'id_office',
        'id_shift',
        'uid_divisi',
    ];
    use Uuid;

    protected $appends = [
        'divisi_name',
    ];

    // Relation
    public function divisi_append(){
        return $this->belongsTo(Divisi::class, 'uid_divisi', 'uid');
    }

    // Fill Append
    public function getDivisiNameAttribute(){
        return $this->divisi_append->nama_divisi ?? 'Unknow';
    }
}