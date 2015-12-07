<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
class Master
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $master = Cookie::get('master');
        //dd($master);
        if($master != 'ENIGMA') {
            if($request->input('master-key') == 'ArthurScherbius') {
                $cookie = Cookie::forever('master', 'ENIGMA');
                return response('')->withCookie($cookie);
            }
            else {
                return redirect('/');
            }
        }
        return $next($request);
    }
}
