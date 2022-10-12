<?php

namespace App\Http\Controllers;

use App\Month;
use Illuminate\Http\Request;

class MonthController extends Controller
{
    public function home(Month $month)
    {
        return view('months.home')->with(['months' => $month->get()]);
    }

    public function index(Month $month)
    {
        $months_get = $month->getByMonth();
        $all_number = count($months_get);
            
        //焦点距離ごとの枚数をカウントするための配列
        $f_count = [
            ["広角(~35mm)", 0, 0, 8, "#00CC00"],
            ["標準(~100mm)", 0, 0, 43, "#00AA00"],
            ["望遠(100mm~)", 0, 0, 78, "#008800"],
            ];
            
        foreach($months_get as $month_get){
            try{
                $f_length = $month_get->f_length;
                if($f_length <= 35){
                    $f_count[0][1]++;
                    $f_count[0][2] += 100/$all_number;
                }elseif(35 < $f_length and $f_length <= 100){
                    $f_count[1][1]++;
                    $f_count[1][2] += 100/$all_number;
                }elseif(100 < $f_length){
                    $f_count[2][1]++;
                    $f_count[2][2] += 100/$all_number;
                }
            }catch(\Exception $e){
            }
        }
        
        return view('months.index')->with([
            'month' => $month,
            'posts' => $month->paginateByMonth(),
            'f_lengths' => $f_count,
            ]);
    }
    
}
