@extends('layouts.masterLayout.home')


@section('content')
<div class="content-section">
<style>
  .facebookLoginLetter{
    color:white;
    font-weight:bold;
    margin-left:10px;
  }
</style>
      <div class="main-content-area clearfix">
         <section class="section-padding error-page pattern-bg ">
            <div class="container">
               <div class="row">
                  <div class="col-md-5 col-md-push-7 col-sm-6 col-xs-12">
                     <div class="form-grid">
                        <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                           
                           <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Email (इमेल एड्रेस)</label>

                            <div>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>माफ गर्नुहोला तपाइको इमेल एड्रेस अथवा पासवर्ड मिलेन</strong>
                                    </span>
                                @endif
                            </div>
                            </div>


                           

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Password (पासवर्ड)</label>

                                <div>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                           <div class="form-group">
                              <div class="row">
                                 <div class="col-xs-12">
                                    <div class="skin-minimal">
                                       <ul class="list">
                                          <li>
                                             <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                             <label for="minimal-checkbox-1">मलाइ सम्झना राख्नुहोस </label>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>

                          <button type="submit" class="btn btn-theme btn-lg btn-block">लगइन गर्नुहोस</button>
                          
                          <a class="btn btn-primary btn-lg btn-block" href="redirect"> <i class="fa fa-facebook-official fa-2x" aria-hidden="true" ></i><span class="facebookLoginLetter">फेसबुक लगइन</span></a>
                           
                           <button class="btn btn-theme btn-sm btn-block">
                                <a class="btn btn-link facebookLoginLetter" href="{{ route('password.request') }}">
                                    पासवर्ड भुले / बिर्से 
                                </a>
                           </button> 
                        </form>
                     </div>
                     <!-- Form -->
                  </div>
                  <div class="col-md-7  col-md-pull-5  col-xs-12 col-sm-6">
                     <div class="heading-panel">
                        <h3 class="main-title text-left">
                           आफ्नो एकाउण्टमा लगइन गर्नुहोस    
                        </h3>
                     </div>
                     <div class="content-info">
                        <div class="features">
                           <div class="features-icons">
                              <img src="images/icons/fb.png" alt="img">
                           </div>
                           <div class="features-text">
                              <h3>फेसबुक लगइन </h3>
                              <p>
                                 के तपाइँ संग फेसबुक एकाउण्ट छ ? छ भने हाम्रो फेसबुक लगइन बाट एकै क्लिकमा लगइन गर्न सक्नुहुन्छ l  बिना कुनै झन्झट l
                              </p>
                           </div>
                        </div>
                        <div class="features">
                           <div class="features-icons">
                              <img src="images/icons/profile.png" alt="img">
                           </div>
                           <div class="features-text">
                              <h3>मेरो प्रोफाइल</h3>
                              <p>
                                 मेरो प्रोफाइल मा तपाइले आफ्नो बिवरण राख्न सक्नुहुन्छ l अनि जुनसुकै बेला पनि आफ्नो ठेगाना, नाम अनि प्रोफाइल तस्बिर परिवर्तन गर्न सक्नुहुन्छ l
                              </p>
                           </div>
                        </div>
                        <span class="arrowsign hidden-sm hidden-xs"><img src="images/arrow.png" alt="" ></span>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         </div>
         </div>
@stop
