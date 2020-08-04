<?php
namespace App\Service;

//use App\Repository\Forum\Topic;

use App\Model\Post;
use App\Model\Keyword;
use App\Model\Post_keyword;

class PostService
{
  /*
   * @todo edit a old post
   * @param Request $Request
   * @param Integer $PostId
   * @var Integer 
   */
  public function updatePost( $Request, $PostId )
  {
    $Post = Post::find( $PostId );
    
    $Post->title    = ( $Post->post_id ) ? $Post->title : $Request->get('title') ;
    $Post->message  = $Request->get('message');
    if ( $Post->save() )
    {
      $KeywordIds = $this->addKeywordByHashString( $Request->get('keywords') );
      $this->updateKeywordOfPost ($KeywordIds, $PostId );

      return $Post->id;
    }
    
    return 0;
  }
  
  /*
   * @todo add a new post
   * @param Request $Request
   * @var Integer
   */ 
  public function addPost( $Request , $TopicId )
  {
    $Title = $TopicId ? ( 'RE:' . Post::find( $TopicId )->title ) : $Request->get('title') ;
    
    $Post = new Post;
    $Post->post_id  = $TopicId;
    $Post->title    = $Title;
    $Post->message  = $Request->get('message');
    $Post->user_id  = $Request->user()->id;
    if ($Post->save()) {
      //add tags
      $KeywordIds = $this->addKeywordByHashString($Request->get('keywords'));
      $this->addKeywordToPost($KeywordIds, $Post->id);

      return $Post->id;
    } else {
      return 0;
    }
  }
  
  /*
   * @todo  add keyword to database from the string wthich had hashtags
   * @param String $String
   * @var Array
   */
  public function addKeywordByHashString( $String )
  {
    $Words = array_filter(explode('#',$String));
    $KeywordIds = array();
    foreach ($Words as $Word) {
      $KeywordIds[] = Keyword::firstOrCreate(['word' => $Word])->id;
    }

    return $KeywordIds;
  }
  
  /*
   * @todo connect keywords to post
   * @param Array $KeywordIds
   * @param Integer $PostId
   */
  public function addKeywordToPost( $KeywordIds, $PostId )
  {
    foreach ($KeywordIds as $KeywordId) {
      Post_keyword::create([
          'post_id' => $PostId,
          'keyword_id' => $KeywordId
      ]);
    }
  }
  
  /*
   * @todo update the connection of post and keyword
   * @param Array $NewKeywordIds
   * @param Integer $PostId
   */
  public function updateKeywordOfPost( $NewKeywordIds, $PostId )
  {
    $OldKeyWordIds = Post_keyword::where( 'post_id', $PostId )->get()->pluck('keyword-id')->all();;
    $DiffKeyWordIds = array_diff( $NewKeywordIds, $OldKeyWordIds );
    $AddKeywordIds = array();
    $RemoveKeywordIds = array();
    foreach( $DiffKeyWordIds as $DiffKeyWordId )
      if (in_array($DiffKeyWordId, $NewKeywordIds)) 
        $AddKeywordIds[] = $DiffKeyWordId;   //that's added
      else 
        $RemoveKeywordIds = $DiffKeyWordId;  //that's removed

    $this->addKeywordToPost( $AddKeywordIds, $PostId );
    $this->removeKeywordFromPost($RemoveKeywordIds, $PostId );
    
  }
  
  /*
   * @todo remove certain keyword from post with KeywordIds
   * @param Array $keywordIds
   * @param Integer $PostId
   */
  public function removeKeywordFromPost( $KeywordIds, $PostId )
  {
    Post_keyword::where( 'post_id', $PostId )->whereIn( 'keyword_id', $KeywordIds )->delete();
  }
  
  /*
   * @todo delete the post
   */
  public function deletePost( $PostId )
  {
    $Post = Post::find( $PostId );
    
    $Post->title = "[文章已被刪除]" ;
    $Post->message = "本文章已於 ".date('Y-m-d H:i:s')." 刪除。";
    $Post->post_id = 0;
    $Post->is_deleted = 1;
    $Post->save();

    Post_keyword::where( 'post_id', $PostId )->delete();  //remove tags connection
  }
}
