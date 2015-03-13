<!-- i know this is not correct but i don't have time and don't really know how to make 
a particular variable return with all the redirects. So i sorted to using this approach 
for the time being. I will research and try to fix this bad programming. Applolgies -->
<?php
  $carsList=Cars::orderBy('created_at', 'desc')->get();

  $accidentNumber = DB::table('accidents')->count();
  $participantNumber = Participants::all()->count();
  $totalAccidentCost = DB::table('participants')->sum('damage_amount');

  $mostCostlyAccident = DB::table('participants')
                    ->groupBy('reportNumber')->select('reportNumber')
                    ->sum('damage_amount');

  $users = DB::table('participants')
                    ->having('damage_amount', '>=', $mostCostlyAccident)
                    ->get();

?>
<div id="content_blue">
<div class="content_blue_container_box">
  <h4> Most Costly Accident </h4>
  <p> The most costly accident had a damage of {{ $mostCostlyAccident }} frs
  </p>
  <div class="readmore">
    <a href="{{URL::route('homeAccidents')}}"> Read more </a> 
  </div><!--close readmore-->
</div><!--close content_blue_container_box-->
<div class="content_blue_container_box">
 <h4>Total Accumulated Casualty</h4>
  <p> Idb has recorded <strong> {{ $accidentNumber }}</strong> 
    accidents with <strong> {{ $participantNumber }}</strong> 
    participating vehicles costing <strong>{{ $totalAccidentCost }}frs</strong> </p>
  <div class="readmore">
    <a href="#">Read more</a>
  </div><!--close readmore-->
</div><!--close content_blue_container_box-->
<div class="content_blue_container_boxl">
  <h4><strong>The Idb Team</strong></h4>
  <p> Nkweteyim Daisy, Takoungang Dieudonne, Theophilus Waba, Fongoh Martin</p>
  <div class="readmore">
    <a href="http://github.com/bosz/idb-insurance-database">Read more</a>
  </div><!--close readmore-->	  
</div><!--close content_blue_container_box1-->      
<br style="clear:both"/>
</div><!--close content_blue--> 	
