@extends('layouts.admin')
@section('title', 'Create Comments')
@section('content')
<h1 class="page-header">Create Comments {{link_to_route('comments.index','List All',null,array('class'=>'btn btn-success pull-right'))}}</h1>
 {{ Form::model(Request::old(),array('route' => array('comments.store'),'enctype'=>'multipart/form-data','class'=>'form-horizontal')) }}
	<div class="row">

			<div class="form-group">
				{{Form::label('Comment:',null,array('class' => 'control-label col-sm-2'))}}<sup>(maximum length should be 600)</sup>
				<div class="col-md-6">
	                {{Form::textarea('short_description',null,array('class' => 'form-control','rows'=>'4'))}}
	                {!! $errors->first('short_description', '<p class="text-danger">:message</p>' ) !!}
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
                        Create Comments
                    </button>
                </div>
            </div>
	</div>

 {{ Form::close() }}
@endsection
