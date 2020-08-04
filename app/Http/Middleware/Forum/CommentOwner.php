<?php

namespace App\Http\Middleware\Forum;

use Closure;
use App\Model\Comment;
use Illuminate\Support\Facades\Auth;

class CommentOwner
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
      
      if ( Comment::find( $CommentId )->user_id == Auth::id() )
        return $next($request);

      return abort(404, 'No way.');
    }
}
