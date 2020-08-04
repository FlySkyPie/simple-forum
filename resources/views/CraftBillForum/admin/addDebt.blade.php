<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

<body>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="col-md-12 border border-primary">
            @if ($errors->any())
            <div class="bg-warning p-2">
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form class="" method="POST" action="">
              {{ csrf_field() }}
              <div class="form-group">
                <label>使用者電子信箱</label>
                <input name="email" type="email" class="form-control" placeholder="輸入電子信箱">
                <small class="form-text text-muted">核發C幣對象</small>
              </div>
              <div class="form-group">
                <label>核發C幣數量</label>
                <input name="amount" type="text" class="form-control w-25" placeholder="輸入C幣數"> 
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">C幣核發事由</label>
                <input name="reason" type="text" class="form-control" >
                <small class="text-muted form-text">請詳細說明C幣核發事由</small>
              </div>
              <button type="submit" class="btn btn-primary my-2">送出</button>
            </form>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>