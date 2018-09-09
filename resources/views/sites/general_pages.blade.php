@extends('layouts.frontend')
@section('content')
  <!-- header section start -->
       @include('sites.header')
  <!-- header section end -->  
  @if($pages->banner_image)
   <section class="banner">
      <div class="inner-banner" style="background-image:url({{ asset('images/sites/general_pages/'.$pages->banner_image) }});"></div>
    </section>
  @endif
  <!-- Nav section start -->
       @include('sites.nav')
  <!-- Nav section end -->

  <!-- nav chat section start -->
      @include('sites.nav_chat')
  <!-- nav chat section end -->  
<div class="inner-section">
  <div class="container">
    <div class="site-heading text-center">
      <h3>{{ $pages->name or ''}}</h3>
      <p class="para-intro">{!! $pages->short_description or '' !!}</p>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-sm-offset-0 col-md-10 col-md-offset-1">
        <div class="inner-content para-intro">
    		{!! $pages->content or '' !!}.
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
