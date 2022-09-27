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
        $f_count = [
            ["広角(~35mm)", 0, 0, 8, "#00CC00"],
            ["標準(~100mm)", 0, 0, 43, "#00AA00"],
            ["望遠(100mm~)", 0, 0, 78, "#008800"],
            ];
        foreach($categories_get as $category_get){
            try{
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
            'posts' => $category->paginateByCategory(),
            'f_lengths' => $f_count,
            ]);
    }
}
