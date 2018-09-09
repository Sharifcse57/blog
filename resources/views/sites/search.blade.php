@extends('layouts.frontend')
@section('content')
  <!-- header section start -->
       @include('sites.header')
  <!-- header section end -->

  <!-- Nav section start -->
       @include('sites.nav')
  <!-- Nav section end -->

  <!-- nav chat section start -->
        @include('sites.nav_chat')
    <!-- nav chat section end --> 

<section class="content-parent">
    <div class="container-fluid site-container">       
        <div class="row">

      @if(count($excursions)>0)
          <h4 class="excursions-header hidden-xs">{{ transLangs($static_langs,'Excursions',$langsName) }}</h4>
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
          @endif
        </div>

{{-- highlight section start --}}
    <div class="row">
       @if(count($highlights)>0)
          <h4 class="excursions-header hidden-xs">{{ transLangs($static_langs,'Highlights',$langsName) }}</h4>
        @foreach ($highlights as $hkey=>$highlight)        
            <div class="highligts-content">
                <div class="row">
          
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div id="highligts-carousel{{ $hkey }}" class="carousel slide highligts-carousel" data-ride="carousel" data-interval="false">
                            <ol class="carousel-indicators visible-xs">
                            @foreach ($highlight->images as $himgval1) 
                                <li data-target="#highligts-carousel{{ $hkey }}" data-slide-to="{{ $loop->iteration-1 }}" class="@if($loop->first) {{ 'active'}}  @endif"></li>
                            @endforeach
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                            @foreach ($highlight->images as $himgval) 
                                <div class="item @if($loop->first) {{ 'active'}}  @endif" style="background-image:url({{ asset('images/sites/highlights/'.$himgval->image) }});">
                                    <div class="carousel-caption">
                                        {{ $loop->iteration }} / {{ $loop->count }}: {!! $himgval->caption !!}
                                    </div>
                                </div>                              
                             @endforeach
                            </div>
                            @if(count($highlight->images)>1)
                            <!-- Controls -->
                            <a class="left carousel-control hidden-xs" href="#highligts-carousel{{ $hkey }}" role="button" data-slide="prev">
                                <i class="hurtigruten-icon icon-arrow-left"></i>
                                <span class="sr-only">
                                {{ transLangs($static_langs,'Previous',$langsName) }}
                                </span>
                            </a>
                            <a class="right carousel-control hidden-xs" href="#highligts-carousel{{ $hkey }}" role="button" data-slide="next">
                                <i class="hurtigruten-icon icon-arrow-right"></i>
                                <span class="sr-only">
                                {{ transLangs($static_langs,'Next',$langsName) }}
                                </span>
                            </a>
                           @endif
                        </div>
                    </div>
          
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="highligts-carousel-content">
                         <span class="grid-title"><a href="{{ route('trip_details',$highlight->trip->slug) }}">{{ transLangs($static_langs,'Highlights of the',$langsName) }} {{ $highlight->trip->region_name }}</a></span>
                            <h3>{{ $highlight->name }}</h3>                           
                            <span>{{ transLangs($static_langs,'Location',$langsName) }}: {{ $highlight->location }}</span>
                            <div class="highligts-para">
                                <p class="para-intro">{!! $highlight->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        @endforeach
        </div>
  @endif

    </div>
</section>
@endsection
