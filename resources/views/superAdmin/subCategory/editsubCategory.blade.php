@extends('layouts.superAdminLayout.superAdminMain')

@section('content')
<h1>Edit Sub-Category</h1>
	<div class="col-sm-6">
		{!! Form::model($subcategory, ['method'=>'PATCH', 'action'=>['superAdmin\subCatController@update', $subcategory->id], 'files'=>true]) !!}
		
		<div class="form-group">
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title', null, ['class'=>'form-control']) !!}
		</div>
		
		<div>
			<img height="40" src="{{URL::asset("subCatImg/{$subcategory->subCatImg}")}}" alt="">
		</div>

		<div class="form-group">
            {!! Form::label('subCatImg', 'Sub-Category Image:') !!}
            {!! Form::file('subCatImg', null, ['class'=>'form-control']) !!}
        </div>
		
		<div class="form-group">
	        {!! Form::label('category_id', 'समूह (Category):') !!}
          	{!! Form::select('category_id', [' '=>'तल मध्ये एक छनौट गर्नुहोस्'] +$categories , null, [ 'class'=>'form-control form-control margin-bottom-20','placeholder'=>'select one from here']) !!}
      	</div>

		<div class="form-group">
			{!! Form::submit('Update Category', ['class'=>'btn btn-primary col-sm-6']) !!}
		</div>
		{!! Form::close() !!}

		{!! Form::open(['method'=>'DELETE', 'action'=>['superAdmin\subCatController@destroy', $subcategory->id], 'class'=>'pull-right']) !!}
			<div class="form-group">
				{!! Form::submit('Delete Sub-Category', ['class'=>'btn btn-danger']) !!}
			</div>
		{!! Form::close() !!}
	</div>
	
@stop