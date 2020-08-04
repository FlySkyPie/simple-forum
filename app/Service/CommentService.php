<?php
namespace App\Service;

use App\Model\Comment;

class CommentService
{
  /*
   * @todo delete the comment
   * @param Integer $CommentId
   * @var Integer
   */
  public function deleteComment( $CommentId )
  {
    $Comment =  Comment::find( $CommentId );
    $TopicID = $Comment->post_id;
    $Comment->delete();
    return $TopicID;
  }
  
  public function addComment(  $Request, $PostId )
  {
    $comment = new Comment;
    $comment->post_id = $PostId;
    $comment->user_id = $Request->user()->id;
    $comment->message = $Request->get('message');
    
    if ( $comment->save() ) 
      return $PostId;
    
    return 0;
  }

}