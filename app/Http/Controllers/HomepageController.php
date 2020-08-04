<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\NavbarRepository;
use App\Repository\HomepageRepository;

class HomepageController extends Controller
{
  protected $HomepageRepository, $NavbarRepository;
  
  public function __construct( HomepageRepository $HomepageRepository,
                                NavbarRepository $NavbarRepository)
  {
    $this->HomepageRepository = $HomepageRepository;
    $this->NavbarRepository = $NavbarRepository;
  }
  
  /**
   * @todo 顯示首頁
   * @todo show homepage
   */
  public function show()
  {
    return view('CraftBillForum.homepage')
            ->with( 'HotKeywords',      $this->NavbarRepository->getHotKeyword() )
            ->with( 'OfficialKeywords', $this->NavbarRepository->getOfficialKeyword() )
            ->with( 'CraftBillStatus',  $this->HomepageRepository->getCraftBillStatus() )
            ->with( 'ThirdCooperators', $this->HomepageRepository->getThirdCooperator() )
            ->with( 'Posts',[
                '熱門文章' => $this->HomepageRepository->getHottestPostAbstracts(6)->getPhalanx(3),
                '最新文章' => $this->HomepageRepository->getNewestPostAbstracts(6)->getPhalanx(3),
                '隨機文章' => $this->HomepageRepository->getRandomPostAbstracts(3)->getPhalanx(3),
              ] );
  }
  
  public function showError()
  {
    return abort(404, 'No way.');
  }
}
