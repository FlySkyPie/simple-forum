@extends('CraftBillForum.layouts.master')

@section('content')
<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        @include('CraftBillForum.layouts.navkeyword')
      </div>
      <div class="col-md-10">
        <p class="bg-primary lead p-2">搜尋結果：「{{ $OriginalString }}」</p>
        @if(!empty( $UserInfo ))
        <div class="row">
            <div class="col-md-12">
              <p class="bg-light">{{ $UserInfo->Name }}
                <br>聯絡方式：{{ $UserInfo->Email }}
                <br>文章數：{{ $UserInfo->Posts }}
              </p>
            </div>
        </div>
        @endif
        @if (!empty( $Error ))
        <div class="row my-1">
            <div class="col-md-12">
              <p class="lead bg-light">{{ $Error }}</p>
            </div>
        </div>
        @else
          @foreach ( $Posts as $Row)
            <div class="row my-1">
            @foreach ($Row as $Post)
              <div class="col-md-3">
                <a class="card" href="{{ route('post.show', [ $Post->Id ]) }}" target="_blank">
                  <span>
                    @if(!empty( $Post->Image )) 
                      <div class="card-img-top img-fluid" style=" height:160px;overflow: hidden;display:flex;align-items:center;background-color: #222222;">
                        <img style="width: 100%;" src="{{ $Post->Image }}" alt="Card image cap">
                      </div>
                    @endif
                    <div class="card-body">
                      <h5 class="card-title">{{ $Post->Title }}</h5>
                      <p class="card-text">{{ $Post->Message }}
                      </p>
                    </div>
                  </span>
                </a>
              </div>
            @endforeach
            </div>
          @endforeach
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-md-12"> </div>
    </div>
  </div>
</div>
@endsection
