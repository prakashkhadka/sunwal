@extends('layouts.superAdminLayout.superAdminMain')

@section('content')
	<h1>Sub-Categories</h1>
	@if(count($subcategories) > 0)
	<div class="col-sm-6">
		<table class="table">
		    <thead>
		      <tr>
		        <th>Id</th>
		        <th>Category</th>
		        <th>Image</th>
		        <th>Sub Category Title</th>
		        <th>Created</th>
		        <th>Updated</th>
		      </tr>
		    </thead>
		    <tbody>
			    @foreach($subcategories as $subcategory)
			      <tr>
			        <td>{{$subcategory->id}}</td>
			        <td>{{$subcategory->category->title}}</td>
			        <td><img height="40" src="{{URL::asset("subCatImg/{$subcategory->subCatImg}")}}" alt=""></td>
			        <td>{{$subcategory->title}}</td>
			        <td>{{$subcategory->created_at ? $subcategory->created_at->diffForHumans() : "NO Date"}}</td>
			        <td>{{$subcategory->updated_at ? $subcategory->updated_at->diffForHumans() : 'No Date'}}</td>
			        <td><a href="{{route('subCategory.edit', $subcategory->id)}}"><button class='btn btn-warning'>Edit</button></a></td>
			      </tr>
		      	@endforeach
		    </tbody>
		  </table>
	</div>
	@else
	<hr>
	<h4 class="text-danger">No Sub-Catotegories found</h4>
	@endif


@stop