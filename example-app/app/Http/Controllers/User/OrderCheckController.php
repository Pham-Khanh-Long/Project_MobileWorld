<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderCheckController extends Controller
{
    public function oder_check()
    {
        return view('user.page.oder.oder_check');
    }
}
