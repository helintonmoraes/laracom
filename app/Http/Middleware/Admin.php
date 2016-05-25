<?php

namespace Laracom\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin {

    public function handle($request, Closure $next) {
        
        if ($request->session()->get('admin') < 1) {
            $url = $request->path();
            
            $q = '';
            foreach ($request->query() as $k => $v) {
                if ($q != '') {
                    $q .= '&';
                }
                $q .= $k . '=' . $v;
            }
            if ($q != '') {
                $url .= '?' . $q;
            }
            $request->session()->put('next-url', $url);
            
            return redirect('login/admin');
        }

        return $next($request);
    }

}
