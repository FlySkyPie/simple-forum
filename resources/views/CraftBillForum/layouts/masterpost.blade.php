<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ url('/css/font-awesome.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{ url('/css/theme.css')}}" type="text/css"> 
  <link rel="stylesheet" href="{{ url('/css/forum.css')}}" type="text/css"> 
  <!-- Font Awesome 5.x Icon library (check themes to change this) -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <!-- Krajee Markdown Editor Main Library Default Style -->
  <link href="{{ url('/css/markdown-editor.css')}}" media="all" rel="stylesheet" type="text/css"/>
  <!-- Highlight JS style provided with plugin for code styling -->
  <link href="{{ url('/plugins/highlight/highlight.min.css')}}" media="all" rel="stylesheet" type="text/css"/>
  <!-- jQuery JS Library -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!-- Twitter Emojis Plugin (if you need twitter emojis) -->
  <script src="http://twemoji.maxcdn.com/2/twemoji.min.js?11.0"></script>
  <!-- Include DOM purify plugin if you need to purify HTML output (needed only if markdown-it HTML input 
     is allowed). This must be loaded before markdown-editor.js. -->
  <script src="{{ url('/plugins/purify/purify.min.js')}}"></script>

  <!-- Markdown IT Main Library -->
  <script src="{{ url('/plugins/markdown-it/markdown-it.min.js')}}"></script>
  <!-- Markdown IT Definition List Plugin -->
  <script src="{{ url('/plugins/markdown-it/markdown-it-deflist.min.js')}}"></script>
  <!-- Markdown IT Footnote Plugin -->
  <script src="{{ url('/plugins/markdown-it/markdown-it-footnote.min.js')}}"></script>
  <!-- Markdown IT Abbreviation Plugin -->
  <script src="{{ url('/plugins/markdown-it/markdown-it-abbr.min.js')}}"></script>
  <!-- Markdown IT Subscript Plugin -->
  <script src="{{ url('/plugins/markdown-it/markdown-it-sub.min.js')}}"></script>
  <!-- Markdown IT Superscript Plugin -->
  <script src="{{ url('/plugins/markdown-it/markdown-it-sup.min.js')}}"></script>
  <!-- Markdown IT Underline/Inserted Text Plugin -->
  <script src="{{ url('/plugins/markdown-it/markdown-it-ins.min.js')}}"></script>
  <!-- Markdown IT Mark Plugin -->
  <script src="{{ url('/plugins/markdown-it/markdown-it-mark.min.js')}}"></script>
  <!-- Markdown IT SmartArrows Plugin -->
  <script src="{{ url('/plugins/markdown-it/markdown-it-smartarrows.min.js')}}"></script>
  <!-- Markdown IT Checkbox Plugin -->
  <script src="{{ url('/plugins/markdown-it/markdown-it-checkbox.min.js')}}"></script>
  <!-- Markdown IT East Asian Characters Line Break Plugin -->
  <script src="{{ url('/plugins/markdown-it/markdown-it-cjk-breaks.min.js')}}"></script>
  <!-- Markdown IT Emoji Plugin -->
  <script src="{{ url('/plugins/markdown-it/markdown-it-emoji.min.js')}}"></script>
  <!-- Highlight JS Main Plugin Library for code styling -->
  <script src="{{ url('/plugins/highlight/highlight.min.js')}}" type="text/javascript"></script>
  <!-- Bootstrap 4.x Complete Bundle Library (including Popper) -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>
  <!-- Krajee Markdown Editor Main Library -->
  <script src="{{ url('/js/markdown-editor.js')}}" type="text/javascript"></script>
  <script>
  // initialize with defaults
  $("#textarea-id").markdownEditor();
  </script>
  
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