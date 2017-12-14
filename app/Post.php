<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    protected $fillable = [
       'title', 'slug', 'category_id', 'content', 'featured'
    ];

    protected $dates = ['deleted_at'];

    public function getFeaturedAttributes($featured){
        return asset($featured);
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

}
