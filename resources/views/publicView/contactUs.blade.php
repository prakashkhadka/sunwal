@extends('layouts.masterLayout.home')

@section('content')
 	<script src="{{asset('js/jquery.validate.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('css/formValidation/screen.css')}}">
<style>
	#messageArea{
		margin-top:157px;
	}
 	#name-error, #email-error, #subject-error, #message-error{
	      color:red;
	      font-style: none;
	      font-size: 10pt;
    }
    #contactSuccessMessage{
      color: green;
      font-weight: bold;
      font-size: 12pt;
      margin-bottom:20px;
    }
</style>
	<div class="main-content-area clearfix" id="messageArea">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
     	<section class="section-padding ">
	      	@if(Session::has('contactSuccess'))
	      		<div id="contactSuccessMessage" class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-4">
	     			तपाइको संदेश प्राप्त भयो l धन्यबाद ! 
	       		</div>
	      	@endif
    	
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12 no-padding commentForm">
                     <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-md-offset-2 col-lg-offset-2">
                        <div class="">
                           <h3>संदेश पठाउनुहोस (Send Message)</h3>
							<p>नेपालीमा लेख्नको लागी स्लाइडर्लाइ दाया तिर गर्नुहोला</p>
                           <form method="post"  action="{{route('sendMessage')}}" id="contactForm">
								 {{ csrf_field() }}
                              <div class="row">
                                 <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                    	<a rel="nofollow" href="http://naya.com.np" title="Nepali Social Network" class="naya_convert"></a>
                                       <input type="text" placeholder="नाम" id="name" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                       <input type="email" placeholder="इमेल (Email)" id="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                    	<a rel="nofollow" href="http://naya.com.np" title="Nepali Social Network" class="naya_convert"></a>
                                       <input type="text" placeholder="बिषय (Subject)" id="subject" name="subject" class="form-control" required >
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                    	<a rel="nofollow" href="http://naya.com.np" title="Nepali Social Network" class="naya_convert"></a>
                                       <textarea cols="12" rows="7" placeholder="संदेश.... (Message...)" id="message" name="message" class="form-control" required></textarea>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button class="btn btn-theme btn-block" type="submit">पठाउनुहोस</button>
                                 </div>
                              </div>

                           </form>

                        </div>
                     </div>
                  </div>
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
     </div>
     <script>
     	$(document).ready(function(){
     		$("#contactForm").validate({
            rules: {
              name: {
                required:true,
                minlength: 2,
                maxlength: 80
              },
              email : "required",
              
              subject: {
                required:true,
                minlength: 3,
                maxlength:100
              },
              message : {
                required: true,
                minlength: 10,
                maxlength: 1500
              }
            },
            messages: {
              name: {
                required: "कृपया आफ्नो नाम लेख्नुहोस ",
                minlength: "कृपया २ अक्षर भन्दा धेरैको नाम लेख्नुहोस",
                maxlength: "कृपया ८० अक्षर भन्दा कम अक्षरको नाम लेख्नुहोस"
              },
              email : "कृपया आफ्नो इमेल एड्रेस राख्नुहोस",
              
              
              subject:{
                required: "कृपया सन्देशको बिषय लेख्नुहोस",
                minlength: "बिषय ३ अक्षर भन्दा धेरैको हुनुपर्दछ",
                maxlength: "बिषय १००  अक्षर भन्दा थोरैको हुनुपर्दछ"
              },
              
              message:{
                required: "कृपया आफ्नो संदेश लेख्नुहोस",
                minlength: "संदेश कम्तिमा १० अक्षरको हुनुपर्दछ",
                maxlength: "संदेश बढीमा १५०० अक्षरको हुनुपर्दछ"
              }
             
            }
          });
     	});
     </script>
@endsection