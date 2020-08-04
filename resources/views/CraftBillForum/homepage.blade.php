@extends('CraftBillForum.layouts.master')

@section('content')
<div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="row"> </div>
          <div class="row">
            <div class="col-md-12 mx-2">
              <p class="lead bg-primary text-center">關於本站</p>
              <p class="lead bg-primary text-center">所有文章</p>
              <p class="lead bg-primary text-center">所有關鍵字</p>
            </div>
          </div>
          @include('CraftBillForum.layouts.navkeyword')
          @if ( config('forum.craftbill') )
          <div class="row">
            <div class="col-md-12 mx-2">
              <p class="lead bg-primary text-center">C幣統計錶</p>
              <a>C幣總數：{{ $CraftBillStatus->TotalAmount }}</a><br>
              <a>交易數：{{ $CraftBillStatus->TotalTrading }}</a><br>
              <a>文章數：{{ $CraftBillStatus->TotalPost }}</a><br>
            </div>
          </div>
          @endif
          <div class="row">
            <div class="col-md-12 mx-2">
              <p class="lead bg-primary text-center">第三方網站連結</p>
                @foreach ($ThirdCooperators as $ThirdCooperator)
                    <a href="{{ $ThirdCooperator->URL }}" target="_blank">{{ $ThirdCooperator->Name }}</a><br>
                @endforeach
            </div>
          </div>
        </div>
        <div class="col-md-9">
          @foreach ( $Posts as $PostType => $Rows)
          <div class="row">
            <div class="col-md-12">
              <p class="lead bg-primary text-center">{{ $PostType }}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                @foreach ($Rows as $Row)
                    <div class="row my-1">
                        @foreach ($Row as $Post)
                        <div class="col-md-4">
                            <a class="card" href="{{ route('post.show', [ $Post->Id ])  }}" target="_blank">
                            <span>
                              @if( !empty( $Post->Image ) ) 
                              <div class="card-img-top img-fluid" style=" height:180px;overflow: hidden;display:flex;align-items:center;background-color: #222222;">
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
            </div>
          </div> 
          @endforeach  
        </div>
      </div>
    </div>
</div>
@endsection
