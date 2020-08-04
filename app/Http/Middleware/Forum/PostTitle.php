<?php

namespace App\Http\Middleware\Forum;

use Closure;
use App\Model\Post;
class PostTitle
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
       'title' => 'required|max:45',
      ]);
      
      return $next($request);
    }
}
