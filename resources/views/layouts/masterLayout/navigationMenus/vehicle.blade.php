<li>
   <a href="javascript:void(0)"><span class="bigLetter">सवारी साधन</span><i class="fa fa-angle-down fa-indicator"></i></a>
   <!-- drop down multilevel  -->
   <ul class="drop-down-multilevel">
      @foreach($catg[8]->categories as $makeupCat)
         <div class="grid-col-2">
            <ul>
               <li>
                  <a href="{{route('sublisting', [$catg[8]->id, $makeupCat->id])}}">{{$makeupCat->title}}</a>
               </li>
            </ul>
         </div>
      @endforeach
      </li>
   </ul>
</li>