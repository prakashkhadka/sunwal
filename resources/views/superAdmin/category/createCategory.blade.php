@extends('layouts.superAdminLayout.superAdminMain')


@section('content')
    
        <div class="row">
            <h1>Create Category</h1>
            <div class="col-sm-6">
                {!! Form::open(['method'=>'POST', 'action'=>'CategoriesController@store', 'files'=>true]) !!}

                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
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
                    {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>


@endsection
