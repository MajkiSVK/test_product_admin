<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('setlocale') && array_key_exists(session()->get('setlocale'), Config::get('language'))){
           $locale = session()->get('setlocale');
        }else{
            $locale = Config::get('app.fallback_locale');
        }

        App::setLocale($locale);
        return $next($request);
    }
}
