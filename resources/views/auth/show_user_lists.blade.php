@extends('layouts.admin')
@section('title', 'User Lists')
@section('content')
<h1 class="page-header">User Lists {{link_to('/register','Add User',array('class'=>'btn btn-success pull-right'))}}</h1> 
{{ session()->get('langsname') }}
      <div class="row">
        <div class="col-sm-12 col-md-12">        
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>SI NO.</th>
                  <th>Name</th>                  
                  <th>Email</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Action</th> 
                </tr>
              </thead>
              <tbody>  
   
              @php ($i=1)
              @foreach ($users as $data) 
                  <tr>
                  <td>{{$i}}</td>                  
                  <td>{{$data->name}}</td>                 
                  <td>{{$data->email}}</td>
                  <td>{{$data->role->name}}</td>
                  <td>{{$data->status}}</td>
                  <td> 
                  </td>
                </tr>
                @php ($i=$i+1)
                 @endforeach                  
                </tbody>
                </table>
                </div>
                
        </div>
      </div>        
@endsection 


