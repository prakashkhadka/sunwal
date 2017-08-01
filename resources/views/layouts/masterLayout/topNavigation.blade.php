
<nav id="menu-1" class="mega-menu">
               <!-- menu list items container -->
               <section class="menu-list-items">
                  <div class="container">
                     <div class="row">
                        <div class="col-lg-12 col-md-12">
                           <!-- menu logo -->
                           <ul class="menu-logo">
                              <li>
                                 <a href="{{url('/')}}"><img height="80" src="{{asset('images/sunwalLogo.png')}}" alt="logo"> </a>
                              </li>
                           </ul>
                           <!-- menu links -->
                           <ul class="menu-links">
                              <!-- active class -->
                              <li>
                                 <a href="{{url('/')}}"> <span class="bigLetter">गृह पृष्‍ठ </span></a>
                              </li>
                              
                              

                              @include('layouts.masterLayout.navigationMenus.fashion')
                              
                              @include('layouts.masterLayout.navigationMenus.makeup')

                              @include('layouts.masterLayout.navigationMenus.agriculture')

                              @include('layouts.masterLayout.navigationMenus.realestate')

                              @include('layouts.masterLayout.navigationMenus.vehicle')
                              
                              @include('layouts.masterLayout.navigationMenus.shops')
                              
                              
                              <li><a href="{{route('contactUs')}}"><span class="bigLetter">संपर्क</span> </a></li>

                           </ul>
                           <ul class="menu-search-bar">
                              <li>
                                 <a href="{{route('user.post.create')}}" class="btn btn-light"><i class="fa fa-plus" aria-hidden="true"></i> <strong>निशुल्क बिज्ञापन राख्नुहोस</strong></a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </section>
            </nav>
      </div>
      <!-- =-=-=-=-=-=-= Centered Navigation Menu End  =-=-=-=-=-=-= -->