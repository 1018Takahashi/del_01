<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()   
    {
        return $this->belongsToMany('App\Post');  
    }
    
    public function paginateByCategory(int $limit_count = 15)
    {
        return $this->posts()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function getByCategory()
    {
        return $this->posts()->with('category')->get();
    }
}
