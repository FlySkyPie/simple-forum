<?php

namespace App\Http\Middleware\Forum;

use Closure;

use App\Model\Comment;

class CommentExist
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
      $CommentId = $request->route()->parameter('id');
      if ( Comment::where( 'id', $CommentId )->exists())
        return $next($request);
      
      return abort(404, 'No way.');
    }
}
