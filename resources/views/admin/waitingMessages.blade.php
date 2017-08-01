@extends('layouts.adminLayout.adminMasterLayout')

@section('content')
    
<h1>Waiting Messages</h1>
	<table class="table table-striped">
	    <thead>
	      <tr>
	      	<th>SN</th>
	        <th>ID</th>
	        <th>Name</th>
	        <th>Email</th>
	        <th>Message</th>
	        
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($waitingMessages as $msg)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$msg->id}}</td>
				<td>{{$msg->name}}</td>
				<td>{{$msg->email}}</td>
				<td>{{$msg->message}}</td>
			</tr>
	    @endforeach
	    </tbody>
  	</table>
@endsection