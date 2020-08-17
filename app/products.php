<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    //
    protected $table = 'products';
    public $timestamps = true;
    protected $primaryKey='id';
    protected $fillable = ['cate_id','product_name','product_description','product_image','	product_price','product_quantity'];
}
