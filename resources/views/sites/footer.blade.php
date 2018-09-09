<footer class="footer">
    <div class="footer-overlay">
        <div class="hide-footer"><img src="{{ asset('images/sites/cancel.svg')}}" alt="cancel" /></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-sm-offset-0 col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="col-xs-7 col-sm-10 col-md-10">
                            {!! Form::open(array('route' => 'subscribe','class'=>'form-inline footer-form')) !!}
                            <h3>{{ transLangs($static_langs,'FOLLOW OR SUBSCRIBE FOR A FREE VOUCHER',$langsName) }}</h3>
                            <div class="form-group">
                                <input name="name" type="text" class="form-control" onfocus="if (this.placeholder == '*{{$name}}') {this.placeholder=''}" onblur="if(this.placeholder == '') { this.placeholder='*{{$name}}'}" placeholder="*{{$name}}" required>
                            </div>
                            <div class="form-group">
                                <input name="phone" type="text" class="form-control" onfocus="if (this.placeholder == '*{{$phone}}') {this.placeholder=''}" onblur="if(this.placeholder == '') { this.placeholder='*{{$phone}}'}" placeholder="*{{$phone}}" required>
                            </div>
                            <div class="form-group">
                                <input name="email" type="text" class="form-control" onfocus="if (this.placeholder == '*{{$email}}') {this.placeholder=''}" onblur="if(this.placeholder == '') { this.placeholder='*{{$email}}'}" placeholder="*{{$email}}" required>
                            </div>
                            <button type="submit" class="btn btn-send">{{ transLangs($static_langs,'Send',$langsName) }}</button>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-xs-5 col-sm-2 col-md-2 qr-code">
                            <img class="img-responsive" src="{{ asset('images/sites/hurtigruten-qr-code.png')}}" alt="qr" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
    <div class="container-fluid site-container">
        <div class="row">
              <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="contact-btm">
                <p>
            <img src="{{ asset('images/logo-white.svg') }}" alt="logo">
Fredrik Langes gate 14,
9008 Tromsø, 
Norway<br>
Email: <a href="mailto:book@hurtigruten.com">book@hurtigruten.com</a> <br>
Phone: +44 2037 338 249</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6 text-center">
            <ul class="list-inline">
                @foreach ($general_pages as $gval)
                <li><a href="{{ route('get_pages',$gval->slug) }}">{{ $gval->name }}</a></li>
                @endforeach
            </ul>       
            <ul style="margin-top: 0;"><li><a target="blank" href="http://www.haidalude.cn/">haidalude.cn</a></li></ul>
            <p>{{ transLangs($static_langs,'© Copyright of Hurtigruten LTD 2016. All Rights Reserved',$langsName) }}</p>
        </div>
        </div>
    </div>
      
    </div>    
    <div class="mobile-footer visible-xs">
        <ul class="list-inline text-center">
            <li>hurtigruten</li>
            <li class="pull-right"><a class="top-up" href="/#header">top</a></li>
        </ul>
    </div>
</footer>
