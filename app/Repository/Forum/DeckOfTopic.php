<?php

namespace App\Repository\Forum;

use App\Repository\Forum\TopicCard;
use App\Repository\Forum\Topic;

/*
 * for display posts like crads on forum.
 */
class DeckOfTopic
{
  public $Cards = array();
  
  
  /*
   * @param Object(\Illuminate\Database\Eloquent\Collection) $Posts
   */ 
  function __construct( \Illuminate\Database\Eloquent\Collection $Posts )
  {
    foreach( $Posts as $Post )
      $this->addPost( new Topic( $Post ) );
  }
  
  /*
   * @todo tranform Post to PostCard and add it to deck
   * @param App\CraftBillForum\Topic $Post
   */
  public function addPost( $Post )
  {
    $this->Cards[] = new TopicCard( $Post );
  }

  /*
   * @todo create phalanx of post card for display
   * @param Integer $Column
   * @var Array 
   */
  public function getPhalanx( $Column )
  {
    if( $Column === 0 )
      return $this->Cards;
    
    //reconstruct to $Column columns in row
    $Rows = array();
    $tmpColumn = array();
    $Index = 1;
    
    foreach( $this->Cards as $Card )
    {
      $tmpColumn[] = $Card;
      if( $Index % $Column === 0 )
      {
        $Rows[] = $tmpColumn;
        $tmpColumn = array();      //clean tmp column
      }
      $Index +=1;
    }
    
    if(!empty($tmpColumn))
      $Rows[] = $tmpColumn;

    return $Rows;
  }
  
  /*
   * @todo check cards are empty
   * @var Boolean
   */
  public function isEmpty()
  {
    return empty( $this->Cards );
  }
}
