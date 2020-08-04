@extends('CraftBillForum.layouts.masterpost')

@section('content')
<div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          @if( $Post->TopicId == 0 )
          <p class="lead bg-primary p-2">編輯文章</p>
          @else
          <p class="lead bg-primary p-2">編輯文章 {{ $Post->Title }}</p>
          @endif
          @if ($errors->any())
            <div class="lead px-1 bg-warning">
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form class=""  method="POST" action="{{ route('post.update', ['id' => $Post->Id ]) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            @if( $Post->TopicId == 0 )
            <div class="form-group"><label for="exampleInputEmail1">文章標題</label>
              <input class="form-control" name="title" placeholder="輸入文章標題" type="text" value="{{ $Post->Title }}"> 
            </div>
            @endif
            <div class="form-group">
                <label>文章內文</label>
                <textarea id="textarea-id" class="form-control markdown" name="message" rows="20" placeholder="輸入內文" >{{ $Post->Message }}</textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">標籤</label>
              <input class="form-control" name="keywords" placeholder="文章關鍵字" type="text" value="{{ $Post->getHashTags() }}">
            </div>
            <button type="submit" class="btn btn-primary">送出</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
