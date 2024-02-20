<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $guarded = [];


    public function vendors(){

        return $this->belongsTo(User::class,'vendor_id','id');

    }  //end method

    public function categories(){

        return $this->belongsTo(Category::class,'category_id','id');

    }//end method
}
   