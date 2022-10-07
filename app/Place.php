<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function posts()   
    {
        return $this->hasMany('App\Post');  
    }
    
    public function paginateByPlace(int $limit_count = 15)
    {
        return $this->posts()->with('place')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    public function getByPlace()
    {
        return $this->posts()->with('place')->get();
    }
}
