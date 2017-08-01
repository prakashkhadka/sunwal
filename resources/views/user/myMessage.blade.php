@extends('layouts.masterLayout.home')

@section('content')

<style>
	.master-container{
		margin-top:157px;
	}
	.message-history li .user-name{
		margin-left:0px;
	}
	.container{
		padding:0px;
		padding-left:5px;
	}
	.message-details{
		padding:0px;
		padding-top: 15px;
	}
	.msgToOwner{
		font-size:8pt;
	}
	#messageSuccessFeedback{
         border: 2px solid green;
         margin-top:30px;
         padding:5px;
      }
	
</style>
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
	<div class="main-content-area clearfix master-container">
	 <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
	 <!-- COURSE CONCERN -->
	 @if(Session::has('deleteSuccess'))
		 <div class="bg-success text-warning col-xs-12 col-sm-3 col-sm-offset-6 text-center" id="messageSuccessFeedback">
	        यो मेसेज सफलतापूर्बक हटाइएको छ 
	     </div>
     @endif
     @if(Session::has('deleteSuccessReply'))
		 <div class="bg-success text-warning col-xs-12 col-sm-3 col-sm-offset-6 text-center" id="messageSuccessFeedback">
	        यो मेसेज सफलतापूर्बक हटाइएको छ 
	     </div>
     @endif
	 <section class="section-padding gray">
	 @if(count($messages)>0)
	    <div class="container">
          	<div class="row">

	          	<div class="message-body">
	           
             	<div class="col-md-4 col-sm-5 col-xs-12">
	                <div class="message-inbox">
	                   	<div class="message-header">
	                      	<h4>मेसेजहरु (Inbox)</h4>
	                   	</div>
	                   	<ul class="message-history">
	                      	<!-- LIST ITEM -->
                      		@for($i=0; $i < count($messages); $i++)
								<li class="message-grid">
			                        <a href="#">
			                            <div class="user-name">
			                               <div class="author">
			                               		<span class="index1">{{$i+1}}. </span>
			                                  	<span>{{$messages[$i]->name}}</span>
			                               </div>
			                               <p>{{$messages[$i]->email}}</p>
			                               <p>{{$messages[$i]->phone}}</p>
			                               <div class="time">
			                                   	<span>{{$messages[$i]->created_at->diffForHumans()}}</span>
			                               </div>
			                            </div>
			                        </a>
		                      	</li>
	                      	@endfor
	                   	</ul>
	                </div>
             	</div>
	             <div class="col-md-8 clearfix col-sm-5 col-xs-12 message-content">
	             	@foreach($messages as $message)
		                <div class="message-details">
		                   <div class="author">
		                      <span class="author-name"><span class="text-success">प्रश्नकर्ता :</span> {{$message->name}}</span>
		                      <em>{{$message->created_at->diffForHumans()}}</em>
		                      
		                      <a href="{{route('deleteMessage', $message->id)}}"><span class="pull-right text-danger"><i class="fa fa-trash"></i> हटाउनुहोस (DELETE)</span></a>
		                      
		                   </div>
							
		                   <h2><a href="{{route('listingSinglePage',[$message->ad->category_id, $message->ad->slug])}}">{{$message->ad->title}}</a></h2>
		                   

		                   <ul class="messages">
		                      <li class="friend-message clearfix">
		                         <figure class="profile-picture">
		                            प्रश्न
		                         </figure>
		                         <div class="message">
		                            {!! $message->message !!}
		                            <div class="time"><i class="fa fa-clock-o"></i> {{$message->created_at->diffForHumans()}}</div>
		                         </div>
		                      </li>
								@foreach($message->messages as $repliedmessage)
		                      	<li class="my-message clearfix">
		                         	<figure class="profile-picture">
		                            	उत्तर
		                         	</figure>
		                         	<div class="message">
										{!! $repliedmessage->message !!}
		                            	<div class="time"><i class="fa fa-clock-o"></i>{{$repliedmessage->created_at->diffForHumans()}}</div>
		                         	</div>
		                      	</li>
								@endforeach
		                   	</ul>


		                   	<div>
		                      	<form id="msgReplyForm"  method="POST" action="{{route('messageReply')}}" role="form" class="form-inline" col-xs-12>
		                      		{{ csrf_field() }}
		                      		
		                      		
		                      		<input type="hidden" name="ad_id" value="{{$message->ad->id}}">
		                      		
		                      		<input type="hidden" name="user_id" value="{{$message->user_id}}">
		                      		<input type="hidden" name="message_id" value="{{$message->id}}">
		                      		<input type="hidden" name="name" value="{{$message->name}}">
		                      		<input type="hidden" name="email" value="{{$message->email}}">
		                      		<input type="hidden" name="phone" value="{{$message->phone}}">
		                      		
		                         	<div class="form-group  col-md-12  col-sm-12">
	                    				<label>उत्तर (Answer): 
	                    					<span class="msgToOwner text-success">नेपालीमा लेख्नकोलागी मेनुबाट नेपाली भाषा छनौट गर्नुहोला</span>
	                					</label>
	                        			<textarea name="message" rows="10" class="form-control"></textarea>
	                 				</div>
			                     	<div class="col-md-12  col-sm-12 margin-bottom-20 margin-top-20">
				                        <button type="submit" class="btn btn-theme btn-block">पठाउनुहोस (Send)</button>
			                     	</div>
	                      		</form>
	                      		
		                   	</div>


		                   	@if(count($errors) > 0)
	                          <div class="alert alert-danger">
	                            <ul>
	                              @foreach($errors->all() as $error)
	                                <li>{{$error}}</li>
	                              @endforeach
	                            </ul>
	                          </div>
                        	@endif


	                    </div>
                   	@endforeach 
             	</div>
             	 </div>
	       </div>
	    </div>
	    @elseif(count($gpumsg)>0)
	   
	    	<div class="container">
	          <div class="row">
	           <div class="message-body">
	           
	             <div class="col-md-4 col-sm-5 col-xs-12">
	                <div class="message-inbox">
	                   <div class="message-header">
	                      <h4>मेसेजहरु (Inbox)</h4>
	                   </div>
	                   <ul class="message-history">
	                      	<!-- LIST ITEM -->
	                      		@for($i=0; $i < count($gpumsg); $i++)
								<li class="message-grid">
			                        <a href="#">
			                            <div class="user-name">
			                               <div class="author">
			                               		<span class="index1">{{$i+1}}. </span>
			                                  	<span>{{$gpumsg[$i]->sender->name}}</span>
			                               </div>
			                               <p>{{$gpumsg[$i]->sender->email}}</p>
			                               <p>{{$gpumsg[$i]->sender->phone}}</p>
			                               <div class="time">
			                                   <span>{{$gpumsg[$i]->created_at->diffForHumans()}}</span>
			                               </div>
			                            </div>
			                        </a>
		                      	</li>
		                      	@endfor
	                   </ul>
	                </div>
	             </div>
				

				
	             <div class="col-md-8 clearfix col-sm-5 col-xs-12 message-content">
	             	@foreach($gpumsg as $msg)
	                <div class="message-details">
	                   <div class="author">
	                      <span class="author-name"><span class="text-success"></span> {{$msg->sender->name}}</span>
	                      <em>{{$msg->created_at->diffForHumans()}}</em>
	                      <a href="{{route('deleteMessageReply', $msg->id)}}"><span class="pull-right text-danger"><i class="fa fa-trash"></i> हटाउनुहोस (DELETE)</span></a>
	                   </div>
	                   
	                   <ul class="messages">
	                      <li class="friend-message clearfix">
	                         <figure class="profile-picture">
	                            उत्तर
	                         </figure>
	                         <div class="message">
	                            {!! $msg->message !!}
	                            <div class="time"><i class="fa fa-clock-o"></i> {{$msg->created_at->diffForHumans()}}</div>
	                         </div>
	                      </li>
	                   	</ul>
                    </div>
					
                   	@endforeach 
             	</div>
             	

	          </div>
	       </div>
	    </div>
	    @else
	    	<div class="bg-warning text-info col-xs-12 col-sm-4 col-sm-offset-4 text-center" id="messageSuccessFeedback">
		        <h3>माफ गर्नुहोला ! तपाइको लागी कुनै संदेश भेटिएन </h3>
	     	</div>
	    @endif
	 </section>
	 </div>
	 <!-- END / COURSE CONCERN -->
	 <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
 	<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
	<script>
        $(document).ready(function(){
        	$(".message-details").hide();
        	$(".message-details").eq(1).show();
        	$(".user-name").on('click', function(){
        		$(".message-details").hide();
        		var msgNo = $(this).index('.user-name');
        		$(".abc").val(msgNo);
        		var mdi = $(".message-details").eq(msgNo).show();
        	});
           
           var editor_config = {
             	selector:'textarea',
             	plugins: [
                   'pramukhime', 'textcolor', 'advlist', 'lists'
             	],
             	image_advtab: false,
             	toolbar: 'pramukhime pramukhimesettings pramukhimeresetsettings pramukhimetogglelanguage pramukhimehelp forecolor backcolor bullist numlist outdent indent',
           	}
      
           	tinymce.init(editor_config);
        	
	        $.validator.setDefaults({
	           ignore: ''
	        });
			
        
    });
    </script>

@endsection