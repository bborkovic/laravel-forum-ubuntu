<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckIsCustomer {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

      if ( ! Auth::user()->hasRole('customer')) {
         Session::flash('status', 'You are not logged in as customer');
         return redirect()->action( 'HomeController@index');
      }
      return $next($request);
    }
}
