@extends('layouts.admin')
@section('title', 'Edit Comments')
@section('content')
<h1 class="page-header">Edit Comments {{link_to_route('comments.index','List All',null,array('class'=>'btn btn-success pull-right'))}}</h1>
 {{ Form::model($comments,array('route' => array('comments.update',$comments->slug),'enctype'=>'multipart/form-data','method' => 'PUT','class'=>'form-horizontal')) }}
		<div class="row">
			{{ Form::hidden('slug',$comments->slug) }}

			<div class="form-group">
				{{Form::label('Title:',null,array('class' => 'control-label col-sm-2'))}}
				<div class="col-md-6">
	                {{Form::text('title',null,array('class' => 'form-control'))}}
	                {!! $errors->first('title', '<p class="text-danger">:message</p>' ) !!}
				</div>
			</div>

			<div class="form-group">
				{{Form::label('Short Description:',null,array('class' => 'control-label col-sm-2'))}}<sup>(maximum length should be 600)</sup>
				<div class="col-md-6">
	                {{Form::textarea('short_description',null,array('class' => 'form-control','rows'=>'4'))}}
	                {!! $errors->first('short_description', '<p class="text-danger">:message</p>' ) !!}
				</div>
			</div>

			<div class="form-group">
				{{Form::label('Image:',null,array('class' => 'control-label col-sm-2'))}}
				<div class="col-md-6">
	                {{Form::file('image',array('onChange'=>'readURL(this)'))}}
	                {!! $errors->first('image', '<p class="text-danger">:message</p>' ) !!}
	                {{Form::hidden('old_image',$comments->image)}}
				</div>
				<div class="col-md-4 preview-div">
					{{ HTML::image('images/sites/comments/image/'.$comments->image,null,array('width'=>'70','class'=>'img-responsive')) }}
				</div>
			</div>

			<div class="form-group">
				{{Form::label('Image Alter:',null,array('class' => 'control-label col-sm-2'))}}
				<div class="col-md-6">
	                {{Form::text('image_alt',null,array('class' => 'form-control'))}}
				</div>
			</div>

			<div class="form-group">
				{{Form::label('Map Image:',null,array('class' => 'control-label col-sm-2'))}}
				<div class="col-md-6">
	                {{Form::file('map_img',array('onChange'=>'readURL(this)'))}}
	                {!! $errors->first('map_img', '<p class="text-danger">:message</p>' ) !!}
	                {{Form::hidden('old_map_img',$comments->map_img)}}
				</div>
				<div class="col-md-4 preview-div">
					{{ HTML::image('images/sites/comments/mapimage/'.$comments->map_img,null,array('width'=>'70','class'=>'img-responsive')) }}
				</div>
			</div>

			<div class="form-group">
				{{Form::label('Map Image Alter:',null,array('class' => 'control-label col-sm-2'))}}
				<div class="col-md-6">
	                {{Form::text('map_img_alt',null,array('class' => 'form-control'))}}
				</div>
			</div>

			<div class="form-group">
           	  <div class="col-md-6">
				<label class="control-label col-sm-4">Published :</label>
				 <div class="col-md-6">
					{{Form::select('published',config('myhelpers.published'),null,array('class' => 'form-control'))}}
				</div>
              </div>
			</div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">
                        Update Comments
                    </button>
                </div>
            </div>
		</div>

 {{ Form::close() }}
@endsection




