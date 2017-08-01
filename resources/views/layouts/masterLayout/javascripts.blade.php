  
      <script src="{{asset('js/modernizr.js')}}"></script>
      <script>
         setTimeout(function() {
             $('body').addClass('loaded');
         }, 0);


      </script>

      <script>
         (function(d, s, id) {
           var js, fjs = d.getElementsByTagName(s)[0];
           if (d.getElementById(id)) return;
           js = d.createElement(s); js.id = id;
           js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9&appId=1249172065182122";
           fjs.parentNode.insertBefore(js, fjs);
         }
         (document, 'script', 'facebook-jssdk'));
      </script>


     
   
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
     
      <script src="{{asset('js/easing.js')}}"></script>
      
      <script src="{{asset('js/forest-megamenu.js')}}"></script>
   
      <script src="{{asset('js/jquery.appear.min.js')}}"></script>
      
      <script src="{{asset('js/jquery.countTo.js')}}"></script>
      
      <script src="{{asset('js/jquery.smoothscroll.js')}}"></script>
     
      <script src="{{asset('js/select2.min.js')}}"></script>
      
      <script src="{{asset('js/nouislider.all.min.js')}}"></script>
      
      <script src="{{asset('js/carousel.min.js')}}"></script>
      <script src="{{asset('js/slide.js')}}"></script>
      
      <script src="{{asset('js/imagesloaded.js')}}"></script>
      <script src="{{asset('js/isotope.min.js')}}"></script>
      
      <script src="{{asset('js/icheck.min.js')}}"></script>
     
      <script src="{{asset('js/jquery-migrate.min.js')}}"></script>
      
      <script src="{{asset('js/theia-sticky-sidebar.js')}}"></script>
      
      <script src="{{asset('js/color-switcher.js')}}"></script>
   
      <script src="{{asset('js/custom.js')}}"></script>

      <script src="{{asset('js/nepaliFont.js')}}"></script>
      
      <script type="text/javascript">
         (function($) {
            "use strict";
            $(".minimal-category").slice(0, 12).show();
            $("#loadMore").on('click', function (e) {
               e.preventDefault();
               $(".minimal-category:hidden").slice(0, 4).slideDown();
               if ($(".minimal-category:hidden").length == 0) {
                  $("#load").fadeOut('slow');
               }
               $('html,body').animate({
                  scrollTop: $(this).offset().top
               }, 500);
            });
         })(jQuery);
      </script>
      
     