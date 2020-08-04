<?php
namespace App\Repository;

use App\Model\Keyword;
use App\Model\Post_keyword;
use App\Model\Post;
use App\User;
use App\Repository\Forum\DeckOfTopic;

class SearchRepository
{
  /*
   * @todo search
   * @param String $String
   */
  public function searchPost( $String ) 
  {
    $Keyword = Keyword::where( 'word', $String )->first();
    if( !$Keyword )
      return NULL;
  
    $PostKeywords = Post_keyword::where( 'keyword_id', $Keyword->id )->get();
    $PostId = array();
    foreach ( $PostKeywords as $PostKeyword )
      $PostId[] = $PostKeyword->post_id;
      
    $Data = Post::findMany( $PostId );
    return new DeckOfTopic( $Data );
  }
  
  /*
   * @todo get information of user
   * @param String $String
   * @var Object
   */ 
  public function getUserInfo( $Name )
  {
    $User = User::where('name', $Name )->first();
    if( !$User )
      return NULL;
    
    $Count = Post::where( 'is_deleted', 0 )
            ->where( 'user_id', $User->id )->count();
            
    return (object)[
        'Id'   => $User->id,
        'Name' => $User->name,
        'Email'=> $User->email,
        'Posts'=> $Count
      ];
  }
  
  /*
   * @todo search user's post
   * @param Integer $UserId
   * @var Array
   */
  public function searchUserPost( $UserId )
  {
    $Data = Post::where( 'user_id', $UserId )->get();
    
    return new DeckOfTopic( $Data );
  }
  
  /*
   * @todo return the search result for controller
   */
  public function getSearchResult( $String )
  {
    if ($User = $this->getUserInfo($String)) 
      $Posts = $this->searchUserPost( $User->Id );
    else
      $Posts = $this->searchPost( $String );
    

    $Error = ( empty( $User ) && ( $Posts===NULL ) ) ? "Oops！找不到關鍵字的資料，試試其他關鍵字吧　　¯\_(ツ)_/¯" : NULL;
    
    return (object)[
        'Error' => $Error,
        'UserInfo' => $User,
        'Posts' => $Posts === NULL ? array() : $Posts->getPhalanx(4),
        'OriginalString' => $String,
      ];
  }
}
