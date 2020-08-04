<?php

namespace App\Http\Middleware\Forum;

use Closure;

class PostMessage
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
      $request->validate([
       'message' => 'required|max:20000|min:200',
      ]);
      
      return $next($request);
    }
}
