@extends('layouts.masterLayout.home')


@section('content')
      <script src="{{asset('js/jquery.validate.min.js')}}"></script>
      <link rel="stylesheet" href="{{asset('css/formValidation/screen.css')}}">
      <link href="{{asset('skins/minimal/minimal.css')}}" rel="stylesheet">

      <link rel="stylesheet" href="{{asset('css/publicCustom.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

     
      <style>
        #title-error, #mainCat-error, #subCategories-error, #price-error, #phone-error, #address-error, #consent-error, #ownermsg-error {
          color:red;
          font-style: none;
          font-size: 10pt;
        }
        #consentLabel{
          padding-right:15px;
        }
        #postSuccessMessage{
          color: blue;
          font-weight: bold;
          font-size: 15pt;
        }
        .row{
          margin-bottom: 25px;
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
      </style>

      


      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <section class="master-container-postAd">
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding  gray ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                     <!-- end post-padding -->
                     <div class="post-ad-form postdetails">
                        <div class="heading-panel">
                        <div id="postSuccessMessage">
                          @if(Session::has('postSuccess'))
                          <script type="text/javascript">
                            $(document).ready(function() {
                              $('#successModal').modal();
                            });
                          </script>
                          @endif
                        </div>
                           <h3 class="main-title text-left">
                              <a href="/">सुनवल नगरमा </a> आफ्नो निशुल्क बिज्ञापन राख्नुहोस
                           </h3>
                        </div>
                        <p class="text-danger">नेपालीमा टाइप गर्नको लागी लेख्ने ठाउ भन्दा माथी आउने स्लाइडरलाइ दाँया तिर नेपालीमा सेट गर्नुहोला</p>
                        
                        
                      {!! Form::open(['method'=>'POST', 'action'=>'User\AdController@store', 'class' => 'dropzone myForm', 'files'=>true, 'id'=>'real-dropzone']) !!}
                           <!-- Title  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label">शिर्षक <small>आफ्नो विज्ञापनको छोटो आकर्षक शिर्षक राख्नुहोस</small></label>
                                 <a rel="nofollow" href="http://naya.com.np" title="Nepali Social Network" class="naya_convert"></a>
                                 <input name="title" class="form-control" placeholder="यँहा क्लिक गरि छोटोमीठो शिर्षक राख्नुहोस" type="text">
                              </div>
                           </div>

                           <div class="row">
                              <!-- Category  -->
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                {!! Form::label('category_id', 'समूह (Category):') !!}
                                  {!! Form::select('category_id', [' '=>'तल मध्ये एक छनौट गर्नुहोस्'] + $categories, null, [ 'class'=>'form-control form-control margin-bottom-20 ','placeholder'=>'select one from here', 'id'=>'mainCat']) !!}
                              </div>

                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <label class="control-label">उप-समूह (Sub-category):</label>
                                <select name="subcategory_id" id="subCategories">
                                  <option value="">यँहा क्लिक गरि एउटा छनौट गर्नुहोस</option>
                                </select>
                              </div>
                           </div>


                           <!-- Ad Type  -->
                           <div class="row" id="genderDiv">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label">कसको लागि ?<small>पुरुष को लागि, महिलाको लागि कि दुबैको लागि ?</small></label>
                                 <div class="skin-minimal">
                                    <ul class="list">
                                       <li>
                                          <input tabindex="7" type="radio" id="minimal-radio-1" name="gender_id" value="1">
                                          <label  for="minimal-radio-1">पुरुष </label>
                                       </li>
                                       <li>
                                          <input tabindex="8" type="radio" id="minimal-radio-2" name="gender_id" value="2" >
                                          <label for="minimal-radio-2">महिला</label>
                                       </li>
                                       <li>
                                          <input tabindex="9" type="radio" id="minimal-radio-3" name="gender_id" value="3" checked>
                                          <label for="minimal-radio-3">दुवै</label>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- end row -->
                          
                             
                          <!-- Price  -->
                          <div class="row">
                            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                               <label class="control-label"> मूल्य (Price):<small>मूल्य रुपैयाँ मा राख्नुहोस </small></label>
                               </a>
                               <input name="price" class="form-control" placeholder="124" type="number">
                            </div>
                         </div>
                          <!-- end row -->


                          <!-- Image Upload  -->
                            <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label">फोटोहरु राख्नुहोस <small>तलको बक्समा क्लिक गरि आफ्नो बस्तु तथा सेवाको तस्बिर राख्नुहोस</small></label>
                                <div id="dropzone" class="dropzone">
                                    <!--
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                    -->
                                    <div class="dropzone-previews" id="dropzonePreview"></div>
                                    <div class="dz-message text-danger text-center" data-dz-message>
                                      <span> तस्बिरहरु राख्नकोलागि यँहा क्लिक गर्नुहोस </span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- end row -->

                  
                          <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12  col-sm-12">
                                 <label class="control-label">बिवरण <small>आफ्नो विज्ञापनको बारेमा बिस्तृत बिवरण लेख्नुहोस </small></label required>
                                 <p class="text-danger">नेपालीमा टाइप गर्नको लागि नेपाली भाषा छनौट गर्नुहोला </p>
                                 <textarea name="ownermsg" id="ownermsg" rows="12" class="form-control" required></textarea>
                                 
                              </div>
                           </div>
                           <!-- end row -->
                      
                           <!-- Ad Condition  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label">अवस्था<small>(बस्तु नयाँ हो कि पुरानो ?)</small></label>
                                 <div class="skin-minimal">
                                    <ul class="list">
                                       <li>
                                          <input name="condition" value="new" type="radio" id="new" checked>
                                          <label  for="new">नयाँ</label>
                                       </li>
                                       <li>
                                          <input name="condition" value="old" type="radio" id="used">
                                          <label for="used">पुरानो</label>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- end row -->
                           <div class="row">
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">नाम </label>
                                 <input name="user_name" class="form-control" type="text" value={{$userInfo->name}} disabled>
                              </div>
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">इमेल ठेगाना</label>
                                 <input name"user_email class="form-control" value="{{$userInfo->email}}" type="text" disabled>
                              </div>
                              <div class="col-sm-12">बिज्ञापन संगै तपाइको नाम र तस्बिर प्रकाशित हुन्छ l यदि परिवर्तन गर्नु परेमा प्रोफाइल बाट परिवर्तन गर्न सक्नुहुन्छ l</div>
                           </div>
                           <!-- end row -->
                           <div class="row">
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">फोन नम्बर<small>सम्पर्कको लागि मोबाइल नम्बर उपयुक्त </small></label>
                                 <input name="phone" class="form-control" placeholder="98XXXXXXXX" type="number">
                              </div>
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">ठेगाना<small>आफ्नो पसल व्यवसायको ठेगाना</small></label>
                                 <a rel="nofollow" href="http://naya.com.np" title="Nepali Social Network" class="naya_convert"></a>
                                 <input name="address" class="form-control" placeholder="सुनवल स्टोर्स , सन्तोषी मार्ग,  सुनवल - १५ , नवलपरासी " type="text">
                              </div>
                           </div>

                            <div class="form-group">
                              <div class="row">
                                 <div class="col-xs-12 col-sm-12">
                                    <div class="skin-minimal">
                                       <ul class="">
                                          <li>
                                             
                                             <label id="consentLabel" for="consent">म यसका <a href="{{route('postTC')}}">सर्त तथा अवस्था (Terms and Conditions) </a>  संग सहमत छु र यो प्रकाशित गर्न चाहन्छु</label>
                                             <input name="consent" value="agree" id="consent"  type="checkbox">
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 
                              </div>
                           </div>

                           
                           <button id='submitfiles' type="submit" class="btn btn-theme pull-right">प्रकाशित गर्नुहोस</button>
                        {!! Form::close() !!}

                        <!--
                        </form>
                        -->

                        @if(count($errors) > 0)

                          <div class="alert alert-danger">
                            <ul>
                              @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                              @endforeach
                            </ul>
                          </div>

                        @endif
                     </div>
                     <!-- end post-ad-form-->
                  </div>
                  <!-- end col -->
                  <!-- Right Sidebar -->
                  <div class="col-md-4 col-xs-12 col-sm-12">
                     <!-- Sidebar Widgets -->
                     <div class="blog-sidebar">
                        <!-- Categories --> 
                        <div class="widget">
                           <div class="widget-content">
                              <p class="lead text-info text-center">कृपया तलका कुराहरु मनन गर्नु होला !</p>
                              <ol>
                                 <li>तपाइको बिज्ञापन अरुले सजिलै खोज्न सकुन भन्नको लागि सहि समूह र उप समुहको छनौट गर्नुहोस l गलत समूह र उपसमुहमा राखेको बिज्ञापन अरुले नहेर्न पनि सक्छन l र खोजी गर्दा नभेटिन पनि सक्छ l
                                 </li>
                                 <li>सके सम्म आफ्नो सामान तथा सेवाको तस्बिर समाबेस गर्नुहोस l किनभने एउटा तस्बिरले हजारौ शब्दले गर्न नसकेको बयान गर्न सक्छ l</li>
                                 <li>तपाइले आफुले राखेको बिज्ञापन आफुले चाहेको समयमा सम्पादन (Edit) गर्न सक्नुहुन्छ l  त्यसको लागी प्रोफाइलमा जानुहोस र मेरो बिज्ञापन मा क्लिक गर्नुहोला l</li>
                                 <li>यदि तपाइको बस्तु अथवा सेवा बिक्री भएमा अथवा यँहा राखीरहन आवश्यक नभएमा आफुले चाहेको समयमा हटाउन सक्नुहुन्छ l पुन: आवश्यक परेमा पुन: प्रकाशित गर्न सक्नुहुन्छ l</li>
                                 <li>तपाईले बढीमा ५ ओटा तस्बिर राख्न सक्नुहुन्छ, महत्वपुर्ण तस्बिर सुरुमै राख्नुहोस l</li>
                                 <li>एउटै बिज्ञापन एकपटक भन्दा धेरै नराख्नु होला l</li>
                                 <li>वाटरमार्क भएका र कपिराइट भएका तस्बिरहरु नराख्नुहोला l</li>
                                 <li> आपत्तिजनक र अस्लिल तस्बिर तथा सामाग्रीहरु नराख्नुहोला l </li>
                                 <li>चोरी तथा गैरकानुनी सामाग्रीहरु नराख्नुहोला l</li>
                                 <li>सुर्तीजन्य तथा मदिराजन्य सामाग्रीको बिज्ञापन नराख्नुहोला l  त्यस्ता सामाग्रीहरु प्रकाशित हुनेछैनन् l</li>
                                 <li>यदि तपाइलाइ कुनै पनि बिषयमा हामीलाई सोध्नु परेमा <a href="{{route('contactUs')}}">यँहा</a> क्लिक गर्नुहोला l</li>
                                 <li>सुनवल नगर डट कममा बिज्ञापन राख्नु भएकोमा धन्यबाद !</li>
                              </ol>
                           </div>
                        </div>
                        <!-- Latest News --> 
                     </div>
                     <!-- Sidebar Widgets End -->
                  </div>
                  <!-- Middle Content Area  End --><!-- end col -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->


         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
        
      </div>
      </section>
      <!-- Main Content Area End --> 

<!-- Dropzone Preview Template -->
<style>
    @media screen and (max-width: 480px) {
      #dropzonePreview{
        text-align:center;
      }
  }
