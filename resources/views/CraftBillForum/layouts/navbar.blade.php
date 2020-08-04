<nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="{{ route('homepage') }}">
        <img src="{{url('/').'/logo.png'}}" width="65" height="65" class="d-inline-block align-top mx-2" alt=""> 
      </a>
      <a class="navbar-brand" >The Simple Forum</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <form class="form-inline my-lg-0 w-50 my-2" method="GET" action="{{ route('search') }}">
          <div class="input-group w-100">
            <input name="search" type="text" class="form-control form-control-sm w-75" placeholder="在這裡輸入關鍵字">
            <button type="submit" class="btn btn-secondary">搜尋</button>
          </div>
        </form>
        @guest
          <a class="btn btn-default navbar-btn mx-1 btn-primary  border-light" href="{{ route('login') }}">登入</a>
          <a class="btn btn-default navbar-btn mx-1 btn-primary  border-light" href="{{ route('register') }}">註冊</a>
        @else

        <div class="dropdown m-2">
          <button class="btn btn-primay dropdown-toggle btn-primary border border-light m-1 px-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }} </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @if ( config('forum.craftbill') )
            <a class="dropdown-item disabled">持有 {{ Auth::user()->balance }} CB</a>
            <div class="dropdown-divider"></div>
            @endif
            <a class="dropdown-item" href="#">我的紙箱(功能未開放)</a>
            <a class="dropdown-item" href="{{ route('post.create') }}">發表文章</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}">登出</a>
          </div>
        </div>
        @endguest
      </div>
    </div>
  </nav>
