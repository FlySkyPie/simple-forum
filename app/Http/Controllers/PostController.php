<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\TopicRepository;
use App\Service\PostService;

class PostController extends Controller
{
  protected $TopicRepository, $PostService;
  
  public function __construct( TopicRepository $TopicRepository,
                              PostService $PostService )
  {
    $this->TopicRepository = $TopicRepository;
    $this->PostService = $PostService;
  }
  
  /* 
  * RESTful 配置
  */
  /**
  * @todo 顯示發文頁面
  */
  public function create()
  {
    return view('CraftBillForum.newpost');
  }

  /**
  * @todo 新增文章
  */
  public function store( Request $Request )
  {
    $PostId = $this->PostService->addPost( $Request, 0 );
    
    if ($PostId)
      return redirect()->route('post.show', ['id' => $PostId]);
    else
      return redirect()->back()->withInput()->withErrors('發文失敗');
  }
  
  public function storeReply( Request $Request, $TopicId )
  {
    $PostId = $this->PostService->addPost( $Request, $TopicId );
    
    if ( $PostId )
      return redirect()->route('post.show', ['id' => $PostId]);
    else
      return redirect()->back()->withInput()->withErrors('發文失敗');
  }

  /**
  * @todo 顯示文章
  * @todo show the post
  * @param Integer $PostId
  */
  public function show( $PostId )
  {
    return view('CraftBillForum.post')
          ->with( 'Post', $this->TopicRepository->getTopic( $PostId ) );
  }
  
  /*
   * @todo show the edit page which post user want edited
   */
  public function edit( $PostId )
  {
    $Post =  $this->TopicRepository->getTopic( $PostId );
    
    return view('CraftBillForum.editpost')
          ->with( 'Post', $Post );
  }

  public function update(Request $Request, $PostId )
  {
    $this->PostService->updatePost( $Request, $PostId );

    return redirect()->route('post.show', ['id' => $PostId]);
  }

  public function  destroy( $PostId )
  {
    $this->PostService->deletePost( $PostId );

    return redirect()->route('post.show', ['id' => $PostId]);
  }
  public function createreply( $PostId )
  {
    $Post = $this->TopicRepository->getTopic( $PostId );
    
    return view('CraftBillForum.newreplypost')
            ->with( 'Title', $Post->Title )
            ->with( 'ReplyId', $PostId );
  }
  
  /*=============================================
  * for comment process
  *=============================================*/
  

  

  

}
