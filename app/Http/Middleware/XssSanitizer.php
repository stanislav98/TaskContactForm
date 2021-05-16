<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class XssSanitizer
{
    /**
     * Handle an incoming request.
     * remove the tags from the form and maybe use it in the future
     * also trim the whitespaces
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   

        $input = $request->all();
        foreach($input as $k => $v){
            if($k != 'name' || $k != 'message') {
                $v = preg_replace('/\s+/','',$v);
                $v = strip_tags($v);
            } else {
                $v = trim($v);
                $v = strip_tags($v);
            }
        }
        $request->merge($input);
        return $next($request);
    }
}
