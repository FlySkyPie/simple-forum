@extends('CraftBillForum.layouts.master')

@section('content')
<div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-primary">
            <div class="card-body">
              <h1 class="mb-4">找回密碼</h1>
              
              @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif
              
              <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> 
                  <label>電子信箱</label>
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email" required>
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                  <small class="form-text text-light">請輸入註冊時的信箱以發送重設連結</small>
                </div>
                
                  <button type="submit" class="btn btn-secondary">重新設定密碼</button>
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection