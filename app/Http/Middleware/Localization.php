<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Localization
{
    public function handle(Request $request, Closure $next)
    {

        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        }else{
            App::setLocale('ar');
        }

        return $next($request);
    }
}
