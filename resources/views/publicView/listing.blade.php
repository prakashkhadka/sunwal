@extends('layouts.masterLayout.home')



@section('content')
	<style>
		.listing-content{margin-top:157px;}.accordion-content{padding-top:0px;padding-left: 30px;}.selectedCat{background-color: red;}.emptyResult{margin-top:30px; margin-bottom:30px;}.item{height:270px;}#imgs img, .item.active img{max-height:270px; width:auto; margin:auto;}@media (max-width: 481px){.header-listing{padding:0px;padding-top:5px;margin-bottom:-20px;}.sortingArea{margin-left: 0px; margin-right: 0px;}.sortingOne{margin-left:10px; padding-left:10px;}.section-padding{padding-top:20px;}.item{height:270px;}#imgs img, .item.active img{max-height:270px; width:auto; margin:auto;}}
		
	</style>


	<section class="listing-content">
      <div class="main-content-area clearfix">
         <section class="section-padding gray">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 col-md-push-4 col-lg-8 col-sx-12">
                     <div class="row">
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                          <div class="clearfix"></div>
            							<div class="listingTopFilterBar">
             								 <div class="col-md-7 col-xs-12 col-sm-6 no-padding">
                                <ul class="filterAdType">
                                    <li class="active"><a href="">बिज्ञापन संख्या : <small>{{count($listingItems)}}</small></a> </li>
                                </ul>
                              </div>
            							</div>
                        </div>
                        <div class="clearfix"></div>
                        @if(count($listingItems)>0)
                        <div class="">
	                        @foreach($listingItems as $listingItem)
	                           <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	                              <div class="white category-grid-box-1 ">
	                                 <div class="image">
	                                    <div id="carousel-{{$loop->iteration}}" class="carousel slide slide-carousel" data-ride="carousel">
	                                       <ol class="carousel-indicators">
	                                       		@for($i = 0; $i < $listingItem->images()->count(); $i++)
                                       				<li id="carouselInD" data-target="#carousel-{{$loop->iteration}}" data-slide-to="{{$i}}"></li>
	                                       		@endfor
	                                       </ol>
	                                       <div class="carousel-inner">
	                                       		@foreach($listingItem->images as $image)
	                                       			<div id="imgs" class="item"> 
	                                       				<img class="imageList" src="{{URL::asset("productImages/{$image->file}")}}" alt="Image"> 
                                       				</div>
	                                       		@endforeach
	                                       </div>
	                                    </div>
	                                 </div>
	                                 <div class="short-description-1">
	                                 	<p>बिज्ञापन संकेत(Ad ID): {{$listingItem->category_id}}-{{$listingItem->subcategory_id}}-{{$listingItem->id}}</p>
	                                    <h3>
	                                       <a href="{{route('listingSinglePage', [$listingItem->category_id, $listingItem->slug])}}"><span id="CatTtl">{{str_limit($listingItem->title, $limit=45, $end='...')}}</span></a>
	                                    </h3>
	                                    <p class="location"><i class="fa fa-map-marker"></i>{{str_limit($listingItem->address, $limit=50, $end='...')}}</p>
	                                    <span class="ad-price">रु.{{$listingItem->price}}</span>
	                                 </div>
  	                             	 <div class="ad-info-1">
	                                    <ul>
	                                       <li> <i class="fa fa-eye"></i><a href="#">{{$listingItem->adcounter->counter}} Views</a> </li>
	                                       <li> <i class="fa fa-clock-o"></i>{{$listingItem->created_at->diffForHumans()}} </li>
	                                    </ul>
  	                             	</div>
	                              </div>
	                           	</div>
	                        @endforeach   
                        </div>
                        @else
                          <div class="text-center emptyResult">
                            <h3>माफ गर्नुहोला ! तपाइले खोजेको सामाग्री भेटिएन</h3>
                          </div>
                        @endif
                        <div class="col-md-12 col-xs-12 col-sm-12">
                          <section class="advertising">
                             <a href="post-ad-1.html">
                                <div class="banner">
                                   <div class="wrapper">
                                      <span class="title">
                                      	<a href="/register">
                                      		के तपाई संग पनि यस्तै नयाँ तथा पुराना सामाग्रीहरु बिक्रीको लागी छन् ? आफ्नो बिज्ञापन राख्नको लागी रजिस्टर गर्नुहोस !
                                      	</a>
                                      </span>
                                   </div>
                                </div>
                             </a>
                          </section>
                       </div>  
                        <div class="clearfix"></div> 
                        <div>
	                        <div class="text-center margin-top-30">
	                           <ul class="pagination">
	                           	<li>{{$listingItems->links()}}</li>
	                           </ul>
	                        </div>
                        </div>  
                     </div>
                  </div>
                  <div class="col-md-4 col-md-pull-8 col-sx-12">
                     <div class="sidebar">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                           <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingOne">
                                 <h5 class="panel-title text-weight=">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    <span class="lead"><strong>समूह (Categories)</strong></span>
                                    </a>
                                 </h5>
                              </div>
                              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                 <div class="panel-body categories">
                                    <ul>
	                                    @foreach($categories as $category)
	                                    	<div role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseCat" aria-expanded="true" aria-controls="collapseOne">
	                                			  <i class="more-less"></i>
  	                                			@if(count($subcategories)> 0)
  		                                			<li>
  		                                				<ul class="accordion">
  		                                					<li>
  		                                						<h3 class="accordion-title">
  				                                					<a class="{{$category->id == $id ? 'bg-success' : ''}}" href="#"><i><img height="20" src="{{URL::asset("categoryImages/{$category->categoryImg}")}}"" alt="">
  				                                						</i>{{$category->title}}
  				                                					</a>
  			                                					</h3>
  			                                					@foreach($subcategories as $subcategory)		
    							                        				  @if($subcategory->category_id === $category->id)
    					                                					<div class="accordion-content {{$category->id == $id ? 'collapse in' : 'collapse out'}}">
    										                                    <ul>
                                                              <a href="{{route('sublisting', [$category->id, $subcategory->id])}}">
            										                        				<li>
          									                        							<i>
                                                                    <img height="20" src="{{URL::asset("subCatImg/{$subcategory->subCatImg}")}}"" alt="">
                                                                  </i>
                                                                    @if($subCI == 0)
                      																						    {{$subcategory->title}}
                                                                    @else
                                                                      <span class="{{$subcategory->id == $subCI ? 'subCategory' : ''}}">
                                                                        {{$subcategory->title}}
                                                                        @if($subcategory->id == $subCI)
                                                                          <i class="fa fa-arrow-right"></i>
                                                                        @endif
                                                                      </span>
                                                                    @endif
                        																				</li>
                                                              </a>
    										                                    </ul>
    					                                					</div>
    			                                						@endif	
  							                                    @endforeach
  		                                					</li>
  		                                				</ul>
  		                                			</li> 
  	                            				@endif
                                      </div>
	                                    @endforeach
                                    </ul>
                                 </div>
                              </div>
                           </div>    
                           <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingTwo">
                                 <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    ब्राण्ड(Brands)
                                    </a>
                                 </h4>
                              </div>
                              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                 <div class="panel-body">
                                    <div class="search-widget">
                                       <input placeholder="search" type="text">
                                       <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>                           
                                    <div class="skin-minimal">
                                       <ul class="list">
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-1">
                                             <label for="minimal-checkbox-1">All Brands</label>
                                          </li>
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-2">
                                             <label for="minimal-checkbox-2">Samsung</label>
                                          </li>
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-3">
                                             <label for="minimal-checkbox-3">Apple</label>
                                          </li>
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-4">
                                             <label for="minimal-checkbox-4">Nokia</label>
                                          </li>
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-5">
                                             <label for="minimal-checkbox-5">Sony</label>
                                          </li>
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-6">
                                             <label for="minimal-checkbox-6">Blackberry</label>
                                          </li>
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-7">
                                             <label for="minimal-checkbox-7">HTC</label>
                                          </li>
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-8">
                                             <label for="minimal-checkbox-8">Motorola</label>
                                          </li>
                                       </ul>
                                    </div>                
                                 </div>
                              </div>
                           </div>  
                           <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingThree">
                                 <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    अवस्था(Condition)
                                    </a>
                                 </h4>
                              </div>
                              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                 <div class="panel-body">
                                    <div class="skin-minimal">
                                       <ul class="list">
                                          <li>
                                             <input tabindex="7" type="radio" id="minimal-radio-1" name="minimal-radio">
                                             <label for="minimal-radio-1">नयाँ</label>
                                          </li>
                                          <li>
                                             <input tabindex="8" type="radio" id="minimal-radio-2" name="minimal-radio" checked>
                                             <label for="minimal-radio-2">पुरानो</label>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           </div>
                           </div>
                        </div>
                  </div>
               </div>
               </section>
            </div>
	       </section>


            <style>
              .pagination > li > span{padding:10px 14px; height:42PX; width:36px;}.subCategory{color:green; font-weight:bold;}#CatTtl{font-weight:bold; color:green;}
            </style>

            <script>
              $(document).ready(function(){
                $("#collapseOne").on('click', 'a', function(e) { e.stopPropagation(); })
                $('#imgs:first-of-type').addClass('active');
                $('#carouselInD:first-of-type').addClass('active');
              });
          </script>
@stop