
      <div class="transparent-header">
         <div class="header-top">
            <div class="container">
               <div class="row">
                  <div class="header-top-left col-md-8 col-sm-6 col-xs-12 hidden-xs">
                     <ul class="listnone">
                        <li><a href="{{route('aboutUs')}}"><i class="fa fa-heart-o" aria-hidden="true"></i> हाम्रो बारे </a></li>
                        <li><a href="{{route('termsConditions')}}"><i class="fa fa-folder-open-o" aria-hidden="true"></i> सर्त तथा अवस्था (Terms & Conditions)</a></li>
                        
                     </ul>
                  </div>
                  <div class="header-right col-md-4 col-sm-6 col-xs-12 ">
                     <div class="pull-right">
                        <ul class="listnone">
                        @if(Auth::guest())
                           <li><a href="{{route('login')}}"><i class="fa fa-sign-in"></i> लगइन</a></li>
                           <li><a href="{{route('register')}}"><i class="fa fa-unlock" aria-hidden="true"></i> रजिस्टर</a></li>
                           @else
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-profile-male" aria-hidden="true"></i> <span class="bigLetter">{{ Auth::user()->name }}</span> <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                 
                                 <li><a href="/home">मेरो प्रोफाइल</a></li>
                                 <li><a href="{{route('myAds')}}">मेरो बिज्ञापन / सामग्री</a></li>
                                 <li><a href="{{route('removedAds', Auth::user()->id)}}">हटाएको</a></li>
                                 <li><a href="{{route('myMessage')}}">मेसेज</a></li>
                                 <li class="bg-danger">
                                    <a href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      लग आउट 
                                    </a>

                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                         {{ csrf_field() }}
                                     </form>
                                 </li>
                              </ul>
                           </li>
                           @endif
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>