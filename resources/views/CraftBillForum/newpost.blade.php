@extends('CraftBillForum.layouts.masterpost')

@section('content')
<div class="py-5">
    <div class="container">
      
      @if ($errors->any())
      <div class="row">
        <div class="col-md-12 my-2">
          <div class="bg-warning p-2">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      @endif
      
      <div class="row">
        <div class="col-md-12 my-2">
          <p class="lead bg-primary p-2">發表文章</p>
          <form class=""  method="POST" action="{{ route('post.store') }}">
            <div class="form-group"><label for="exampleInputEmail1">文章分類</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="tag" value="分享" checked="" type="radio"><label class="form-check-label" for="exampleRadios1">分享</label></div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="tag" value="教學" type="radio"><label class="form-check-label" for="exampleRadios1">教學</label></div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="tag" value="技術" type="radio"><label class="form-check-label" for="exampleRadios1">技術</label></div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="tag" value="問題" type="radio"><label class="form-check-label" for="exampleRadios1">問題</label></div>
            </div>
            {{ csrf_field() }}
            <div class="form-group"><label for="exampleInputEmail1">文章標題</label>
              <input class="form-control" name="title" placeholder="輸入文章標題" type="text"> 
            </div>
            <div class="form-group">
                <label>文章內文</label>
                <textarea id="textarea-id" class="form-control markdown" name="message" rows="20" placeholder="輸入內文"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">標籤</label>
              <input class="form-control" name="keywords" placeholder="文章關鍵字" type="text">
            </div>
            <button type="submit" class="btn btn-primary">送出</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection