@extends('layouts.admin')
@section('title', 'Create Tags')
@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>Tag List</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
				@php $i=1; @endphp
				@if (isset($tags))
					@foreach ($tags as $tag)
					<tr>
						<th>{{$i}}</th>
						<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a>
						</td>
						<td>
		                  	{!!  HTML::decode(link_to_route('tags.edit', '<span aria-hidden="true" class="glyphicon glyphicon-edit"></span>', array($tag->id)))!!}
		                    {!! Form::delete(route('tags.destroy',array($tag->id))) !!}
                    	</td>
					</tr>
					@php $i=$i+1; @endphp
					@endforeach
				@endif

				</tbody>
			</table>
	   </div>

	   <div class="col-md-3">
			<div class="well">
				{{ Form::model(Request::old(),array('route' => array('tags.store'),'enctype'=>'multipart/form-data','class'=>'form-horizontal')) }}
					<h2>New Tag</h2>
					{{ Form::text('name', null, ['class' => 'form-control']) }}
					{!! $errors->first('name', '<p class="text-danger">:message</p>' ) !!}

					{{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}

				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection

