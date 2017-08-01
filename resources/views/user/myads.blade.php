@extends('layouts.masterLayout.home')


@section('content')
	<style>
		.mainSection{
			margin-top:157px;
		}
		.listing-content{
			margin-top:157px;
		}
		.accordion-content{
			padding-top:0px;
			padding-left: 30px;
		}
		.selectedCat{
			background-color: red;
		}
		@media (max-width: 481px) {
		  	.header-listing{
				padding:0px;
				padding-top:5px;
				margin-bottom:-20px;
			}
			.sortingArea{
          		margin-left: 0px;
          		margin-right: 0px;
          	}
          	.sortingOne{
          		margin-left:10px;
          		padding-left:10px;
          	}
          	.section-padding{
          		padding-top:20px;
          	}
          	.item{
	        height:260px;
	        
	       }
      	 #imgs img, .item.active img{
	        max-height:255px;
	        width:auto;
	        margin:auto;
	       }	
		}
		#myAdDeleteFeedback{
         	border: 2px solid green;
         	margin-top:0px;
         	padding:10px;
      	}
      	.item{
	        height:260px;
	        
	       }
      	 #imgs img, .item.active img{
	        max-height:255px;
	        width:auto;
	        margin:auto;
	       }
	</style>

     <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
     <section class="section-padding gray mainSection">
      	@if(Session::has('deleteMyAd'))
          	<div class="row">
	        	<div class="bg-success text-warning col-xs-10 col-sm-3 col-sm-offset-6 col-xs-offset-1 text-center" id="myAdDeleteFeedback">
	               बिज्ञापन सफलतापूर्बक हटाइएको छ 
	           	</div>
           	</div>
        @endif
        <!-- Main Container -->
        <div class="container">
           <!-- Row -->
           <div class="row">
           
              <!-- Middle Content Area -->
              <div class="col-md-4 col-sm-12 col-xs-12 leftbar-stick blog-sidebar">
                 <!-- Sidebar Widgets -->
                 <div class="user-profile">
                    <img src="{{$userInfo->file ? URL::asset("userPhoto/{$userInfo->file}") : "images/users/9.jpg"}}" alt="User Photo">
                        
                        <div class="profile-detail">
                           <h6>{{Auth::user()->name}}</h6>
                           <ul class="contact-details">
                              <li>
                                 <i class="fa fa-map-marker"></i> {{$userInfo->address}}
                              </li>
                              <li>
                                 <i class="fa fa-envelope"></i>{{Auth::user()->email}}
                              </li>
                              <li>
                                 <i class="fa fa-phone"></i> {{$userInfo->phone}}
                              </li>
                           </ul>
                        </div>
                        <ul>
                           <li  class="active"><a href="/home">मेरो प्रोफाइल</a></li>
                           <li ><a href="{{route('myAds')}}">मेरो बिज्ञापन / सामाग्री<span class="badge">{{$adNumber}}</span></a></li>
                           <li><a href="#">धेरैले रुचाएको बिज्ञापन <span class="badge">15</span></a></li>
                           <li><a href="{{route('removedAds', Auth::user()->id)}}">हटाएको सामाग्री (Archieves)<span class="badge">{{$rmAd}}</span></a></li>
                           <li ><a href="{{route('myMessage')}}">मेसेज (message)<span class="badge">{{$myMessageNumber}}</span></a></li>
                        </ul>
                 </div>
              </div>
              <div class="col-md-8 col-sm-12 col-xs-12">
                 <!-- Row -->
                 <div class="row">
                    <!-- Sorting Filters -->
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                       <!-- Sorting Filters Breadcrumb -->
                       <!-- Sorting Filters Breadcrumb End -->
                    </div>
                    <!-- Sorting Filters End-->
                    <div class="clearfix"></div>
                    <!-- Ads Archive -->
                   <div class="col-sm-offset-5 col-xs-offset-4 text-success">
		           		<h2>मेरो विज्ञापनहरु</h2>
		           </div>
					<div class="">
						@if(count($myItems)>0)
	                        @foreach($myItems as $myItem)
	                           <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	                              <div class="white category-grid-box-1 ">
	                                 <!-- Image Box -->
	                                 <div class="image">
	                                    <div id="carousel-{{$loop->iteration}}" class="carousel slide slide-carousel" data-ride="carousel">
	                                       <!-- Indicators -->
	                                       <ol class="carousel-indicators">
	                                       		@for($i = 0; $i < $myItem->images()->count(); $i++)
                                       				<li id="carouselInD" data-target="#carousel-{{$loop->iteration}}" data-slide-to="{{$i}}"></li>
	                                       		@endfor
	                                       </ol>
	                                       <!-- Wrapper for slides -->
	                                       <div class="carousel-inner">
	                                       		@foreach($myItem->images as $image)
	                                       			<div id="imgs" class="item"> 
	                                       				<img src="{{URL::asset("productImages/{$image->file}")}}" alt="Image"> 
                                       				</div>
	                                       		@endforeach
	                                       </div>
	                                    </div>
	                                 </div>
	                                 <!-- Short Description -->
	                                 <div class="short-description-1">
	                                 	<p>बिज्ञापन संकेत(Ad ID): {{$myItem->category_id}}-{{$myItem->subcategory_id}}-{{$myItem->id}}</p>
	                                    <!-- Ad Title -->
	                                    <h3>
	                                       <a href="{{route('myAdSinglePage', [$myItem->category_id, $myItem->slug])}}">{{$myItem->title}}</a>
	                                    </h3>
	                                    <!-- Location -->
	                                    <p class="location"><i class="fa fa-map-marker"></i>{{$myItem->address}}</p>
	                                    
	                                    <!-- Price -->
	                                    <span class="ad-price">रु.{{$myItem->price}}</span>
	                                 </div>
	                                 <!-- Ad Meta Stats -->
	                             	<div class="ad-info-1">
	                                    <ul>
	                                       <li> <i class="fa fa-eye"></i><a href="#">445 Views</a> </li>
	                                       <li> <i class="fa fa-clock-o"></i>{{$myItem->created_at->diffForHumans()}} </li>
	                                    </ul>
	                             	</div>
	                              </div>
	                           	</div>
	                           	<!-- Listing Ad Grid --> 
	                        @endforeach   
	                        @else
	                        	<div class="col-md-8 col-lg-8 col-sm-8 col-xs-12 col-sm-offset-2">
	                              	
										माफ गर्नुहोला ! हामीले तपाइको कुनै बिज्ञापन भेट्न सकेनौ l  यदि तपाइले कुनै बिज्ञापन राख्न चाहनुहुन्छ भने सबै भन्दा माथीको निशुल्क बिज्ञापन राख्नुहोस भन्ने बटम क्लिक गर्नुहोला l  धन्यबाद !
	                              	
                              	</div>
	                        @endif
                        </div> 
                        <!-- Ads Archive End -->  
                        <!-- Pagination -->  
                        <div class="clearfix"></div>
                        <div class="row">
	                        <div class="text-center margin-top-30">
	                           <ul class="pagination ">
	                           	<li>{{$myItems->links()}}</li>
	                           </ul>
	                        </div>
                        </div>
                        <!-- Pagination End -->   
                   
                 </div>
                 <!-- Row End -->
              </div>
              <!-- Middle Content Area  End -->

           </div>
           <!-- Row End -->

        </div>
        <!-- Main Container End -->
     </section>
     <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
     <style>
            	.pagination > li > span{
	          		padding:10px 14px;
	          		
	          		height:42PX;
	          		width:36px;
	          		
	          	}
            </style>
     <script>
		$(document).ready(function(){
			$('#imgs:first-of-type').addClass('active');
			$('#carouselInD:first-of-type').addClass('active');
		});
	</script>
@endsection