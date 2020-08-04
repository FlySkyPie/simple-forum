@extends('CraftBillForum.layouts.master')

@section('content')
<div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-primary">
            <div class="card-body">
              <h1 class="mb-4">註冊
                <br>
              </h1>
              <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                    <label for="exampleInputEmail1">用戶名稱</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="設定用戶名稱" required autofocus>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                    
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label>電子郵件</label>
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="輸入電子信箱" required>
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
                
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label>密碼</label>
                  <input id="password" type="password" class="form-control" name="password" placeholder="設定密碼" required>
                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">確認密碼</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="確認密碼" required>
                </div>
                <button type="submit" class="btn btn-lg btn-secondary mx-0">註冊</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
