<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title> Idb Accident Management :: Home</title>
  @include('general/head')
</head>

<body>
  <div id="main">

  <div id="menubar">
    <div id="welcome">
      <h1><a href="#">Welcome To IDb</a></h1>
    </div><!--close welcome-->
      <div id="menu_items">
      <ul id="menu">
        <li><a href="{{URL::route('welcome')}}">Home</a></li>
        <li><a href="{{URL::route('homeCar')}}">Cars</a></li>
        <li><a href="{{URL::route('homeOwners')}}">Owners</a></li>
        <li class="current" ><a href="{{URL::route('homeAccidents')}}">Accidents</a></li>
        <li><a href="{{URL::route('homeReports')}}">Reports</a></li>
        <li><a href="{{URL::route('homeAccounts')}}">Accounts</a></li>
      </ul>
      </div><!--close menu-->
    </div><!--close menubar-->  
    
  <div id="site_content">   

    <div id="banner_image">
      <div id="slider-wrapper">        
          <div id="slider" class="nivoSlider">
            <img src="images/home_1.jpg" alt="" />
            <img src="images/home_2.jpg" alt="" />
            <img src="images/home_3.jpg" alt="" />
            <img src="images/home_4.jpg" alt="" />
      </div><!--close slider-->
    </div><!--close slider_wrapper-->
    </div><!--close banner_image--> 

   
    <div id="content">
        <div class="content_item" style="width:900px"><br>
       <center><h1 class="down_title">Accident Management :: Home </h1> 
       <em>In this section of idb, you get to input information about cars you insure</em></center>
        
        <p style="display:inline;" class="returned-with"> 
            
          @if(Session::has('success'))<ul class="list-group" style="color: green;"><li class="list-group-item list-group-success">{{ Session::get('success'); }} </li></ul>@endif
            
          @if(Session::has('error'))<ul class="list-group" style="color: red;"><li class="list-group-item list-group-danger">{{ Session::get('error'); }} </li></ul>@endif
            
          @if(Session::has('info'))<ul class="list-group" style="color: blue;"><li class="list-group-item list-group-info">{{ Session::get('info'); }} </li></ul>@endif

          @if ($errors->any())<ul class="lastError">{{ implode('', $errors->all('<li class="error">:message</li>')) }}</ul>@endif
          
        </p><br>
        <div class="sub_operations"><a href="{{URL::route('recordAccidentDisplay')}}" class="inline" > Record New Accident </a> 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{URL::route('addAccidentParticipantDisplay')}}" class="inline" > Add New Participant </a></div>
       <div>
          
          </p><br>

          @if ($accidents->count())
            <table class="table table-striped table table-hover reportTable">
                <thead>
                <tr>
                    <th>Report No</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Regno || driver Id || damage cost</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($accidents as $acc => $accident)
                <tr>
                  <td>{{ $accident->reportNumber }}</td>
                  <td>{{ $accident->location }}</td>
                  <td>{{ $accident->date }}</td>
                  
                  <td>
                    @foreach ($participants as $part => $participant)
                      @if($accident->reportNumber == $participant->reportNumber)
                        {{ $participant->regno }} || 
                        {{ $participant->driver_id }} || 
                        {{ $participant->damage_amount }}frs &nbsp;&nbsp; 
                        <!-- code to edit the amount for a particular car and driver and involved in a particular accident -->
                           <?php echo "<a href='".
                            url("accidents/edit/participants/{$accident->reportNumber}/{$participant->regno}")."'><em>Edit
                          </em></a>"; ?>
                        <br>
                      @endif
                    @endforeach
                </td>
                   
                  <td>
                    {{ Form::open(array('route' => array('editAccident', $accident->reportNumber))) }}
                    
                      {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                    
                    {{ Form::close() }}

                  <td>
                    {{ Form::open(array('route' => array('deleteAccident', $accident->reportNumber))) }}
                        
                      {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
<!--                       <input type="submit" name="submit" value="submit  33" class="btn btn-danger inline" onclick="return validateInputs()">
 -->
                    {{ Form::close() }}
                  </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <strong>No accidents for far</strong>
            @endif

        </div>            
    </div><!--close content_item-->
      </div><!--close content-->   

  @include('general/footer')  

  </div><!--close site_content--> 
  
  </div><!--close main-->
  
  <div id="footer">
    Powered by <em><a href="">_ _ 3 c h 3 1 0 n _ _</a></em>
  </div><!--close footer-->  
  
</body>
</html>
