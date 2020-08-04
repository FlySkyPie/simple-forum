@extends('CraftBillForum.layouts.master')

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
        <div class="col-md-2">
          @if ( config('forum.craftbill') )
          <div class="row">
            <div class="col-md-12 text-center">
              <a href="#"><img class="d-block mx-auto" src="{{ url('/img').'/buttonUP.png' }}" width="75" height="75"> </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h4 class="text-center">{{ $Post->Score }}</h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <a href="#"><img class="d-block mx-auto" src="{{ url('/img').'/buttonDOWN.png' }}" width="75" height="75"> </a>
            </div>
          </div>
          @endif
        </div>
        <div class="col-md-10">
          @auth
            @if( $Post->TopicId ==0 && !$Post->IsDeleted ) 
            <ul class="nav justify-content-end nav-pills">
              <li class="nav-item">
                <a href="{{  route('post.createreply', ['id' => $Post->Id ]) }}" class="active nav-link m-1">回覆此文章</a>
              </li>
            </ul>
            @endif
          @endauth
          <div class="row">
            <div class="col-md-12 m-0 p-0 border border-info">
              <p class="lead bg-primary m-0 p-2">{{ $Post->Title }}</p>
              <p class="px-2">
                發文者：<a href="{{ route('search.result', ['tag' => $Post->getAuthorName()]) }}">{{ $Post->getAuthorName() }}</a>
                @if( is_null( $Post->Edited ) )
                  <br>{{ $Post->Posted }}
                @else
                  <br>最後編輯於 {{ $Post->Edited }}
                @endif
              </p>
              <div class="px-2">
                {!! Markdown::convertToHtml( $Post->Message )  !!}
              </div>
              <br>
              @auth
                @if ( !$Post->IsDeleted && ($Post->AuthorId == Auth::user()->id)  )
                <ul class="nav nav-pills justify-content-between flex-row-reverse px-3 py-2">
                  <div class="btn-group">
                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">編輯文章</button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{  route('post.edit', ['id' => $Post->Id ]) }}">編輯文章</a>
                      <form method="POST" action="{{ route('post.destroy', ['id' => $Post->Id ]) }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="dropdown-item" type="submit">刪除文章</button>
                      </form>
                    </div>
                  </div>
                </ul>
                @endif
              @endauth
            </div>
          </div>
          <div class="row bg-light">
            <div class="">
              <h6 class="w-100 my-1">標籤：</h6>
            </div>
            <div class="col-md-11 w-100 m-0 p-0">
              @foreach ( $Post->getKeyword() as $Tag)
              <div class="btn-group">
                <a href="{{  url('search/'. $Tag->Word ) }}" class="btn btn-sm border border-primary w-100 btn-link">{{ '#'.$Tag->Word }}</a>
              </div>
              @endforeach  
            </div>
          </div>
          <div class="row bg-light">
            @foreach( $Post->getComment() as $Comment )  
            <div class="bg-light col-md-10">
                <a href="{{ route('search.result', ['tag' => $Comment->AuthorName ]) }}">{{ $Comment->AuthorName }}</a>：{{ $Comment->Message }}
            </div>
            @auth
            @if( $Comment->AuthorId == Auth::user()->id )
            <div class="bg-light offse col-md-2">
              <form method="POST" action="{{ route('comment.destroy', ['id' => $Comment->Id ]) }}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button class="btn btn mx-4" type="submit">〔刪除〕</button>
              </form>
            </div>
            @endif
            @endauth
            @endforeach 
          </div>
          @auth
            @if ( !$Post->IsDeleted )
            <div class="row">
              <div class="col-md-12 bg-light p-1">
                <form class="form-inline w-100" method="POST" action="{{ route('comment.store', ['id' => $Post->Id ]) }}">
                  {{ csrf_field() }}
                  <textarea class="form-control form-control-sm w-75 h-25" name="message" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 81px;" placeholder="輸入留言內容"></textarea>
                  <div class="input-group">
                    <div class="input-group-append">
                      <button class="btn btn-primary w-100" type="submit">送出留言</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            @endif
          @endauth
          @foreach( $Post->getRelatedPost()->getPhalanx(0) as $RelatePost )
          <div class="row" >
              <a class="card" href="{{ route('post.show', [ $RelatePost->Id ])   }}" >
                <span>
                      <h5 class="m-1">{{ $RelatePost->Title }}</h5>
                      <p class="m-1">{{ $RelatePost->Message  }}</p>
                </span>
              </a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
