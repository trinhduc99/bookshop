<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $guarded=[];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function parentId()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    public function parentIdDelete()
    {
        return $this->belongsTo(Category::class,'parent_id','id')->onlyTrashed();
    }

    public function childrenId()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }
}
