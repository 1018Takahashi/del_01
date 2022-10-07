<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function home(Place $place)
    {
        return view('places.home')->with(['posts' => $place->paginateByPlace()]);
    }
    
    public function index(Place $place)
    {
        $places_get = $place->getByPlace();
        $all_number = count($places_get);
        
        //月ごとの枚数をカウントするための配列
        $month_count = [
            [1, 0, 0, 4, "#00ffff"],
            [2, 0, 0, 12, "#8000ff"],
            [3, 0, 0, 20, "#ff00ff"],
            [4, 0, 0, 28, "#ff0080"],
            [5, 0, 0, 36, "#ff0000"],
            [6, 0, 0, 44, "#00ff80"],                
            [7, 0, 0, 52, "#00ff00"],
            [8, 0, 0, 60, "#80ff00"],
            [9, 0, 0, 68, "#ffff00"],
            [10, 0, 0, 76, "#ff8000"],
            [11, 0, 0, 84, "#0080ff"],
            [12, 0, 0, 92, "#0000ff"],
            ];
            
        foreach($places_get as $place_get){
            try{
                //月ごとの枚数をカウント
                $month_id = $place_get->month_id;
                $month_count[((int)$month_id)-1][1]++;
                $month_count[((int)$month_id)-1][2] += 100/$all_number;
            }catch(\Exception $e){
            }
        }
        return view('places.index')->with([
            'posts' => $place->paginateByPlace(),
            'place' => $place,
            'months' => $month_count,
            ]);
    }
}
