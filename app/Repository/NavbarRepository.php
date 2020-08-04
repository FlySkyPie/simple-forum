<?php
namespace App\Repository;

use App\Model\Post_keyword;
use App\Model\Keyword;

use Illuminate\Support\Facades\DB;


class NavbarRepository
{
  /**
   * @todo 取得熱門關鍵字
   * @todo Get hottest keywords.
   * @var Array
   */
  function getHotKeyword()
  {
    $KeyIDs = Post_keyword::whereNotIn( 'keyword_id', array( 1, 2, 3, 4, 5, 6, 7 ) )  //don't contain offical keyword
            ->select('keyword_id',DB::raw('count(*) as total'))
            ->groupBy('keyword_id')
            ->orderBy('total','DESC')->skip(0)->take(10)->get();  //id-count

    $HotKeys = array();
    foreach($KeyIDs as $KeyId )
    {
      $Key = Keyword::find( $KeyId->keyword_id );

      $HotKeys[] = (object)[
          'Id'    => $Key->id,
          'Word'  => $Key->word ,
      ];   
    }
    return $HotKeys;
  }
  
  /**
   * @todo 取得站方關鍵字
   * @todo Get official keywords.
   * @Array
   */
  function getOfficialKeyword()
  {
    $Keywords = array(
        'Keyword A',
        'Keyword B',
        'Keyword C',
        '技術',
        '教學',
        '分享',
        '問題',
    );

    $OfficialKeywords = array();
    foreach($Keywords as $Keyword)
    {
      $result = Keyword::firstOrCreate(['word' => $Keyword]);  //check keyword exist, if not then create one!

      $OfficialKeywords[] = (object)[
          'Id' => $result->id,
          'Word' =>$Keyword
      ];
    }
    return $OfficialKeywords;
  }
  
}
