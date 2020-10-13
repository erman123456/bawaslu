<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UnitModel extends Model
{
    protected $table ='unit';
        public function selAll(){
        return $this->all();
    }
        public function delData($id){
        $this->where('id', $id)->delete();
    }
        public function selById($id){
        return $this->find($id);
    }
}
