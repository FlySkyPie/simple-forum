<div class="row">
  <div class="col-md-12 mx-2">
    <p class="lead bg-primary text-center">熱門關鍵字</p>
    <ul class="">
      @foreach ( $HotKeywords as $HotKeyword)
      <li><a href="{{ route('search', [ 'search' => $HotKeyword->Word ]) }}">{{ $HotKeyword->Word }}</a></li>
      @endforeach
    </ul>
  </div>
  </div>
  <div class="row">
  <div class="col-md-12 mx-2">
    <p class="lead bg-primary text-center">站方關鍵字</p>
    <ul class="">
      @foreach ( $OfficialKeywords as $OfficialKeyword )
          <li><a href="{{ route('search', [ 'search' =>  $OfficialKeyword->Word ]) }}">{{ $OfficialKeyword->Word }}</a></li>
      @endforeach
    </ul>
  </div>
</div>
