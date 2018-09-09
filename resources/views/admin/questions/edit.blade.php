@extends('layouts.admin')
@section('title', 'Edit Questions')
@section('css')
    <link href="{{asset('css/admin/select2.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<h1 class="page-header">Edit Questions {{link_to_route('questions.index','List All',null,array('class'=>'btn btn-success pull-right'))}}</h1>
 {{ Form::model($questions,array('route' => array('questions.update',$questions->id),'enctype'=>'multipart/form-data','method' => 'PUT','class'=>'form-horizontal')) }}
		<div class="row">
			<div class="form-group">
				<div class="form-group">
	           	  <div class="col-md-6">
					<label class="control-label col-sm-4">Select Blog or forum :</label>
					 <div class="col-md-6">
						{{Form::select('blogorforum',config('myhelpers.blogorforum'),null,array('class' => 'form-control'))}}
						{!! $errors->first('blogorforum', '<p class="text-danger">:message</p>' ) !!}
					</div>
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
				{{Form::label('Thumb Image:',null,array('class' => 'control-label col-sm-2'))}}
				<div class="col-md-6">
	                {{Form::file('thumb_image',array('onChange'=>'readURL(this)'))}}
	                {!! $errors->first('thumb_image', '<p class="text-danger">:message</p>' ) !!}
	                {{Form::hidden('old_thumb_image',$questions->thumb_image)}}
				</div>
				<div class="col-md-4 preview-div">
					{{ HTML::image('images/admin/blog/'.$questions->thumb_image,null,array('width'=>'70','class'=>'img-responsive')) }}
				</div>
			</div>

			<div class="form-group">
				{{Form::label('Thumb Image Alter:',null,array('class' => 'control-label col-sm-2'))}}
				<div class="col-md-6">
	                {{Form::text('thumb_image_alt',null,array('class' => 'form-control'))}}
				</div>
			</div>


			@php
				$tag_ids= json_decode($questions->tag_ids);
			@endphp

			<div class="form-group">
   				{{Form::label('Select Tag:',null,array('class' => 'control-label col-sm-2'))}}
				 <div class="col-md-6">
				 {{ Form::select('tag_ids[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
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

            <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">
                        Update Questions
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
	$('.select2-multi').select2().val({!! json_encode($tag_ids) !!}).trigger('change');
</script>
@endsection


