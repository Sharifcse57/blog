@extends('layouts.admin')
@section('title', 'Questions')
@section('content')
<h1 class="page-header">Questions List {{link_to_route('questions.create','Add Question',[],array('class'=>'btn btn-success pull-right'))}}</h1>
 <div class="row">
        <div class="col-sm-12 col-md-12">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>SI#</th>
                  <th>Blog or Forum</th>
                  <th>Thumb Image</th>
                  <th>Title</th>
                  <th width="30%">Question</th>
                  <th>Duplicate</th>
                  <th>Tag</th>
                  <th class="center">Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
            @php$i=1; @endphp
              @foreach ($questions as $question)

                <tr>
                  <th>{{ $i }}</th>

                  @if ( $question->blogorforum == 0)
                    <td>Blog</td>
                  @else
                    <td>Forum</td>
                  @endif
                   <td>{{ HTML::image('images/admin/blog/'.$question->thumb_image,null,array('width'=>'70','class'=>'img-responsive')) }}</td>
                  <td>{{ $question->title }}</td>
                  <td>{!! $question->question !!}</td>
                   @if ( $question->duplicate == 1)
                    <td>Not Duplicate</td>
                    @else
                      <td>Duplicate</td>
                    @endif
                  <td>
                  @php
                  $tag_ids = json_decode($question->tag_ids);
                  foreach ($tag_ids as $element) {
                  	if (array_key_exists($element, $tags)) {
                  		echo $tags[$element] . ', ';
                  	}

                  }

                  @endphp
                  </td>

                  <td>{{ date('M j, Y', strtotime($question->created_at)) }}</td>
                  <td>
                        {!!  HTML::decode(link_to_route('questions.edit', '<span aria-hidden="true" class="glyphicon glyphicon-edit"></span>', array($question->id)))!!}
                        {!! Form::delete(route('questions.destroy',array($question->id))) !!}
                  </td>
                </tr>
                @php$i= $i+1; @endphp

              @endforeach

              </tbody>
              </table>
              </div>
        </div>
      </div>
@stop