@extends('layouts.admin')
@section('content')
    <div class="row">
       {{-- {{ Auth::user() }} --}}
      {{--  {{ Auth::user()->role }} --}} 
      {{-- {{ $pages }}  --}}    
	<h1 class="overview-heading">Overview of admin dashboard</h1>
    </div>
    <div class="row block-parent"> 
      <div class="block-content">
        <h3>User Overview</h3>
        <ul>
        @php $totalUsers=0;@endphp
        @foreach ($users as $userkey=>$userval)  
        	@php 
        		$totalUsers+=$userval->total;
        	@endphp 
          <li><span>{{ ucfirst($userval->status) }} Users</span> <span class="{{ $userval->status }}">{{ $userval->total }}</span></li>
        @endforeach
        <li><span>Total Users</span> <span>{{ $totalUsers }}</span></li>
        </ul>
      </div>
      
    </div>
@endsection
