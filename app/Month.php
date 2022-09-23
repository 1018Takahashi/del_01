<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    public function posts()   
    {
        return $this->hasMany('App\Post');  
    }
    
    public function getByPlace(int $limit_count = 15)
    {
        return $this->posts()->with('month')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
