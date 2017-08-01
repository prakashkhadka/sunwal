@extends('layouts.masterLayout.home')



@section('content')
   <script src="{{asset('js/jquery.validate.min.js')}}"></script>
   <link rel="stylesheet" href="{{asset('css/formValidation/screen.css')}}">
   <style>
      #name-error, #phone-error, #message-error, #email-error, #detailreason-error{color: red;}.msgToOwner{font-size:8pt;}#messageSuccessFeedback{border: 2px solid green; margin-bottom:10px; margin-top:-20px;}#mainSection{margin-top:157px;}.modal-body{padding:0;}.bor{border:10px solid red;}@media(min-width: 481px){.singleListingImage{height:500px; width:auto;}.thm{max-height:80px;}}.thm{max-height:80px;}.single-ad .flexslider .slide-thumbnail li{margin-right:4px; float:none;}

   </style>
   
	<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      
      <div class="main-content-area clearfix" id="mainSection">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding error-page pattern-bgs gray ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  @if(Session::has('messageSuccess'))
                     <div class="bg-success text-warning col-xs-12 col-sm-6 col-sm-offset-3" id="messageSuccessFeedback">
                        तपाइले आफ्नो संदेश बिक्रेतालाई सफलतापुर्बक पठाउनुभएको छ l अब बिक्रेताबाट जवाफको प्रतीक्षा गर्नुहोला l  बिक्रेताले फोन अथवा इमेलमा तपाइको जिज्ञासाको उत्तर दिने भएको हुनाले आफ्नो इमेल समय समयमा चेक गर्नुहोला l  धन्यबाद !
                     </div>
                  @endif

                  @if(Session::has('reportSuccess'))
                     <div class="bg-success text-warning col-xs-12 col-sm-6 col-sm-offset-3" id="messageSuccessFeedback">
                        तपाइको गुनासो हामीलाई प्राप्त भयो l तपाइको गुनासोको सम्बन्धमा हामीले सक्दो छिटो आवश्यक प्रक्रिया सुरु गर्नेछौ l  धन्यबाद !
                     </div>
                  @endif
               
                  <!-- Middle Content Area -->
                  <div class="col-md-8 col-xs-12 col-sm-12">
                     <!-- Single Ad -->
                     <div class="single-ad">
                        <!-- Title -->
                        <div class="ad-box">
                           <h1>{{str_limit($adContent->title, $limit = 70, $end = '...')}}</h1>
                           <div class="short-history">
                              <ul>
                                 <li>प्रकाशित मिति: <b>{{$adContent->created_at}}</b></li>
                                 <li>समूह(Category): <b><a href="#">{{$adContent->category->title}}</a></b></li>
                              </ul>
                           </div>
                        </div>
                        <!-- Listing Slider  --> 
                       
                        <div class="flexslider single-page-slider">
                           <div class="flex-viewport">
                              <ul class="slides slide-main">
                                 @foreach($adContent->images as $image)
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
                                 @foreach($adContent->images as $image)
                                    <li class="thmImg">
                                       <img class="thm" alt="" draggable="false" src="{{URL::asset("productImages/{$image->file}")}}">
                                    </li>
                                 @endforeach
                              </ul>
                           </div>
                        </div>
                        <!-- Share Ad  --> 
                        <div class="ad-share text-center">
                           <div class="ad-box col-md-4 col-sm-4 col-xs-12">

                              <div class="fb-share-button" data-href="{{Request::path()}}" data-layout="button" data-size="large" data-mobile-iframe="true">
                                 <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share
                                 </a>
                              </div>

                           </div>
                           <div data-target=".report-quote" data-toggle="modal" class="ad-box col-md-6 col-sm-6  col-xs-12">
                              <i class="fa fa-flag"></i> <span>रिपोर्ट गर्नुहोस</span>
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


