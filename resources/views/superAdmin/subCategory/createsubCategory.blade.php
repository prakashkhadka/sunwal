@extends('layouts.superAdminLayout.superAdminMain')


@section('content')
    
        <div class="row">
            <h1>Create Sub-Category</h1>
            <div class="col-sm-6">
                {!! Form::open(['method'=>'POST', 'action'=>'superAdmin\subCatController@store', 'files'=>true]) !!}

                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('subCatImg', 'Sub-Category Image:') !!}
                    {!! Form::file('subCatImg', null, ['class'=>'form-control']) !!}
                </div>

                <!-- Category  -->
              <div class="form-group">
                {!! Form::label('category_id', 'समूह (Category):') !!}
                  {!! Form::select('category_id', [' '=>'तल मध्ये एक छनौट गर्नुहोस्'] + $categories, null, [ 'class'=>'form-control form-control margin-bottom-20','placeholder'=>'select one from here']) !!}
              </div>

                <div class="form-group">
                    {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>


@endsection
