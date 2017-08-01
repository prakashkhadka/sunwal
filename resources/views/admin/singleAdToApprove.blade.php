@extends('layouts.adminLayout.adminMasterLayout')

@section('content')    
<h2 class="text-center text-info">यो बिज्ञापनलाइ एडमिनको स्वीकृति चाहिन्छ </h2>
<style>
   .bor{
      border:10px solid red;
   }
   @media(min-width: 481px){
      .singleListingImage{
         width:750px;
         min-height:420px;
      }
   }
</style>

<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
@foreach($adToApprove as $ad)
      <div class="main-content-area clearfix listing-content">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding error-page pattern-bgs gray ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-8 col-xs-12 col-sm-12">
                     <!-- Single Ad -->
                     <div class="single-ad">
                        <!-- Title -->
                        <div class="ad-box">
                           <h1>{{$ad->title}}</h1>
                           <div class="short-history">
                              <ul>
                                 <li>प्रकाशित मिति: <b>{{$ad->created_at}}</b></li>
                                 <li>समूह(Category): <b><a href="#">{{$ad->category->title}}</a></b></li>
                              </ul>
                           </div>
                        </div>
                        <!-- Listing Slider  --> 
                        
                        <div class="flexslider single-page-slider">
                           <div class="flex-viewport">
                              <ul class="slides slide-main">
                                 @foreach($ad->images as $image)
                                    <li>
                                    	<img class="singleListingImage" alt="" src="{{URL::asset("productImages/{$image->file}")}}" title="">
                                    </li>
                                 @endforeach
                              </ul>
                           </div>
                        </div>
                        <!-- Listing Slider Thumb --> 
                        <div class="flexslider" id="carousels">
                           <div class="flex-viewport">
                              <ul class="slides slide-thumbnail">
                                 @foreach($ad->images as $image)
                                    <li><img alt="" draggable="false" src="{{URL::asset("productImages/{$image->file}")}}"></li>
                                 @endforeach
                              </ul>
                           </div>
                        </div>
                        <!-- Share Ad  --> 
                        <div class="ad-share text-center">
                        <!--
                           <div data-toggle="modal" data-target=".share-ad" class="ad-box col-md-4 col-sm-4 col-xs-12">
                              <i class="fa fa-facebook-official"></i> <span class="hidetext">शेयर गर्नुहोस</span>
                           </div>
                           LInk Is : localhost:8000/{{Request::path()}}
                           -->
                         
                            
                           <div class="ad-box col-md-4 col-sm-4 col-xs-12">
                              <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
                           </div>
                          

                          


                           <a class="ad-box col-md-4 col-sm-4 col-xs-12" href="{{route('approvePost', [$ad->id, $adminID])}}"></i> <span class="hidetext">स्विकिती दिनुहोस (Approve)</span></a>
                           
                        </div>
                        <div class="clearfix"></div>
                        <!-- Short Description  --> 
                        <div class="ad-box">
                           <div class="short-features">
                              <!-- Heading Area -->
                              <div class="heading-panel">
                                 <h3 class="main-title text-left">
                                    बिवरण(Description) 
                                 </h3>
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>अवस्था(Condition)</strong> :</span> {{$ad->condition === 'new' ? 'नयाँ' : 'पुरानो'}}
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>ब्राण्ड(Brand)</strong> :</span> Nokia
                              </div>
                              <!--
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Model</strong> :</span> Lumia 625
                              </div>
                              -->
                              <!--
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Product Type</strong>:</span> MODEL No
                              </div>
                              -->
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>मिती(Date)</strong> :</span> {{$ad->created_at}}
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>मूल्य(Price)</strong> :</span> रु.{{$ad->price}}
                              </div>
                           </div>
                          
                           <!-- Ad Specifications --> 
                           <div class="specification">
                              {!! $ad->ownermsg !!}
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                     <!-- Single Ad End --> 
                    

                  </div>
                  <!-- Right Sidebar -->
                  <div class="col-md-4 col-xs-12 col-sm-12">
                     <!-- Sidebar Widgets -->
                     <div class="sidebar">
                        
                        <!-- Price info block -->   
                        <div class="ad-listing-price">
                           <p>रु.{{$ad->price}}</p>
                        </div>
                        <!-- User Info -->
                        <div class="white-bg user-contact-info">
                           <div class="ad-listing-meta">
                              <ul>
                                 <li>प्रकाशित मिती : <span class="color">{{$ad->created_at}}</span></li>
                                 <li>बिज्ञापन संकेत (Ad Id): <span class="color">{{$ad->category_id.'-'.$ad->subcategory_id.'-'.$ad->id}}</span></li>
                                 <li>समूह (Category): <span class="color">{{$ad->category->title}}</span></li>
                                 <li>हेरेको संख्या (Visits): <span class="color">9</span></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <!-- Sidebar Widgets End -->
                  </div>
                  <!-- Middle Content Area  End -->
               </div>
               <!-- Row End -->
            </div>
            </section>
        </div>
    @endforeach
	<!-- =-=-=-=-=-=-= Main Content Area END =-=-=-=-=-=-= -->
	
@endsection