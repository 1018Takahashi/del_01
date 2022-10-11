<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    public function getPaginateByLimit(int $limit_count = 15)
    {
        return $this::with('category', 'place', 'month')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        
    }
    
    public function accessRanking(int $count=3)
    {
        return $this::with('category', 'place', 'month')->orderByRaw('CAST(access as SIGNED) DESC')->limit(3)->get();
    }
    
    protected $fillable = [
        'title',
        'img',
        "comment",
        "camera",
        "lens",
        'f_length',
        "f",
        "ss",
        "iso",
        'address',
        'place_id',
        'user_id',
        'month_id',
        'access',
        'filmed_at',
        'lat',
        'lng,'
        ];
        
    public function category()
    {
        return $this->belongsToMany('App\Category');
    }
    
    public function place()
    {
        return $this->belongsTo('App\Place');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function month()
    {
        return $this->belongsTo('App\Month');
    }
    
}