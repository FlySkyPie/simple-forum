<?php
namespace App\Repository;

use App\Model\Post;
use App\Repository\Forum\Topic;

class TopicRepository
{
  public function getTopic( $PostId )
  {
    $DBPost = Post::find( $PostId );
    return new Topic( $DBPost );
  }
}
