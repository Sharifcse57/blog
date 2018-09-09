<header id="header">
 <nav class="navbar navbar-default navbar-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <span type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><i class="hurtigruten-icon icon-navigation"></i> {{ transLangs($static_langs,'menu',$langsName) }}</span>        
       <a class="navbar-brand" href="{{ route('home') }}">
        @if($site_settings)          
            <img src="{{asset('images/sites/site_settings/'.$site_settings->logo)}}" alt="{{ $site_settings->logo_alt }}" class="img-responsive logo"></a>
        @endif
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      {{-- ==========include search part start==========--}}
       @include('sites.mobile_nav')
      {{-- ==========include search part end==========--}}
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('sites.blog') }}">旅行贴士</a></li>
          <li class="lang">
            <div class="form-select">

            @if(session()->get('langsName'))
                @php $langId=session()->get('langsName'); @endphp
               {{ Form::select('lang_id',config('myhelpers.langsName'),session()->get('langsName'),array('onchange'=>'setlangsName(this.value)')) }}
            @else
            @php $langId=2; @endphp
              {{ Form::select('lang_id',config('myhelpers.langsName'),2,array('onchange'=>'setlangsName(this.value)')) }}
            @endif 
            </div>
          </li>
        <li><a class="search-icon" href="javascript:void(0)" onclick="openNav()">{{ transLangs($static_langs,'Search',$langsName) }}</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav> 
</header>