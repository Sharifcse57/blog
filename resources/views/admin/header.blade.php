 <header>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
          <div class="logo">
          <a href="{{ route('home') }}">              
            <img src="{{asset('images/logo.svg')}}" alt="Logo" class="img-responsive"></a>   
           
          </div>
        </div>
        <div class="col-xs-12  col-sm-4 col-md-5">
          
        </div>
        <div class="col-xs-12  col-sm-4 col-md-4">    
          <ul class="pull-right">         
           
          @if (Auth::check()) 
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu auth-dropdown" role="menu">
                    <li>
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
          @endif           
          </ul>
        </div>
      </div>
    </div>
</header>



