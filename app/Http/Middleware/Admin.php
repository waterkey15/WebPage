<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
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
        if(checkDBConnection()){
            if(auth()->check()){
                $roles = auth()->user()->roles()->get();
                foreach ($roles as $role) {
                    //dd($role);
                    if($role->is_show_admin){
                        return $next($request);
                    }else{
                        return redirect('/');
                    }
                }
            }
        }
        return $next($request);
    }
}
