@extends('layouts.admin')
@section('title', 'Edit Tags')
@section('content')
<h1 class="page-header">Edit Tags {{link_to_route('tags.index','List All',null,array('class'=>'btn btn-success pull-right'))}}</h1>
 {{ Form::model($tags,array('route' => array('tags.update',$tags->id),'enctype'=>'multipart/form-data','method' => 'PUT','class'=>'form-horizontal')) }}
		<div class="row">
			<div class="form-group">
				{{Form::label('Tag Name:',null,array('class' => 'control-label col-sm-2'))}}
				<div class="col-md-6">
	                {{Form::text('name',null,array('class' => 'form-control'))}}
	                {!! $errors->first('name', '<p class="text-danger">:message</p>' ) !!}
				</div>
			</div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">
                        Update Tag
                    </button>
                </div>
            </div>
		</div>

 {{ Form::close() }}
@endsection




