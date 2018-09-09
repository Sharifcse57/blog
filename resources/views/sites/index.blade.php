@extends('layouts.frontend')
@section('content')
  <!-- header section start -->
       @include('sites.header')
  <!-- header section end -->
  
  <!-- Banner section start -->
       @include('sites.banner',array('bannerData'=>$banners,'page'=>'home'))
  <!-- Banner section end -->

  <!-- Nav section start -->
       @include('sites.nav')
  <!-- Nav section end -->

  <!-- nav chat section start -->
      @include('sites.nav_chat')
  <!-- nav chat section end --> 
<section class="content-parent">
    <div class="container-fluid site-container">
        <h3 class="excursions-header hidden-xs">{{ transLangs($static_langs,'CONNECT WITH YOUR INNER EXPLORER',$langsName) }}</h3>
        <div class="row">
{{-- {{ $excursions }} --}}

      @if (session()->has('hurtigruten.excursions')) 
        @php $sessionsArr=session()->get('hurtigruten.excursions'); @endphp
      @else
        @php $sessionsArr=[]; @endphp
      @endif

            @foreach ($excursions as $exval)
              <div class="col-xs-12 col-sm-6 col-md-3">
                <a href="{{ route('excursion_details',$exval->slug) }}">                
                    <div class="grid-item">
                        <div class="grid-item-img" style="background-image:url({{ asset('images/sites/excursions/'.$exval->thumb_image)}});"> </div>
                        <div class="grid-item-content">
                            <h2 class="grid-title">{{ $exval->title }}</h2>
                            <h4 class="continent-name">{{ $exval->trip->region_name }}</h4>
                            <i class="hurtigruten-icon icon-box-arrow-left"></i>
                              <br>
                            <div class="like-btn">
                              <a href="javascript:void(0)"
                              @if(in_array($exval->slug,$sessionsArr))
                              class="like liked"
                              @else
                               class="like" onclick="addLoves(this)" 
                              @endif
                              data-items="excurtions"
                              data-slug="{{ $exval->slug }}" 
                              data-langid="{{ $langsName }}"></a>
                              <span>
                                @if(count($exval->loves))
                                    {{ $exval->loves->total }}                                
                                @endif
                              </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
