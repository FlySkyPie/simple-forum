<?php

namespace App\Repository\Forum;

use App\Repository\Forum\Viewpoint;
use App\Repository\Forum\DeckOfPost;

use App\Model\Post_keyword;
use App\Model\Keyword;
use App\Model\Comment;
use App\Model\Post;
use App\User;

class Topic extends Viewpoint
{
  public $Title;
  public $TopicId;
  public $Score;
  public $IsVerified;
  public $IsDeleted;
  public $Keywords = array();
  
  /*
   * @param Object
   */
  function __construct( $Post )
  {
      $this->Id       = $Post->id;
      $this->TopicId  = $Post->post_id;
      $this->Title    = $Post->title;
      $this->Message  = $Post->message;
      $this->AuthorId = $Post->user_id;
      $this->Score    = $Post->score;
      $this->Posted   = $Post->created_at;
      $this->Edited   = $Post->updated_at;
      $this->IsVerified = $Post->is_verified;
      $this->IsDeleted  = $Post->is_deleted;
  }
  
  /*
   * @todo get keyword of post
   * @var Array
   */
  function getKeyword()
  {
    if ( !empty($this->Keywords) ) {
      return $this->Keywords;
    }

    $KeyIds = Post_keyword::where('post_id', $this->Id)->pluck( 'keyword_id' );
    
    $KeywordDBs = Keyword::findMany( $KeyIds );
    foreach ($KeywordDBs as $KeywordDB) {
      $this->Keywords[] = (object) [
                  'Id'    => $KeywordDB->id,
                  'Word'  => $KeywordDB->word
      ];
    }
    return $this->Keywords;
  }
  
  /*
   * @todo get string of post's hashtags
   * @var String
   */
  function getHashTags()
  {
    if ( empty($this->Keywords) ) {
      $this->getKeyword();
    }

    $String = "";
    foreach ( $this->Keywords as $Keyword ) {
      $String .=  "#" . $Keyword->Word;
    }
    return $String;
  }
  
  function isPoster( $UserId )
  {
    return ( $this->AuthorId == $UserId ) ? 1 : 0;
  }
  
  function getAuthorName()
  {
    if( !empty( $this->AuthorName ) )
      return $this->AuthorName;
      
    return $this->AuthorName = User::find( $this->AuthorId )->name;
  }
  
  function getComment()
  {
    $CommentDBs = Comment::where( 'post_id', $this->Id )->get();
    $Comment = array();
    
    foreach ( $CommentDBs as $CommentDB )
    {
      $Comment[] = (object)[
                    'Id' => $CommentDB->id,
                    'TopicId' => $CommentDB->post_id,
                    'AuthorId'=> $CommentDB->user_id,
                    'AuthorName'  => User::find( $CommentDB->user_id )->name,
                    'Message' => $CommentDB->message
                ];
    }
    return $Comment;
  }
  
  /*
   * @todo get related posts
   * @var Object()
   */
  function getRelatedPost()
  {
    $Posts;
    if( $this->TopicId == 0 )
     $Posts = Post::where( 'post_id', $this->Id )->get();
    else
     $Posts = Post::whereNotIn( 'id', array( $this->Id ) )
            ->Where( 'post_id', $this->TopicId )
            ->orWhere( 'id', $this->TopicId )
            ->get();
    return new DeckOfTopic( $Posts );
  }
  
}
