<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded=[];

    public function category() {
        return $this->belongsTo(Category::class,'category_id')->withTrashed();
    }

    public function users() {
        return $this->belongsTo(User::class ,'user_id','id')->withTrashed();
    }
}