</style>
    <div id="preview-template" style="display: none;">

        <div class="dz-preview dz-file-preview">
            <div class="dz-image"><img data-dz-thumbnail=""></div>

            <div class="dz-details">
                <div class="dz-size"><span data-dz-size=""></span></div>
                <div class="dz-filename"><span data-dz-name=""></span></div>
            </div>
            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
            <div class="dz-error-message"><span data-dz-errormessage=""></span></div>

            <div class="dz-success-mark">
                <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                    <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                    <title>Check</title>
                    <desc>Created with Sketch.</desc>
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                        <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
                    </g>
                </svg>
            </div>

            <div class="dz-error-mark">
                <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                    <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                    <title>error</title>
                    <desc>Created with Sketch.</desc>
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                        <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                            <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
                        </g>
                    </g>
                </svg>
            </div>

        </div>
    </div>
    <!-- End Dropzone Preview Template -->


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
    <section>
      <div id="successModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h3 class="modal-title" id="successModalTitle" >बधाई छ</h3>
               </div>
               <div class="modal-body">
                  <h4>तपाइको सामाग्री हामीलाई प्राप्त भयो | केहि समयपछि नै प्रकाशित गरिनेछ |</h4>
                  <h4>यो वेबसाइटमा बिज्ञापन राख्नु भएकोमा धन्यबाद !</h4>
                  <div class="clearfix"></div>

                  <div class="col-md-12  col-sm-12 margin-bottom-20 margin-top-20">
                    <button id="nextAdBtn" href="/user/post/create" class="btn btn-info btn-block">अर्को बिज्ञापन राख्नको लागी यँहा क्लिक गर्नुहोस </button>
                  </div>

                  <div class="col-md-12  col-sm-12 margin-bottom-20 margin-top-20">
                    <button id="closeSuccessModalBtn" href="/" data-dismiss="modal" class="btn btn-theme btn-block">बन्द गर्नुहोस </button>
                  </div>
               </div>
            </div>
         </div>
         
      </div>
    </section>

    <section>
      <div id="errorModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h3 class="modal-title" id="successModalTitle">गल्ती भयो कि ?</h3>
               </div>
               <div class="modal-body">
                  <h4>तपाइले भरेको बिवरणमा केहि गल्तिहरु छन् | कृपया सबै बिवरण भएर पुन: प्रयास गर्नुहोस |</h4>
                  
                  <div class="clearfix"></div>

                  <div class="col-md-12  col-sm-12 margin-bottom-20 margin-top-20">
                    <button id="nextAdBtn" href="/user/post/create" class="btn btn-info btn-block">अर्को बिज्ञापन राख्नको लागी यँहा क्लिक गर्नुहोस </button>
                  </div>

                  <div class="col-md-12  col-sm-12 margin-bottom-20 margin-top-20">
                    <button id="closeSuccessModalBtn" href="/" data-dismiss="modal" class="btn btn-theme btn-block">बन्द गर्नुहोस </button>
                  </div>
               </div>
            </div>
         </div>
         
      </div>
    </section>

    <section>
      <div id="maxFileErrorModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h3 class="modal-title" id="successModalTitle">तपाइको फोटोहरु ५ ओटा भन्दा धेरै भयो ?</h3>
               </div>
               <div class="modal-body">
                  <h4>कृपया ५ ओटा फोटोहरु मात्रै राख्नुहोला</h4>
                  
                  <div class="clearfix"></div>


                  <div class="col-md-12  col-sm-12 margin-bottom-20 margin-top-20">
                    <button id="closeSuccessModalBtn" href="/" data-dismiss="modal" class="btn btn-theme btn-block">मैले बुझे  </button>
                  </div>
               </div>
            </div>
         </div>
         
      </div>
    </section>
    




      <!-- Post Ad Sticky -->
      <a href="#" class="sticky-post-button hidden-xs">
         <span class="sell-icons">
         <i class="flaticon-transport-9"></i>
         </span>
         <h4>SELL</h4>
      </a>
      <!-- Back To Top -->
      <a href="{{asset('#0')}}" class="cd-top">Top</a>
      <!-- Back To Top -->
      <!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
     
      <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
    <script type="text/javascript">
   
      

