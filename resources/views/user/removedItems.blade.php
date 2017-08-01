@extends('layouts.masterLayout.home')


@section('content')
<style>
  .listing-content{
     margin-top:157px;
  }
  .restore{
  	margin-top:10px;
  }
  #myAdDeleteFeedback{
 	border: 2px solid green;
 	margin-top:0px;
 	padding:10px;
	}
  
</style>
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
  <div class="main-content-area clearfix listing-content">
     <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
     <section class="section-padding gray">
     <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-5 text-success col-xs-12">
		<h2>हटाइएका सामाग्रीहरु</h2>
	 </div>
     @if(count($removedAds)>0)
     	@if(Session::has('deleteForever'))
	     	<div class="row">
	        	<div class="bg-success text-warning col-xs-10 col-sm-3 col-sm-offset-6 col-xs-offset-1 text-center" id="myAdDeleteFeedback">
	               बिज्ञापन सफलतापूर्बक  सधैको लागी हटाइएको छ 
	           	</div>
	       	</div>
       	@endif

       	@if(Session::has('restore'))
	     	<div class="row">
	        	<div class="bg-success text-warning col-xs-10 col-sm-3 col-sm-offset-6 col-xs-offset-1 text-center" id="myAdDeleteFeedback">
	               यो बिज्ञापन सफलतापुर्बक पुन: प्रकाशित गरिएकोछ 
	           	</div>
	       	</div>
       	@endif
        <!-- Main Container -->
        <div class="container">
           <!-- Row -->
           <div class="row">
           		
              <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
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
                    <div class="posts-masonry">
                       <div class="col-md-12 col-xs-12 col-sm-12 user-archives">
							@foreach($removedAds as $removedAd)



	                          <!-- Ads Listing -->
	                          <div class="ads-list-archive">
	                             <!-- Image Block -->
	                             <div class="col-lg-5 col-md-5 col-sm-5 no-padding">
	                                <!-- Img Block -->
	                                <div class="ad-archive-img ">
	                                   <a href="#">
		                                @if(count($removedAd->images)>0)
		                                Images comes here.
										<img class="singleListingImage" alt="" src="{{URL::asset("productImages/{$removedAd->images[0]->file}")}}" title="">

		                                @foreach($removedAd->images as $image)

											

		                                @endforeach



		                                @else
		                                	<img src="{{asset('images/posting/2.jpg')}}" alt="">
		                                @endif

	                                   </a>
	                                   <div class="sold">
	                                      <img class="img-responsive" src="{{asset('images/sold.png')}}" alt="">
	                                   </div>
	                                </div>
	                                <!-- Img Block -->   
	                             </div>
	                             <!-- Ads Listing -->    
	                             <div class="clearfix visible-xs-block"></div>
	                             <!-- Content Block -->     
	                             <div class="col-lg-7 col-md-7 col-sm-7 no-padding">
	                                <!-- Ad Desc -->     
	                                <div class="ad-archive-desc">
	                                   <!-- Price -->    
	                                   <div class="ad-price">रु.{{$removedAd->price}}</div>
	                                   <!-- Title -->    
	                                   <h3>{{$removedAd->title}}</h3>
	                                   <!-- Category -->
	                                   <div class="category-title"> <span><a href="#">{{$removedAd->category->title}}</a></span> </div>
	                                   <!-- Short Description -->
	                                   <div class="clearfix visible-xs-block"></div>
	                                   <p class="hidden-sm">{!! $removedAd->owernmsg !!}</p>
	                                   <!-- Ad Features -->
	                                   <ul class="add_info">
	                                      <!-- Contact Details -->
	                                      <li>
	                                         <div class="custom-tooltip tooltip-effect-4">
	                                            <span class="tooltip-item"><i class="fa fa-phone"></i></span>
	                                            <div class="tooltip-content">
	                                               <h4>सम्पर्क</h4>
	                                               <strong>इमेल</strong> {{$removedAd->user->email}}
	                                               <br>
	                                               <strong>फोन</strong> <span class="label label-success">{{$removedAd->phone}}</span>
	                                            </div>
	                                         </div>
	                                      </li>
	                                      <!-- Address -->
	                                      <li>
	                                         <div class="custom-tooltip tooltip-effect-4">
	                                            <span class="tooltip-item"><i class="fa fa-map-marker"></i></span>
	                                            <div class="tooltip-content">
	                                               <h4>ठेगाना</h4>
	                                               {{$removedAd->address}}
	                                            </div>
	                                         </div>
	                                      </li>
	                                      <!-- Ad Type -->
	                                      <li>
	                                         <div class="custom-tooltip tooltip-effect-4">
	                                            <span class="tooltip-item"><i class="fa fa-cog"></i></span>
	                                            <div class="tooltip-content">
	                                               <strong>अवस्था</strong> <span class="label label-danger">{{$removedAd->condition}}</span>
	                                            </div>
	                                         </div>
	                                      </li>
	                                   </ul>
	                                   <!-- Ad History -->
	                                   <div class="clearfix archive-history">
	                                      <div class="last-updated">
	                                      	हटाइएको: {{$removedAd->deleted_at}} ({{$removedAd->deleted_at->diffForHumans()}})
	                                      </div>
	                                      <div class="clearfix"></div>
	                                      <div class="ad-meta">
	                                         <a href="{{route('deleteForever', [$removedAd->id, $removedAd->user_id])}}" class="btn btn-danger"><i class="fa fa-trash"></i> स्थायी रुपमा हटाउनुहोस</a>
	                                      </div>
	                                   </div>
	                                   <div class="ad-meta restore">
	                                         <a href="{{route('restore', [$removedAd->id, $removedAd->user_id])}}" class="btn btn-primary"><i class="fa fa-repeat"></i>पुन: प्रकाशित गर्नुहोस</a>
	                                      </div>
	                                </div>
	                                <!-- Ad Desc End -->     
	                             </div>
	                             <!-- Content Block End --> 
	                          </div>
							@endforeach
                       </div>
                    </div>

                    <!-- Ads Archive End -->  
                    <div class="clearfix"></div>
                    <!-- Pagination -->  
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="text-center margin-top-30">
                           <ul class="pagination ">
                           	<li>{{$removedAds->links()}}</li>
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
        @else
        <div class="col-sm-3 col-sm-offset-4 col-xs-10 col-xs-offset-1">
        	<p>माफ गर्नुहोस ! तपाइको कुनै पनि हटाइएको सामाग्री फेला परेन</p>
        </div>
        @endif
     </section>
     </div>
     <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
	<style>
    	.pagination > li > span{
      		padding:10px 14px;
      		
      		height:42PX;
      		width:36px;
      		
      	}
    </style>


@endsection