<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function posts()   
    {
        return $this->hasMany('App\Post');  
    }
    
    public function getByPlace(int $limit_count = 10)
    {
        return $this->posts()->with('place')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
