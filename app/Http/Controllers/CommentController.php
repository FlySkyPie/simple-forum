<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\CommentService;

class CommentController extends Controller
{
  protected $CommentService;
  public function __construct( CommentService $CommentService )
  {
    $this->CommentService = $CommentService;
  }
  /*
   * @param Integer $CommentId
   */
  public function destroy( $CommentId )
  {
    $TopicId = $this->CommentService->deleteComment( $CommentId );
    return redirect()->route('post.show', ['id' => $TopicId] );
  }
  
  /*
   * @param Request $Request
   * @param Integer $PostId
   */
  public function store(Request $Request, $PostId )
  {
    $this->CommentService->addComment( $Request, $PostId );
    return redirect()->route('post.show', ['id' => $PostId ] );
  }
}