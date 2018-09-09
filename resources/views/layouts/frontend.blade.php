<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M723JK');</script>
<!-- End Google Tag Manager -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="mipellim">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Hurtigruten')</title>
    
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Styles -->
    <link href="{{asset('css/frontend-app.css')}}" rel="stylesheet">   
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script> 

</head>
<body onload="javascript:callPopUpModal()"> 

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M723JK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="row">
  <div class="flash-message">           
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('flash_' . $msg))
      <p class="alert alert-{{ $msg }} {{ Session::has('flash_' . $msg.'_important')? 'alert-important':''}}" style="text-align: center;"><a href="#" class="close" data-dismiss="alert">&times;</a> <strong> {{ $msg }}!!</strong> {{ Session::get('flash_' . $msg) }}</p>
      @endif
    @endforeach
  </div>
</div>

 {{-- ==========include search part start==========--}}
   @include('sites.search_modal')
  {{-- ==========include search part end==========--}}

  {{-- =======================content section start==================--}}
     @yield('content')
  {{-- =======================content section start==================--}} 

  <!-- footer section start -->
     @include('sites.footer')
  <!-- footer section end -->

  <!-- modals section start -->
     @include('sites.modals')
  <!-- modals section end -->

  <!-- Scripts -->
  <script src="{{asset('js/frontend-app.js')}}"></script> 

  <!-- Scripts -->
  <script src="{{asset('js/owl.carousel.js')}}"></script>
   
  <!-- only custom script section start -->
             @yield('script')
  <!-- only custom script section start --> 
  <!-- only custom "script with PHP Page" section start -->  
    @include('ajaxs.php_script')
  <!-- only custom "script with PHP Page"  section start -->    
<script> 
  var _hmt = _hmt || [];
  (function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?719e4ae8a25e1e80b008069f1e61acec";
    var s = document.getElementsByTagName("script")[0]; 
    s.parentNode.insertBefore(hm, s);
  })();
</script>
</body>
</html>
