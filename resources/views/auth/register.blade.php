@extends('layouts.masterLayout.home')

@section('content')

<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/formValidation/screen.css')}}">
<style>
    .mainContainer{
        margin-top:157px;
    }
    #name-error, #email-error, #password-error, #password-confirm-error, #consent-error{
      color:red;
      font-style: none;
      font-size: 10pt;
    }
    #consentLabel{
      padding-right:15px;
    }
    #waitBtn{
        font-size: 25pt;
    }
    #waitText{
      margin-left:20px;
      font-size: 25pt;
    }
    #waitModal{
      top:40%;
    }
    @media screen and (min-width: 768px) {
      #waitModal .modal-dialog  {width:200px;}
    }
    #successModal{
      top:30%;
    }
    #successModalTitle{
      text-align: center;
      color:green;
      font-size: 20pt;
    }
    .modal-body{
      text-align:center;
    }
    .main-container{
      margin-top:157px;
    }
</style>
  <div class="main-content-area clearfix main-container">
     <section class="section-padding error-page pattern-bg ">
        <div class="container">
           <div class="row">
              <div class="col-md-5 col-md-push-7 col-sm-12 col-xs-12">
                 <div class="form-grid">
                    <form id="userRegistrationForm" class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <p class="text-center text-success"><strong>एकाउण्ट खोल्नको लागी कृपया तलको फारम भर्नुहोस्</strong></p>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">नाम(Name)</label>
                            <a rel="nofollow" href="http://naya.com.np" title="Nepali Social Network" class="naya_convert"></a>
                            <input placeholder="आफ्नो नाम राख्नुहोस" class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">इमेल(Email)</label>
                            <input placeholder="इमेल एड्रेस राख्नुहोस" class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">पासवर्ड(Password)</label>
                            <input placeholder="पासवर्ड राख्नुहोस" class="form-control" type="password" id="password" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>
                                        तपाइको दुइटा पासवर्ड एकापसमा मिलेन l
                                    </strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="password-confirm">पासवर्ड कन्फर्म(Confirm Password)</label>
                            <input placeholder="पासवर्ड कन्फर्म गर्नुहोस" class="form-control" type="password" id="password-confirm" name="password_confirmation" required>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="skin-minimal">
                                        <ul class="">
                                            <li>
                                                
                                                <label id="consentLabel" for="minimal-checkbox-1"><a href="#">सर्त तथा अवस्था</a> संग सहमत छु</label>
                                                <input name="consent" type="checkbox" id="minimal-checkbox-1" value="agree" value="{{ old('consent') }}" required>
                                                @if ($errors->has('consent'))
                                                    <span class="help-block text-danger">
                                                        <strong>
                                                            कृपया यसका सर्त तथा अवस्थासंग सहमत हुनुहोस l
                                                        </strong>
                                                    </span>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       <button id="registerUser" type="submit" class="btn btn-theme btn-lg btn-block">रजिस्टर गर्नुहोस(Register)</button>
                    </form>
                 </div>
                 <!-- Form -->
              </div>
             
              <div class="col-md-7  col-md-pull-5  col-sm-12 col-xs-12">
                 <div class="heading-panel">
                    <h3 class="main-title text-left">
                       एकाउण्ट खोल्नुहोस  
                    </h3>
                    <h2>Create Your Account</h2>
                 </div>
                 <div class="content-info">
                    <div class="features">
                       <div class="features-icons">
                          <img src="images/icons/fb.png" alt="img">
                       </div>
                       <div class="features-text">
                          <h3>फेसबुक लगइन (Facebook login)</h3>
                          <p>
                             के तपाइँ संग फेसबुक एकाउण्ट छ ? छ भने हाम्रो फेसबुक लगइन बाट एकै क्लिकमा लगइन गर्न सक्नुहुन्छ l बिना कुनै झन्झट l
                          </p>
                       </div>
                    </div>

                    <div class="features">
                       <div class="features-icons">
                          <img src="images/icons/profile.png" alt="img">
                       </div>
                       <div class="features-text">
                          <h3>मेरो प्रोफाइल (My Profile)</h3>
                          <p>
                             मेरो प्रोफाइल मा तपाइले आफ्नो बिवरण राख्न सक्नुहुन्छ l अनि जुनसुकै बेला पनि आफ्नो ठेगाना, नाम अनि प्रोफाइल तस्बिर परिवर्तन गर्न सक्नुहुन्छ 
                          </p>
                       </div>
                    </div>
                    
                    <div class="features">
                       <div class="features-icons">
                          <img src="images/icons/control.png" alt="img">
                       </div>
                       <div class="features-text">
                          <h3>पूर्ण नियन्त्रण (Full Control)</h3>
                          <p>
                             तपाइले राखेको बिज्ञापन तपाइको पूर्ण नियन्त्रणमा हुन्छ l जस्तै तपाइले आफुले चाहेको समयमा बिज्ञापनमा थपघट (Edit) गर्न सक्नुहुन्छ, हटाउन सक्नुहुन्छ, पुन: प्रकाशित गर्न पनि सक्नुहुन्छ l  तपाइको बिज्ञापन तपाइको नियन्त्रण l
                          </p>
                       </div>
                    </div>

                    <div class="features">
                       <div class="features-icons">
                          <img src="images/icons/message.png" alt="img">
                       </div>
                       <div class="features-text">
                          <h3>मेसेज (Message)</h3>
                          <p>
                             तपाइको विज्ञापनको बिषयमा यदि कसैले कुनै प्रश्न अथवा मेसेज पठाएको छ भने हेर्न र प्रतिउत्तर (reply) गर्न सक्नुहुन्छ l
                          </p>
                       </div>
                    </div>
                    <span class="arrowsign hidden-sm hidden-xs"><img src="images/arrow.png" alt=""></span>
                 </div>
              </div>
              <!-- Middle Content Area  End -->
           </div>
           <!-- Row End -->
        </div>
        <!-- Main Container End -->
     </section>
     <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
     <section>
        <div id="waitModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-body">
                <i id="waitBtn" class="fa fa-spinner fa-spin"></i>
                <span id="waitText">पर्खनुहोस</span>
              </div>
            </div>

          </div>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            $("#registerUser").on("click", function(){
              if($("#userRegistrationForm").valid()){
                $('#waitModal').modal('show');
              }
            });
            $("#userRegistrationForm").validate({
                rules: {
                  name: {
                    required:true,
                    minlength: 5,
                    maxlength: 150
                  },
                  email: {
                    required:true
                  },
                  password:{
                    required: true,
                    minlength: 6,
                    maxlength: 25
                  },
                  password_confirmation:{
                    required: true,
                    equalTo: "#password"
                  },
                  consent: "required"
                },
                messages: {
                  name: {
                    required: "कृपया आफ्नो नाम राख्नुहोस",
                    minlength: "कृपया ५ अक्षर भन्दा बढीको नाम राख्नुहोस ",
                    maxlength: "कृपया १५० अक्षर भन्दा कमको नाम राख्नुहोस "
                  },
                  email:{
                    required: "कृपया इमेल एड्रेस राख्नुहोस"
                  },
                  password: {
                    required: "कृपया पासवर्ड राख्नुहोस",
                    minlength: "कम्तिमा पनि ६ अक्षरको पासवर्ड राख्नुहोस",
                    maxlength: "पासवर्ड बढीमा २५ अंकको हुनुपर्छ"
                  },
                  password_confirmation: {
                    required: "कृपया पासवर्ड कन्फर्म गर्नुहोस",
                    equalTo : "यो पासवर्ड माथीको पासवर्ड संग मिलेन"
                  },
                  consent: "कृपया तपाइँ हाम्रा सर्त तथा अवस्था (Terms  and  Conditions ) संग सहमत हुनुहोस "

                }
              });
        });
    </script>

@endsection
