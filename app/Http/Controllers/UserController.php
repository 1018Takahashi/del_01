<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(User $user, int $limit_count = 10)
    {
        return view('users.index')->with(['posts' => $user->getByUser()]);
    }
}
