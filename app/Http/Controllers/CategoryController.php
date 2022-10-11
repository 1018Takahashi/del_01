<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function home(Category $category)
    {
        return view('categories.home')->with(['categories' => $category->get()]);
    }
    
    public function index(Category $category)
    {
        $categories_get = $category->getByCategory();
        $all_number = count($categories_get);
        
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
            
        //焦点距離ごとの枚数をカウントするための配列
        $f_count = [
            ["広角(~35mm)", 0, 0, 8, "#00CC00"],
            ["標準(~100mm)", 0, 0, 43, "#00AA00"],
            ["望遠(100mm~)", 0, 0, 78, "#008800"],
            ];
            
        foreach($categories_get as $category_get){
            try{
                //月ごとの枚数をカウント
                $month_id = $category_get->month_id;
                $month_count[((int)$month_id)-1][1]++;
                $month_count[((int)$month_id)-1][2] += 100/$all_number;
                
                $f_length = $category_get->f_length;
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
        
        return view('categories.index')->with([
            'category' => $category,
            'posts' => $category->paginateByCategory(),
            'months' => $month_count,
            'f_lengths' => $f_count,
            ]);
    }
}
