@extends('layouts.adminLayout.adminMasterLayout')

@section('content')
    
<h1>Complaints</h1>
	<table class="table table-striped">
	    <thead>
	      <tr>
	      	<th>SN</th>
	        <th>ID</th>
	        <th>Post</th>
	        <th>Reason</th>
	        <th>Complaint Details</th>
	        <th>Complained On</th>
	        
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($complaints as $complaint)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$complaint->id}}</td>
				<td><a href="{{route('listingSinglePage', [$complaint->ad->category_id, $complaint->ad->slug])}}">{{$complaint->ad->title}}</a></td>
				<td>{{$complaint->reason}}</td>
				<td>{!! $complaint->detailreason !!}</td>
				<td>{{$complaint->created_at}}</td>
			</tr>
	    @endforeach
	    </tbody>
  	</table>
@endsection