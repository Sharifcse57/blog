<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="author" content="mipellim">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title','Hurtigruten')</title>
	  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <!-- CSRF Token -->    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
     <!-- Bootstrap -->
    <link href="{{asset('css/backend-app.css')}}" rel="stylesheet">
    <!-- only custom css section start -->
          	 @yield('css')
	  <!-- only custom css section end -->
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Scripts -->
     <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
  </head>

  <body>
<div class="container-fluid">
   <div class="row">
    <!-- header section start -->
     @include('admin.header')
    <!-- header section end -->
    
        <!-- nav section start -->
         @include('admin.nav')
        <!-- nav section end -->

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
           <!--for validation error start-->     
           <div class="flash-message">           
              @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('flash_' . $msg))
                <p class="alert alert-{{ $msg }}"><a href="#" class="close" data-dismiss="alert">&times;</a> <strong> {{ $msg }}!!</strong> {{ Session::get('flash_' . $msg) }}</p>
                @endif
              @endforeach
            </div>
            <!--for validation error end-->
            
            <!-- main content section start -->
              @yield('content','No Content Found')
      			<!-- main content section start --> 

            <!-- debug section start --> 
            <div class="row">      
              <?php               
                /*$queries = DB::getQueryLog(); 
                $last_query = end($queries); 
               echo '<pre>',var_dump($queries),'</pre>'; */       
              //print_r($last_query);
              ?>       
            </div>
            <!-- debug section end --> 
        </div>
        <!-- footer section start -->
         @include('admin.footer')
        <!-- footer section end -->

        <!-- modals section start -->
           @yield('modals')
        <!-- modals section end -->

      </div>
    </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('js/backend-app.js')}}"></script>
  <!-- only custom "script with PHP Page" section start -->  
  {{-- https://packagist.org/packages/unisharp/laravel-ckeditor --}}
  <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
     <script>
        $('textarea').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
             @include('ajaxs.php_script');
  <!-- only custom "script with PHP Page"  section start -->
    
  <!-- only custom script section start -->
             @yield('script')
  <!-- only custom script section start -->  
 </body>   
</html>
