@extends('layouts.superAdminLayout.superAdminMain')

@section('content')
<h1>Edit Categories</h1>
	<div class="col-sm-6">
		{!! Form::model($category, ['method'=>'PATCH', 'action'=>['CategoriesController@update', $category->id], 'files'=>true]) !!}
		
		<div class="form-group">
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title', null, ['class'=>'form-control']) !!}
		</div>
		
		<div>
			<img height="40" src="{{URL::asset("categoryImages/{$category->categoryImg}")}}" alt="">
		</div>

		<div class="form-group">
            {!! Form::label('categoryImg', 'Category Image:') !!}
            {!! Form::file('categoryImg', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
			{!! Form::label('hasgender', 'Has Gender:') !!}
			{!! Form::text('hasgender', null, ['class'=>'form-control']) !!}
			<p class="text-danger">Please enter value 0 for No 1 for yes</p>
		</div>

		<div class="form-group">
			{!! Form::submit('Update Category', ['class'=>'btn btn-primary col-sm-6']) !!}
		</div>
		{!! Form::close() !!}

		{!! Form::open(['method'=>'DELETE', 'action'=>['CategoriesController@destroy', $category->id], 'class'=>'pull-right']) !!}
			<div class="form-group">
				{!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}
			</div>
		{!! Form::close() !!}
	</div>
	
@stop