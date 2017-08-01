@extends('layouts.adminLayout.adminMasterLayout')

@section('content')
    
<h1>Waiting Posts</h1>
	<table class="table table-striped">
	    <thead>
	      <tr>
	      	<th>SN</th>
	        <th>Ad ID</th>
	        <th>Title</th>
	        <th>Category</th>
	        
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($waitingAds as $ad)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$ad->id}}</td>
				<td><a href="{{route('singleAdToApprove', $ad->id)}}">{{$ad->title}}</a></td>
				<td>{{$ad->category->title}}</td>
				
			</tr>
	    @endforeach
	    </tbody>
  	</table>
@endsection