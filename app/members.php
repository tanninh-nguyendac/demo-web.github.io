<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class members extends Model
{
    protected $table = 'members';
    public $timestamps = true;
    protected $primaryKey='id';

    public function order()
    {
    	return $this->hasMany('App\orders','id','member_id');  
    }
}
