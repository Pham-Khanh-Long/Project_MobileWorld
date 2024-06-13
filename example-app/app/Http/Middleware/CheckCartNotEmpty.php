<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCartNotEmpty
{
    public function handle($request, Closure $next)
    {
        if (!session()->has('Cart') || empty(session('Cart')->products)) {
            return redirect()->route('showCart')->with('error', 'Giỏ hàng của bạn đang rỗng.');
        }

        return $next($request);
    }
}

