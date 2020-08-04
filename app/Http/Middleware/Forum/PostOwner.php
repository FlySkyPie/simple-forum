<?php

namespace App\Http\Middleware\Forum;

use Closure;
use App\Model\Post;
use Illuminate\Support\Facades\Auth;

class PostOwner
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
      $TopicId = $request->route()->parameter('id');
      
      if ( Post::find( $TopicId )->user_id == Auth::id() )
        return $next($request);

      return abort(404, 'No way.');
    }
}
