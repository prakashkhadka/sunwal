@extends('layouts.masterLayout.home')

@section('content')


 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.0/min/dropzone.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.0/min/dropzone.min.css">

 

<section class="master-container">
<style>
  .welcomeUser{
    font-size:14pt;
    font-weight:bold;
    color:orange;
  }
</style>
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding gray">
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
                           <li><a href="{{route('myAdSinglePage', [$maxViewedAd->category_id, $maxViewedAd->slug])}}">धेरैले रुचाएको बिज्ञापन <span class="badge">{{number_format($maxViewCount/2,0)}}</span></a></li>
                           <li><a href="{{route('removedAds', Auth::user()->id)}}">हटाएको सामाग्री (Archieves)<span class="badge">{{$rmAd}}</span></a></li>
                           <li ><a href="{{route('myMessage')}}">मेसेज (message)<span class="badge">{{$myMessageNumber}}</span></a>
                        </ul>
                     </div>
                     
                  </div>
                  <div class="col-md-8 col-sm-12 col-xs-12">
                  <div class="bg-success text-center">
                      @if(Session::has('registerSuccess'))
                          स्वागत छ <span class="welcomeUser"> {{Auth::user()->name}}</span> जी {{Session::get('registerSuccess')}}
                      @endif
                  </div>
                     <!-- Row -->
                     <div class="profile-section margin-bottom-20">
                        <div class="profile-tabs">
                           <ul class="nav nav-justified nav-tabs">
                              <li class="active"><a href="#profile" data-toggle="tab">मेरो बिवरण</a></li>
                              <li><a href="#edit" data-toggle="tab">बिवरण सम्पादन</a></li>
                           </ul>
                           <div class="tab-content">
                              <div class="profile-edit tab-pane fade in active" id="profile">
                                 <h2 class="heading-md">Manage your Name, ID and Email Addresses.</h2>
                                 <p>Below are the name and email addresses on file for your account.</p>
                                 <dl class="dl-horizontal">
                                    <dt><strong>नाम </strong></dt>
                                    <dd>
                                       {{Auth::user()->name}}
                                    </dd>
                                    <dt><strong>इमेल</strong></dt>
                                    <dd>
                                       {{Auth::user()->email}}
                                    </dd>
                                    <dt><strong>फोन नम्बर </strong></dt>
                                    <dd>
                                       {{$userInfo->phone}}
                                    </dd>
                                    <dt><strong>नगर / गाउँ पालिका </strong></dt>
                                    <dd>
                                       {{$userInfo->municipility}}
                                    </dd>
                                    <dt><strong>वडा नम्बर</strong></dt>
                                    <dd>
                                       {{$userInfo->ward}}
                                    </dd>
                                    <dt><strong>गाउँ / टोल</strong></dt>
                                    <dd>
                                       {{$userInfo->tol}}
                                    </dd>
                                    </dd>
                                    <dt><strong>ठेगाना  </strong></dt>
                                    <dd>
                                       {{$userInfo->address}}
                                    </dd>
                                 </dl>
                              </div>
                              <div class="profile-edit tab-pane fade" id="edit">
                                 <h2 class="heading-md text-center">प्रोफाइल परिवर्तन गर्नुहोस </h2>
                                 <div class="dz-message text-danger text-center" data-dz-message>
                                    <span> नेपालीमा टाइप गर्नको लागी लेख्ने ठाउ भन्दा माथी आउने स्लाइडरलाइ दाँया तिर नेपालीमा सेट गर्नुहोला |
                                    </span>
                                  </div>
                                 <div class="clearfix"></div>

                                

                                 {!! Form::model($userInfo, ['method'=>'PATCH', 'action'=>['User\InfoController@update', $userInfo->id ], 'class'=>'dropzone', 'id'=>'profile-dropzone']) !!}
                                    <div class="row">

                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            {!! Form::label('name', 'नाम:') !!}
                                            <a rel="nofollow" href="http://naya.com.np" title="Nepali Social Network" class="naya_convert"></a>
                                            {!! Form::text('name', null, ['class'=>'form-control form-control margin-bottom-20']) !!}
                                        </div>

                                       <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            {!! Form::label('phone', 'फोन नम्बर:') !!}
                                            <a rel="nofollow" href="http://naya.com.np" title="Nepali Social Network" class="naya_convert"></a>
                                            {!! Form::number('phone', null, ['class'=>'form-control form-control margin-bottom-20']) !!}
                                        </div>


                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            {!! Form::label('municipility', 'नगर / गाउँ पालिका ') !!}
                                            <a rel="nofollow" href="http://naya.com.np" title="Nepali Social Network" class="naya_convert"></a>
                                            {!! Form::text('municipility', null, ['class'=>'form-control form-control margin-bottom-20']) !!}
                                        </div>


                                       <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            {!! Form::label('ward', 'वडा नम्बर ') !!}
                                            <a rel="nofollow" href="http://naya.com.np" title="Nepali Social Network" class="naya_convert"></a>
                                            {!! Form::number('ward', null, ['class'=>'form-control form-control margin-bottom-20']) !!}
                                        </div>

                                       <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            {!! Form::label('tol', 'गाउँ / टोल ') !!}
                                            <a rel="nofollow" href="http://naya.com.np" title="Nepali Social Network" class="naya_convert"></a>
                                            {!! Form::text('tol', null, ['class'=>'form-control form-control margin-bottom-20']) !!}
                                        </div>

                                       <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            {!! Form::label('address', 'ठेगाना  ') !!}
                                            <a rel="nofollow" href="http://naya.com.np" title="Nepali Social Network" class="naya_convert"></a>
                                            {!! Form::text('address', null, ['class'=>'form-control form-control margin-bottom-20']) !!}
                                        </div>
                                      </div>
                                      
                                       
                                      <div class="dz-message text-danger" data-dz-message>
                                     
                                      <span> प्रोफाइल तस्बिर परिवर्तन गर्न यँहा क्लिक गर्नुहोस </span>
                                      </div>
                                      <div class="dropzone-previews">
                                        
                                      </div>
                                      
                                    
                                    <div class="clearfix"></div>
                                    <div class="row">
                                       <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                                          {!! Form::submit('अपडेट गर्नुहोस', ['class'=>'btn btn-theme btn-block']) !!}
                                       </div>
                                    </div>
                                 {!! Form::close() !!}


                              </div>
                           </div>
                        </div>
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
         
         <script src="{{asset('dropzone/dropzone-config-3Profile.js')}}"></script>
        <script src="{{asset('js/imageCompressor11.js')}}"></script>
           

         
        
</section>

@endsection
