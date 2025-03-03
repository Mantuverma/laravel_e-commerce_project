<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next ,$role): Response
    {
        
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $userRole=Auth::user()->role;
    
        switch($role){
            case 'admin':
                if($userRole==0){
                    return $next($request);
                }
                break;
            case 'vender':
                if($userRole==1){
                    return $next($request);
                }
                break;
            case 'customer':
                if($userRole==2){
                    return $next($request);
                }
                break;
            

        }

        switch($userRole){
            case 0:
                return redirect()->route('admin');
                break;
            case 1:
                return redirect()->route('vendor');
                break;
            case 2:
                return redirect()->route('customer');
                break;
        }

        return redirect()->route('login');
    }
}