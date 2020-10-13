<?php

namespace App\model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Divisi extends Model
{
    use SoftDeletes;
    protected $table = "divisi";
    protected $primaryKey = "uid";
    public $incrementing = false;
    protected $fillable = [
        'uid',
        'nama_divisi'
    ];
    use Uuid;

    // protected $softDelete = true;
    // protected $dates = ['deleted_at'];
}