<div id="disqus_thread"></div>
<script>
(function() {
var d = document, s = d.createElement('script');
s.src = 'https://www-sunwalnagar-com-1.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                
                     </div>
                     <!-- Single Ad End --> 
                    

                  </div>
                  <!-- Right Sidebar -->
                  <div class="col-md-4 col-xs-12 col-sm-12">
                     <!-- Sidebar Widgets -->
                     <div class="sidebar">
                        <!-- Contact info -->
                        <div class="contact white-bg">
                           <!-- Email Button trigger modal -->
                           <button class="btn-block btn-contact contactEmail" data-toggle="modal" data-target=".price-quote" >बिक्रेतालाई संदेश पठाउनुहोस</button>
                           <!-- Email Modal -->
                           <button class="btn-block btn-contact contactPhone number" data-last="111111X" >{{$adContent->phone}}</button>
                        </div>
                        <!-- Price info block -->   
                        <div class="ad-listing-price">
                           <p>रु.{{$adContent->price}}</p>
                        </div>
                        <!-- User Info -->
                        <div class="white-bg user-contact-info">
                           <div class="user-info-card">
                              <div class="user-photo col-md-4 col-sm-3  col-xs-4">
                                 <img src="{{URL::asset("userPhoto/{$adContent->user->userInfo->file}")}}" alt="Publishers Photo">
                              </div>
                              <div class="user-information no-padding col-md-8 col-sm-9 col-xs-8">
                                 <span class="user-name"><a class="hover-color" href="profile.html">{{$adContent->user->name}}</a></span>
                                 <div class="item-date">
                                    <span class="ad-pub">प्रकाशित मिती: {{$adContent->created_at}}</span><br>
                                    
                                 </div>
                              </div>
                              <div class="clearfix"></div>
                           </div>
                           <div class="ad-listing-meta">
                              <ul>
                                 <li>बिज्ञापन संकेत (Ad Id): <span class="color">{{$adContent->category_id.'-'.$adContent->subcategory_id.'-'.$adContent->id}}</span></li>
                                 <li>समूह (Categories): <span class="color">{{$adContent->category->title}}</span></li>
                                 <li>हेरेको संख्या (Visits): <span class="color">{{number_format($adContent->adcounter->counter/2,0)}}</span></li>
                                 <li>ठेगाना (Location): <span class="color">{{str_limit($adContent->address, $limit = 15, $end = '...')}}</span></li>
                              </ul>
                           </div>
                           <!-- Saftey Tips  --> 
                           <div class="widget">
                              <div class="widget-heading">
                                 <h4 class="panel-title bigLetter text-center text-warning"><a>साबधान !</a></h4>
                              </div>
                              <div class="widget-content saftey">
                                 <ol>
                                    <li>बिक्रेतालाई भेट्दा जहिले पनि सुरक्षित र सार्बजानिक स्थानमा मात्रै भेट्नुहोला l</li>
                                    <li>बिक्रेतालाइ एकान्त, असुरक्षित तथा जोखिम स्थानमा कहिल्लै पनि नभेट्नुहोला l</li>
                                    <li>सामान खरिद गरेको रसिद अवस्य लिनुहोला l</li>
                                    <li>बिक्रेतालाई भेट्नुपूर्व फोन गरेर अथवा अन्य तरिकाबाट सम्पर्क गरि बस्तु तथा सेवाको बारेमा सुनिस्चित गर्नुहोस l</li>
                                 </ol>
                              </div>
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
      <div class="modal fade price-quote" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h3 class="modal-title" id="lineModalLabel">बिक्रेताकोलागी संदेश (Message)</h3>
               </div>
               <div class="modal-body">
                  <!-- content goes here -->
                  
                  <form method="POST" action="message" id="messageForm">
                     {{ csrf_field() }}
                     @if(Auth::user())
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                     @endif
                     <input type="hidden" name="ad_id" value="{{$adContent->id}}">
                     <input type="hidden" name="seller_id" value="{{$adContent->user_id}}">
                     <div class="form-group  col-md-6  col-sm-6">
                        <label>नाम (Name) : </label>
                        <input id="name" name="name" type="text" class="form-control" value="{{Auth::user() ? Auth::user()->name : ''}}" placeholder = "{{Auth::user() ? '' : 'आफ्नो नाम राख्नुहोस'}}"  required> 
                     </div>

                     <div class="form-group  col-md-6  col-sm-6">
                        <label>इमेल एड्रेस (Email Address)</label>
                        <input name="email" type="email" class="form-control" placeholder="{{Auth::user() ? '' : 'इमेल एड्रेस राख्नुहोस'}}" value="{{Auth::user() ? Auth::user()->email : ''}}" required> 
                     </div>

                     <div class="form-group  col-md-12  col-sm-12">
                        <label>फोन नम्बर (Contact No)</label>
                        <input name="phone" type="number" class="form-control" placeholder="{{Auth::user() ? '' : 'फोन नम्बर राख्नुहोस'}}" value="{{Auth::user() ? Auth::user()->userInfo->phone  : ''}}" required> 
                     </div>

                     <div class="form-group  col-md-12  col-sm-12">
                        <label>संदेश (Message) </br><span class="msgToOwner text-success">नेपालीमा लेख्नकोलागी मेनुबाट नेपाली भाषा छनौट गर्नुहोला</span></label>
                        <textarea name="message" rows="10" class="form-control" placeholder="aabc" required></textarea>
                     </div>
                    
                     <div class="col-md-12  col-sm-12 margin-bottom-20 margin-top-20">
                        <button type="submit" class="btn btn-theme btn-block">पठाउनुहोस (Send)</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>

      <!-- =-=-=-=-=-=-= Report Ad Modal =-=-=-=-=-=-= -->
      <div class="modal fade report-quote" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h3 class="modal-title">रिपोर्ट (गुनासो) गर्नुको कारण</h3>
               </div>
               <div class="modal-body">
                  <!-- content goes here -->
                  <form method="POST" action="report" id="reportForm">
                  {{ csrf_field() }}
                  <input type="hidden" name="ad_id" value="{{$adContent->id}}">
                     <div class="skin-minimal">
                        <div class="form-group col-md-6 col-sm-6">
                           <ul class="list">
                              <li >
                                 <input type="radio" id="spam" name="reason" value="Wrong">
                                 <label for="spam">गलत / भ्रामक</label>
                              </li>
                              <li>
                                 <input  type="radio" id="duplicated" name="reason" value="Offensive">
                                 <label for="duplicated">आपत्तीजनक</label>
                              </li>
                              <li >
                                 <input  type="radio" id="offensive" name="reason" value="Other">
                                 <label for="offensive">अन्य</label>
                              </li>
                           </ul>
                        </div>
                        <div class="form-group  col-md-6 col-sm-6">
                           <ul class="list">
                              <li >
                                 <input  type="radio" id="offensive" name="reason" value="Not Available">
                                 <label for="offensive">सामाग्री उपलब्ध छैन</label>
                              </li>
                              <li>
                                 <input  type="radio" id="expired" name="reason" value="No response">
                                 <label for="expired">बिक्रेताबाट कुनै जवाफ आएन</label>
                              </li>
                           </ul>
                        </div>
                     </div>

                     <div class="form-group  col-md-12 col-sm-12 col-xs-12">
                        <label>कृपया कारण बिस्तृत रुपमा तल लेख्नुहोस </br><span class="msgToOwner text-success">नेपालीमा लेख्नकोलागी मेनुबाट नेपाली भाषा छनौट गर्नुहोला</span></label>
                        <textarea name="detailreason" id="detailreason" placeholder="This ad not belong to me" rows="3" class="form-control"></textarea>
                     </div>
                     <div class="clearfix"></div>
                     <div class="col-md-12 col-sm-12 margin-bottom-20 margin-top-20">
                        <button type="submit" class="btn btn-theme btn-block">पठाउनुहोस</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>

         <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
         <script>
            $(document).ready(function(){
               var editor_config = {
                 selector:'textarea',
                 plugins: [
                   'pramukhime', 'textcolor', 'advlist', 'lists'
                 ],
                 image_advtab: false,
                 toolbar1: 'pramukhime pramukhimesettings pramukhimeresetsettings pramukhimetogglelanguage pramukhimehelp',
                 toolbar2: 'forecolor backcolor bullist numlist outdent indent',


               }
          
            tinymce.init(editor_config);
            $.validator.setDefaults({
               ignore: ''
            });
              
               $("#messageForm").validate({
                  rules:{
                     name:{
                        required:true,
                        minlength:3,
                        maxlength:60
                     },
                     email:{
                        required:true,
                     },
                     phone:{
                        required:true,
                        minlength:9,
                        maxlength:13
                     },
                     message:{
                        required:true,
                        minlength:5,
                        maxlength:1000
                     }

                  },
                  messages:{
                     name:{
                        required: "कृपया आफ्नो नाम राख्नुहोस",
                        minlength: "नाम कान्तिमा ३ अक्षरको हुनुपर्दछ",
                        maxlength: "नाम बढीमा ६० अक्षरको हुनुपर्दछ "
                     },
                     email:{
                        required: "इमेल एड्रेस राख्नुहोस"
                     },
                     phone:{
                        required: "कृपया आफ्नो फोन नम्बर राख्नुहोस",
                        minlength: "फोन नम्बर कम्तिमा पनि ९ अंकको हुनुपर्दछ",
                        maxlength: "फोन नम्बर बढीमा १३ अंकको हुनुपर्दछ"
                     },
                     message:{
                        required: "कृपया आफ्नो संदेश लेख्नुहोस",
                        minlength: "संदेश कम्तिमा पनि ५ अक्षरको हुनुपर्दछ",
                        maxlength: "संदेश बढीमा १००० अक्षरको हुनुपर्दछ"
                     }
                  }
               });

               $("#reportForm").validate({
                  rules:{
                     detailreason:{
                        required:true,
                        minlength:5,
                        maxlength:1000
                     }
                  },
                  messages:{
                     detailreason:{
                        required: "कृपया रिपोर्ट गर्नुको कारण लेख्नुहोस",
                        minlength: "कारण कम्तिमा पनि ५ अक्षरको हुनुपर्दछ",
                        maxlength: "कारण बढीमा १००० अक्षरको हुनुपर्दछ"
                     }
                  }
               });
            });
         </script>
         <script id="dsq-count-scr" src="//www-sunwalnagar-com-1.disqus.com/count.js" async></script>

@stop