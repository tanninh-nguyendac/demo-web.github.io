<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = 'categories';
    public $timestamps = false;
    protected $primaryKey='id';


    public function products()
    {
        return $this->hasMany('App\products');
    }
}