</script>
      <script>
        $(document).ready(function(){
            $("#submitfiles").on("click", function(){
              if($(".myForm").valid()){
                $('#waitModal').modal('show');
              }
            });
          $("#closeSuccessModalBtn").on("click", function(){
              window.location.href = "/";
          });
          $("#nextAdBtn").on("click", function(){
              window.location.href = "/user/post/create";
          });
          
            var editor_config = {
              selector:'textarea',
              plugins: [
                'pramukhime', 'textcolor', 'advlist', 'lists'
              ],
              image_advtab: false,
              toolbar1: 'pramukhime pramukhimesettings pramukhimeresetsettings pramukhimetogglelanguage pramukhimehelp',
              toolbar2: 'forecolor backcolor bullist numlist outdent',

            }
          
            tinymce.init(editor_config);
            
            $.validator.setDefaults({
               ignore: ''
            });
            
       
          $("#real-dropzone").removeClass('dropzone');
          $("#dropzone").addClass('dz-clickable');

          $("#genderDiv").hide();
          $("select[name='subC']").addClass("form-control form-control margin-bottom-20");
          $('#mainCat').on('change', function() {
            $("#subCategories").find('option').not(':first').remove();
            var catId = this.value;
            var url = "getSubCat";
            $.get(url + '/' + catId, function(data){
              var hasGender = data['hasG'];   
              if(hasGender == 1){
                $('#genderDiv').show(500);
              }
              else{
                $('#genderDiv').hide(500);
              }
              var data = data['subC'];
              console.log(data);
              for(i = 0; i < data.length; i ++) {
                $("select[name='subcategory_id']").append("<option value='"+data[i]["id"]+"'>"+data[i]["title"]+"</option>");

              }

              
          });
          });
          
         $("#mainCat").before("<br />");


          $(".myForm").validate({
            rules: {
              title: {
                required:true,
                minlength: 5,
                maxlength: 150
              },
              category_id : "required",
              subcategory_id : "required",
              price : "required",
              
              ownermsg : {
                required: true,
                minlength: 20,
                maxlength: 15000
              },
              
              phone: {
                required:true,
                minlength: 9,
                maxlength:13
              },
              address:{
                required: true,
                minlength: 6,
                maxlength: 400
              },
              consent: "required"
            },
            messages: {
              title: {
                required: "कृपया एउटा शिर्षक लेख्नुहोस ",
                minlength: "कृपया ५ अक्षर भन्दा बढीको शिर्षक राख्नुहोस ",
                maxlength: "कृपया १५० अक्षर भन्दा कमको शिर्षक राख्नुहोस "
              },
              category_id : "एउटा समूह (Category ) छनौट गर्नुहोस ",
              subcategory_id : "कृपया एउटा उप-समूह (Sub -category ) छनौट गर्नुहोस ",
              price: "मूल्य राख्नुहोस",
              
              ownermsg:{
                required: "कृपया बिवरण लेख्नुहोस ",
                minlength: "कृपया २० अक्षर भन्दा धेरै लेख्नुहोस ",
                maxlength: "बिवरण धेरै भयो | १५००० अक्षर भन्दा कम लेख्नुहोस |"
              },
              
              phone:{
                required: "कृपया फोन नम्बर राख्नुहोस ",
                minlength: "फोन नम्बर ९ अंक भन्दा धेरै राख्नुहोस ",
                maxlength: "फोन नम्बर १३ अंक भन्दा कम राख्नुहोस  "
              },
              address: {
                required: "कृपया ठेगाना राख्नुहोस ",
                minlength: "ठेगाना निकै छोटो भयो , सही ठेगाना लेख्नुहोस ",
                maxlength: "ठेगाना निकै लामो भयो , सही ठेगाना लेख्नुहोस "
              },
              consent: "कृपया तपाइँ हाम्रा सर्त तथा अवस्था (Terms  and  Conditions ) संग सहमत हुनुहोस "

            }
          });

        });
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
      <script src="{{asset('dropzone/dropzone-config-3.js')}}"></script>
      <script src="{{asset('js/imageCompressor.js')}}"></script>
     
   
@endsection
