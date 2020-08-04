<?php
namespace App\Http\Controllers;

use App\Repository\NavbarRepository;
use App\Repository\SearchRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class SearchController extends Controller
{
  protected $SearchRepository, $NavbarRepository;
  
  public function __construct( SearchRepository $SearchRepository,
                                NavbarRepository $NavbarRepository)
  {
    $this->SearchRepository = $SearchRepository;
    $this->NavbarRepository = $NavbarRepository;
  }
  
  public function show( $String )
  {
    $Result = $this->SearchRepository->getSearchResult( $String );
    
    return view('CraftBillForum.search')
            ->with( 'HotKeywords',      $this->NavbarRepository->getHotKeyword() )
            ->with( 'OfficialKeywords', $this->NavbarRepository->getOfficialKeyword() )
            ->with( 'Error',    $Result->Error )
            ->with( 'UserInfo', $Result->UserInfo )
            ->with( 'Posts',    $Result->Posts )
            ->with( 'OriginalString', $Result->OriginalString );
  }
  
  /** 
  * @todo 重新定向搜尋頁
  */
  public function start()
  {
    $Search = Input::get(['search']);
    if ( $Search =="" )
      return Redirect::to('/');

    return Redirect::to('/search/'.$Search);
  }
}
