<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
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
        //  http://laravel8.test/pruebaMiddleware?age=20
        //if($request->age >= 18){
        if(auth()->user()){
            return $next($request);
        }else{
            return redirect('no-autorizado');
        }
    }
}
