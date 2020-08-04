<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ url('/css/font-awesome.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{ url('/css/theme.css')}}" type="text/css"> 
  <link rel="stylesheet" href="{{ url('/css/forum.css')}}" type="text/css"> 
  <title>The Simple Forum</title>
</head>

<body>
  <!-- Nav Bar -->
  @include('CraftBillForum.layouts.navbar')
  <!-- Content -->
  @yield('content')
  <!-- Footer -->
  @include('CraftBillForum.layouts.footer')
  <script src="{{ url('/js/jquery-3.2.1.slim.min.js')}}" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="{{ url('/js/popper.min.js')}}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="{{ url('/js/bootstrap.min.js')}}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>