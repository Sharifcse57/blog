@extends('layouts.admin')
@section('title', 'Update Site Settings')
@section('content')
<h1 class="page-header">Update Site Settings</h1>   
 {{ Form::model($site_settings,array('route' => array('site_settings.update',$site_settings->id),'enctype'=>'multipart/form-data','method' => 'PUT','class'=>'form-horizontal')) }}  
	<div class="row">

			<div class="form-group">
				{{Form::label('Site Name:',null,array('class' => 'control-label col-sm-2'))}}
				<div class="col-md-6">	
				{{Form::text('name',null,array('class' => 'form-control'))}}
	            {!! $errors->first('name', '<p class="text-danger">:message</p>' ) !!}
				</div>
			</div>	

			<div class="form-group">
				{{Form::label('Email Address:',null,array('class' => 'control-label col-sm-2'))}}
				<div class="col-md-6">	
				{{Form::text('email',null,array('class' => 'form-control'))}}
	            {!! $errors->first('email', '<p class="text-danger">:message</p>' ) !!}
				</div>
			</div>	

				

			<div class="form-group">
				{{Form::label('Company Logo:',null,array('class' => 'control-label col-sm-2'))}}
				<div class="col-md-6">
	                {{Form::file('logo',array('onChange'=>'readURL(this)'))}}
	                {!! $errors->first('logo', '<p class="text-danger">:message</p>' ) !!}
	                {{ Form::hidden('old_image',$site_settings->logo)  }}
				</div>			

	            <div class="col-md-4 preview-div">
						{{ HTML::image('images/sites/site_settings/'.$site_settings->logo,null,array('width'=>'100','class'=>'img-responsive')) }}	
				</div> 
			</div>

			 <div class="form-group">
				{{Form::label('Alt Image:',null,array('class' => 'control-label col-sm-2'))}}
				<div class="col-md-6">	
				{{Form::text('logo_alt',null,array('class' => 'form-control'))}}
	            {!! $errors->first('logo_alt', '<p class="text-danger">:message</p>' ) !!}
				</div>
			</div>	
			

            <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">
                        Update Settings
                    </button>
                </div>
            </div>
	</div>
 {{ Form::close() }}
@endsection 