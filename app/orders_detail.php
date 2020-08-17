<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders_detail extends Model
{
    protected $table = 'orders_detail';
    public $timestamps = true;
    protected $primaryKey='id';
}
