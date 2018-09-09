@extends('layouts.admin')
@section('title', 'Comments')
@section('content')
<h1 class="page-header">Comments List {{link_to_route('comments.create','Add Comments',[],array('class'=>'btn btn-success pull-right'))}}</h1>
 <div class="row">
        <div class="col-sm-12 col-md-12">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>SI#</th>
                  <th>Question</th>
                  <th>User Name</th>
                  <th>Comment</th>
                  <th>Status</th>
                  <th class="center">Created</th>
                  <th>Updated</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
              </table>
              </div>
        </div>
      </div>
@stop