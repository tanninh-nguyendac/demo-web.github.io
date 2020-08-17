<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    public $timestamps = true;
    protected $primaryKey='id';

    public function orders_detail()
{
    return $this->hasMany('App\orders_detail', 'id', 'order_id');
}
}
