<div class="" >
  <ul class="nav">            
<!--     <h2>Shortcuts</h2>
 -->    
    <h3>Car Management</h3>
    <span>
         <a href="{{URL::route('homeCar')}}"> <li>Add new Car </li> </a> 

        <a href="{{URL::route('homeCar')}}"> <li>View List of Cars</li> </a> 

        <a href="{{URL::route('homeCar')}}"> <li>Modify Vehicle info</li> </a> 
    </span>
    <h3>Driver Management</h3>
    <span>
         <a href="{{URL::route('homeOwners')}}"> <li>Add Driver Info </li> </a> 

        <a href="{{URL::route('homeOwners')}}"> <li>View List of Drivers</li> </a> 

        <a href="{{URL::route('homeOwners')}}"> <li>Modify Driver Info</li> </a> 
    </span>
    <h3>Accidents Management</h3>
    <span>
        <a href="{{URL::route('homeAccidents')}}"> <li>New Accident</li> </a> 

        <a href="{{URL::route('homeAccidents')}}"> <li>List All Accidents</li> </a> 

        <a href="{{URL::route('homeAccidents')}}"> <li>Modify Accident Info</li> </a> 
    </span>
    <h3>Report Generation </h3>
    <span>
        <a href="{{URL::route('homeReports')}}"> <li>Cars</li> </a> 
        
        <a href="{{URL::route('homeReports')}}"> <li>Drivers</li> </a> 

        <a href="{{URL::route('homeReports')}}"> <li>Accidents</li> </a>      
    </span>      
  </ul>
</div>