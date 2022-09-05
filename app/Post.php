<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('category', 'place')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        
    }
    
    protected $fillable = [
        'title',
        'img',
        "camera",
        "lens",
        "f",
        "ss",
        "iso",
        'address',
        'category_id',
        'place_id',
        'user_id',
        'access'
        ];
        
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function place()
    {
        return $this->belongsTo('App\Place');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}