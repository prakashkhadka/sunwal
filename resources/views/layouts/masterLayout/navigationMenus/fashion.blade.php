<li>
   <a href="javascript:void(0)"><span class="bigLetter">फेशन</span> <i class="fa fa-angle-down fa-indicator"></i></a>
   <!-- drop down full width -->
   <div class="drop-down grid-col-12">
      <!--grid row-->
      <div class="grid-row">
         <!--grid column 2-->
         @foreach($catg[0]->categories as $makeupCat)
               <div class="grid-col-2">
                  <ul>
                     <li><a href="{{route('sublisting', [$catg[0]->id, $makeupCat->id])}}">{{$makeupCat->title}}</a></li>
                  </ul>
               </div>
         @endforeach
         
      </div>
   </div>
</li>