<?php

namespace App\Http\Middleware;

use App\Helper\Helper;
use Closure;
use Illuminate\Http\Request;
use DB;


class Plotter
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
        if(!checkDBConnection() && !$request->is('install')){
            clearAllLogs();
            return redirect()->route('install.index');
        }

        if(checkDBConnection()){
            DB::connection()->disableQueryLog();
            Helper::setRoles();


        }

        return $next($request);
    }
}
