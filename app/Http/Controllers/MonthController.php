<?php

namespace App\Http\Controllers;

use App\Month;
use Illuminate\Http\Request;

class MonthController extends Controller
{
    public function index(Month $month)
    {
        return view('months.index')->with(['posts' => $month->getByPlace()]);
    }
}
