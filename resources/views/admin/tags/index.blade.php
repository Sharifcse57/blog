@extends('layouts.admin')
@section('title', 'Tags')
@section('content')
<h1 class="page-header">Tag List {{link_to_route('tags.create','Add Tag',[],array('class'=>'btn btn-success pull-right'))}}</h1>
 <div class="row">
        <div class="col-sm-12 col-md-12">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>SI#</th>
                  <th>Blog or forum</th>
                  <th>Question</th>
                  <th>Duplicate</th>
                  <th>Tag</th>
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