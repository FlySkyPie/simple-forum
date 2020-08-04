<?php

namespace App\Http\Middleware\Forum;

use Closure;
use App\Model\Post;

class PostContentFilter
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
      if( !$request->exists('ReplyId') )
      $request->validate([
       'title' => 'required|max:45',
      ]);
      
      $request->validate([
       'message' => 'required|max:20000|min:200',
      ]);
      
      return $next($request);
    }
}
