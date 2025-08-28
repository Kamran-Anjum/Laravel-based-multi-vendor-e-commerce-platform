<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class LangMiddleware
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
        if(!session()->has('lang')){
            session()->put('lang', 'en');
        }
        
        $lang = Session::get('lang');

        \URL::defaults([
            'lang' => $lang
        ]);

        $request->route()->forgetParameter('lang');

        // app()->setlocale($request->segment(1));
        return $next($request);
    }
}
