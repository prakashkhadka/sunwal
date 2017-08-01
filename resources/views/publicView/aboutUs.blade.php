@extends('layouts.masterLayout.home')

@section('content')
	<style>
		#messageArea{
			margin-top:157px;
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
                        
                           <h2 class="text-center">हाम्रो बारे (About us)</h2>
                           <p>
                           	सुनवल नगर डट कम (www.sunwalnagar.com) समुदायमा आधारित वर्गीकृत बिज्ञापन सामाग्री हरु राख्ने समुदायमा आधारिक वेबसाइट हो l  यसमा बिशेष गरि स्थानिय उत्पादन, बस्तु तथा सेवाहरुको बारेमा जानकारी राखिनेछ l  सामुदायिक गतिबिधी, स्थानिय समाचार अनि लेख सृजनाहरु पनि यसमा समाबेस हुनेछन l
                           </p>
                     </div>
                  </div>
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
     </div>

@endsection