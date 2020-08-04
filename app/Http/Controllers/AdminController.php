<?php

namespace App\Http\Controllers\CraftBillForum;

use App\Http\Controllers\Controller;
use App\CraftBillCore\CraftBillCore;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function showAddDebt()
  {
    return view('CraftBillForum.admin.addDebt');
  }
  
  public function storeDebt( Request $request )
  {
    $request->validate([
      'email' => 'required|string|email|max:255',
      'amount' => 'required',
      'reason' => 'required|string|max:255',
     ]);
    
    $user = User::where( 'email','=',$request->get('email') )->first();
    if( $user === null )
    {
      return redirect()->back()->withInput()->withErrors('使用者不存在！');
    }
    
    $Amount = $request->get('amount');
    $Reason = $request->get('reason');
    
    if ( !CraftBillCore::createDebt( $user->id , $Amount, $Reason ) ) 
    {
      return redirect()->back()->withInput()->withErrors('成功新增債務！');
    }
    else
    {
      return redirect()->back()->withInput()->withErrors('不知怎麼的失敗了！');
    }
  }
  
  public function showTransfer()
  {
    return view('CraftBillForum.admin.transfer');
  }
  
  public function storeTransfer( Request $request )
  {
    $request->validate([
      'email1' => 'required|string|email|max:255',
      'email2' => 'required|string|email|max:255',
      'amount' => 'required',
      'reason' => 'required|string|max:255',
     ]);
    
    $user1 = User::where( 'email','=',$request->get('email1') )->first();
    $user2 = User::where( 'email','=',$request->get('email2') )->first();
    if( $user1 === null || $user2 === null  )
    {
      return redirect()->back()->withInput()->withErrors('使用者不存在！');
    }
    
    $Amount = $request->get('amount');
    $Reason = $request->get('reason');
    
    if ( !CraftBillCore::sendCraftBill( $user1->id , $user2->id , $Amount ,$Reason ) ) 
    {
      return redirect()->back()->withInput()->withErrors('成功轉移C幣！');
    }
    else
    {
      return redirect()->back()->withInput()->withErrors('不知怎麼的失敗了！');
    }
  }
}
