<?php

namespace App\Repository\Forum;

use App\Repository\Forum\Viewpoint;
use GrahamCampbell\Markdown\Facades\Markdown; //use markdown plugin

class TopicCard extends Viewpoint
{
  public $Title;
  public $Image;
  
  /*
   * @param App\CraftBillForum\Topic $Post
   */
  function __construct( $Post ) 
  {
    $this->Id = $Post->Id;
    $this->AuthorId = $Post->AuthorId;
    
    $this->Title = $Post->Title;

    $MessageMarkdown = $Post->Message;
   
    $MessageHTML = Markdown::convertToHtml($MessageMarkdown);
    $HasImage =  preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $MessageHTML, $img);  //find url of first image
    
    $str = strip_tags($MessageHTML ); //remove HTML tag
    
    if($HasImage)
      $this->Image = $img[1];
    
    $this->Message = $HasImage ? mb_substr( $str  , 0 , 80, 'UTF-8' ) : mb_substr( $str  , 0 , 125, 'UTF-8' );  //If it isn't had image, then more text ! :D
   
  }
}
