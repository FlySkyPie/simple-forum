@extends('CraftBillForum.layouts.master')

@section('content')
<div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-primary">
            <div class="card-body">
            <h1 class="mb-4">登入</h1>
              <form method="POST"  action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <div class="form-group"> <label>電子郵件</label>
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email" required autofocus>
                  @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                  </div>
                </div> 
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <div class="form-group"> <label>密碼</label>
                  <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                  </div>
                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>  
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 記住密碼
                    </label>
                </div>
                <button type="submit" class="btn btn-lg btn-secondary">登入</button>
                <a class="btn btn-secondary btn-lg mx-3" href="{{ route('password.request') }}">忘記密碼</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection