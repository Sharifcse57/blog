@extends('layouts.admin')
@section('title', 'Create Questions')
@section('css')
    <link href="{{asset('css/admin/select2.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<h1 class="page-header">Create Questions {{link_to_route('questions.index','List All',null,array('class'=>'btn btn-success pull-right'))}}</h1>
 {{ Form::model(Request::old(),array('route' => array('questions.store'),'enctype'=>'multipart/form-data','class'=>'form-horizontal')) }}
	<div class="row">
			<div class="form-group">
           	  <div class="col-md-6">
				<label class="control-label col-sm-4">Select Blog or forum :</label>
				 <div class="col-md-6">
					{{Form::select('blogorforum',config('myhelpers.blogorforum'),null,array('class' => 'form-control'))}}
					{!! $errors->first('blogorforum', '<p class="text-danger">:message</p>' ) !!}
				</div>
              </div>
			</div>

			<div class="form-group">
				{{Form::label('Question Title:',null,array('class' => 'control-label col-sm-2'))}}
				<div class="col-md-6">
	                {{Form::text('title',null,array('class' => 'form-control'))}}
	                {!! $errors->first('title', '<p class="text-danger">:message</p>' ) !!}
				</div>
			</div>

			<div class="form-group">
				{{Form::label('Question Description:',null,array('class' => 'control-label col-sm-2'))}}<sup>(maximum length should be 600)</sup>
				<div class="col-md-6">
	                {{Form::textarea('question',null,array('class' => 'form-control','rows'=>'4'))}}
	                {!! $errors->first('question', '<p class="text-danger">:message</p>' ) !!}
				</div>
			</div>

			<div class="form-group">
				{{Form::label('Blog Thumb Image:',null,array('class' => 'control-label col-sm-2'))}}
				<div class="col-md-6">
	                {{Form::file('thumb_image',array('onChange'=>'readURL(this)'))}}
	                {!! $errors->first('thumb_image', '<p class="text-danger">:message</p>' ) !!}
				</div>
				<div class="col-md-4 preview-div"></div>
			</div>

			<div class="form-group">
				{{Form::label('thumb_image Alter Tag:',null,array('class' => 'control-label col-sm-2'))}}
				<div class="col-md-6">
	                {{Form::text('thumb_image_alt',null,array('class' => 'form-control'))}}
	                {!! $errors->first('thumb_image_alt', '<p class="text-danger">:message</p>' ) !!}

				</div>
			</div>

   			<div class="form-group">
   				{{Form::label('Select Tag:',null,array('class' => 'control-label col-sm-2'))}}
				 <div class="col-md-6">
				 {{Form::select('tag_ids[]',$tags,null,array('class' => 'form-control select2-multi','id'=>'ship_id', 'multiple'=>'multiple'))}}
				 {!! $errors->first('tag_ids', '<p class="text-danger">:message</p>' ) !!}
				</div>
			</div>
			<div class="form-group">
           	  <div class="col-md-6">
				<label class="control-label col-sm-4">Published :</label>
				 <div class="col-md-6">
					{{Form::select('close',config('myhelpers.published'),null,array('class' => 'form-control'))}}
				</div>
              </div>
			</div>
			{{Form::hidden('duplicate',0,array('class' => 'form-control'))}}
			{{Form::hidden('total_views',0,array('class' => 'form-control'))}}
            <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">
                        Create Questions
                    </button>
                </div>
            </div>
	</div>
 {{ Form::close() }}
@endsection

@section('script')
<script src="{{asset('js/select2.min.js')}}"></script>
<script>
	$('.select2-multi').select2();
</script>
@endsection
