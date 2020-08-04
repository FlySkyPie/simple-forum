<?php

namespace App\Http\Middleware\Forum;

use Closure;
use App\Model\Post;
class ReplyTopicExist
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
      $TopicId = $request->get('ReplyId');
      if ( Post::where( 'id', $TopicId )->exists())
        return $next($request);
      
      return abort(404, 'No way.');
    }
}
