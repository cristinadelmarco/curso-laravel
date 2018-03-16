<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public function product()
    {
    	return $this->belongTo(Product::class);
    }

    public function getUrlAttribute()
    {
    	if(substr($this->image, 0, 4) === 'http') {
    		return $this->image;
    	} 

    	return '/images/products/'.$this->image;
    }
}
