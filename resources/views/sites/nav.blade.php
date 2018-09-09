<nav class="navbar navbar-default navbar-site hidden-xs">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">
      {{ transLangs($static_langs,'Toggle navigation',$langsName) }}
      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand hidden" href="#">
       {{ transLangs($static_langs,'Brand',$langsName) }}
      </a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">    
      <ul class="nav navbar-nav">
      @foreach ($regions as $reg)
        <li @if(isset($selected_trips))
          class="@if($selected_trips == $reg->region_name){{ 'active' }} @endif"
        @endif><a href="{{route('trip_details',$reg->slug)}}">{{$reg->region_name}}</a></li>
      @endforeach       
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>