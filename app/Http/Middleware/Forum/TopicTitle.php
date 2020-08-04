<?php

namespace App\Http\Middleware\Forum;

use Closure;
use App\Model\Post;

class TopicTitle
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
      $PostId = $request->route()->parameter('id');
      if( Post::find( $PostId )->post_id == 0 )
        $request->validate([
         'title' => 'required|max:45',
        ]);
      
      return $next($request);
    }
}
