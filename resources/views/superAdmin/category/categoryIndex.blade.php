@extends('layouts.superAdminLayout.superAdminMain')

@section('content')
	<h1>Categories</h1>
	@if(count($categories) > 0)
	<div class="col-sm-6">
		<table class="table">
		    <thead>
		      <tr>
		        <th>Id</th>
		        <th>Image</th>
		        <th>Title</th>
		        <th>Has Gender</th>
		        <th>Created</th>
		        <th>Updated</th>
		      </tr>
		    </thead>
		    <tbody>
			    @foreach($categories as $category)
			      <tr>
			        <td>{{$category->id}}</td>
			        
			        <td><img height="40" src="{{URL::asset("categoryImages/{$category->categoryImg}")}}" alt=""></td>
			        <td>{{$category->title}}</td>
			        <td>{{$category->hasgender == 0 ? "No" : "Yes"}}</td>
			        <td>{{$category->created_at ? $category->created_at->diffForHumans() : "NO Date"}}</td>
			        <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : 'No Date'}}</td>
			        <td><a href="{{route('categories.edit', $category->id)}}"><button class='btn btn-warning'>Edit</button></a></td>
			      </tr>
		      	@endforeach
		    </tbody>
		  </table>
	</div>
	@else
	<hr>
	<h4 class="text-danger">No cotegories found</h4>
	@endif


@stop