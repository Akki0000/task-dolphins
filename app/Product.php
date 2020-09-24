<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title','description','image','price','product_sku'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
