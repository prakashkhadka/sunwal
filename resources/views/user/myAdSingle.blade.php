@extends('layouts.masterLayout.home')



@section('content')
   <style>
      .listing-content{
         margin-top:157px;
      }
      
   </style>
	<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
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
                           <h1>{{$adContent->title}}</h1>
                           <div class="short-history">
                              <ul>
                                 <li>प्रकाशित मिति: <b>{{$adContent->created_at}}</b></li>
                                 <li>समूह(Category): <b><a href="#">{{$adContent->category->title}}</a></b></li>
                              </ul>
                           </div>
                        </div>
                        <!-- Listing Slider  --> 
                        <style>
                           .bor{
                              border:10px solid red;
                           }
                           @media(min-width: 481px){
                              .singleListingImage{
                                 height:500px;
                                 width:auto;
                              }
                              .thm{
                                 max-height:80px;
                              }
                           }
                           .thm{
                                 max-height:80px;
                              }
                           
                           .single-ad .flexslider .slide-thumbnail li{
                              margin-right:4px;
                              float:none;
                           }

                           
                        </style>
                        <div class="flexslider single-page-slider">
                           <div class="flex-viewport">
                              <ul class="slides slide-main">
                                 @foreach($adContent->images as $image)
                                    <li><img class="singleListingImage" alt="" src="{{URL::asset("productImages/{$image->file}")}}" title=""></li>
                                 @endforeach
                              </ul>
                           </div>
                        </div>
                        <!-- Listing Slider Thumb --> 
                        <div class="flexslider" id="carousels">
                           <div class="flex-viewport">
                              <ul class="slides slide-thumbnail">
                                 @foreach($adContent->images as $image)
                                    <li><img alt="" draggable="false" src="{{URL::asset("productImages/{$image->file}")}}"></li>
                                 @endforeach
                              </ul>
                           </div>
                        </div>
                        <!-- Share Ad  --> 
                        <div class="ad-share text-center">
                           <div class="ad-box col-md-4 col-sm-4 col-xs-12">
                              <div class="fb-share-button" data-href="{{Request::path()}}" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
                           </div>
                           <a class="ad-box col-md-4 col-sm-4 col-xs-12" href="{{route('editMyAd', [$adContent->id, $adContent->user_id])}}"><i class="fa fa-pencil active"></i> <span class="hidetext">सम्पादन (Edit)</span></a>
                           <div data-target="#removeModal" data-toggle="modal" class="ad-box col-md-4 col-sm-4 col-xs-12">
                              <i class="fa fa-trash"></i> <span class="hidetext">हटाउनुहोस</span>
                           </div>
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
                                 <span><strong>अवस्था(Condition)</strong> :</span> {{$adContent->condition === 'new' ? 'नयाँ' : 'पुरानो'}}
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>ब्राण्ड(Brand)</strong> :</span> Nokia
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>मिती(Date)</strong> :</span> {{$adContent->created_at}}
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>मूल्य(Price)</strong> :</span> रु.{{$adContent->price}}
                              </div>
                           </div>
                          
                           <!-- Ad Specifications --> 
                           <div class="specification">
                              {!! $adContent->ownermsg !!}
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
                           <p>रु.{{$adContent->price}}</p>
                        </div>
                        <!-- User Info -->
                        <div class="white-bg user-contact-info">
                           <div class="ad-listing-meta">
                              <ul>
                                 <li>प्रकाशित मिती : <span class="color">{{$adContent->created_at}}</span></li>
                                 <li>बिज्ञापन संकेत (Ad Id): <span class="color">{{$adContent->category_id.'-'.$adContent->subcategory_id.'-'.$adContent->id}}</span></li>
                                 <li>समूह (Category): <span class="color">{{$adContent->category->title}}</span></li>
                                 <li>हेरेको संख्या (Visits): <span class="color">{{number_format($maxViewCount/2,0)}}</span></li>
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
            <!-- Main Container End -->
         </section>
         </div>
         <!-- =-=-=-=-=-=-= Report Ad Modal =-=-=-=-=-=-= -->
         <div id="removeModal" class="modal fade report-quote" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                     <h3 class="modal-title text-center">यो बिज्ञापन किन हटाउदै हुनुहुन्छ ?</h3>
                  </div>
                  <div class="modal-body">
                     {!! Form::open(['method'=>'PATCH', 'action'=>['User\MyadsController@update', $adContent->id]]) !!}

                        <div class="skin-minimal">
                           <div class="form-group col-md-6 col-sm-6 col-xs-12">
                              <ul class="list">
                                 <li >
                                    <input type="radio" id="spam" name="minimal-radio">
                                    <label for="spam">बिक्री भैसक्यो</label>
                                 </li>
                                 <li>
                                    <input  type="radio" id="duplicated" name="minimal-radio" >
                                    <label for="duplicated">अन्य</label>
                                 </li>
                              </ul>
                           </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12 col-xs-12 margin-bottom-20 margin-top-20">
                           <button type="submit" class="btn btn-theme btn-block">हटाउनुहोस (DELETE)</button>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 margin-bottom-10 margin-top-0">
                           <button data-dismiss="modal" class="btn btn-primary btn-block">क्यान्सिल गर्नुहोस (Cancel)</button>
                        </div>
                     {!! Form::close() !!}
                  </div>
               </div>
            </div>
         </div>

@stop