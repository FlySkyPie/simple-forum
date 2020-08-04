<?php
namespace App\Repository;

use App\Repository\Forum\DeckOfTopic;
use App\Model\Post;

class HomepageRepository
{
  /**
   * 取得第三方合作網站連結
   * Get website url of thrid cooperator's.
   */
  function getThirdCooperator()
  {
    $list = array();

    $list[] =  (object)[
        'Name' => 'Test Link 1',
        'URL' => 'http://www.test1.com/'
    ];
    
    $list[] =  (object)[
        'Name' => 'Test Link 2',
        'URL' => 'http://www.test2.com/'
        ];
    return $list;
  }
  
   /**
   * 取得C幣狀態
   * Get Craft Bill status.
   */
  function getCraftBillStatus()
  {
    return (object)[
        'TotalAmount' => "--",
        'TotalTrading' => "--",
        'TotalPost' => Post::all()->count()
    ];
  }
  
  /**
   * 取得熱門文章資料
   * Get hottest posts.
   * @param Integer $Number
   */
  function getHottestPostAbstracts( $Number )
  {
    $Data =  Post::where('created_at','>',\Carbon\Carbon::now()->subWeek())
            ->where('is_deleted',0)
            ->orderBy('score','DESC')->skip(0)->take( $Number )->get();
            
    return new DeckOfTopic( $Data );
  }
  
  /**
   * 取得最新文章資料
   * Get newest posts.
   * @param Integer $Number
   */
  function getNewestPostAbstracts( $Number )
  {
    $Data = Post::orderBy('id','DESC')->where('is_deleted',0)
            ->limit( $Number )->get();
         
    return new DeckOfTopic($Data);
  }
  
  /**
   * 取得隨機文章資料
   * Get random posts.
   * @param Integer $Number
   */
  function getRandomPostAbstracts( $Number )
  {
    $Data = Post::inRandomOrder()->where('is_deleted',0)
            ->limit( $Number )->get(); 
    
    return new DeckOfTopic( $Data );
  }
}
