<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
      <meta name="description" content="">
      <meta name="author" content="ScriptsBundle">
      <title>सुनवल नगर</title>
      <script src="{{asset('js/jquery.min.js')}}"></script>
      
   </head>
   <body>
      <div class="colored-header">
      <!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
      <!--
      <div id="loader-wrapper">
         <div id="loader"></div>
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
      </div>
      -->
      
    

      @include('layouts.masterLayout.styles')

      @include('layouts.masterLayout.colorSwitcher')

      @include('layouts.masterLayout.topBar')
      
      @include('layouts.masterLayout.topNavigation')
   
      
      @yield('content')
      
      
      @include('layouts.masterLayout.footer')

      @include('layouts.masterLayout.sticky')

     @include('layouts.masterLayout.javascripts')
      </div>

   </body>
</html>