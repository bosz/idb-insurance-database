<meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.easing.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.nivo.slider.pack.js') }}"></script>
  <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
  </script> 

  <!-- from data table -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/shCore.css') }}">
 <!-- <link rel="stylesheet" type="text/css" href="css/demo.css"> -->
  <style type="text/css" class="init">

  </style>
  <script type="text/javascript" language="javascript" src="{{ asset('js/jquery.dataTables.js') }}"></script>
  <script type="text/javascript" language="javascript" src="{{ asset('js/shCore.js') }}"></script>
  <!--<script type="text/javascript" language="javascript" src="js/demo.js"></script> -->
  <script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
  $('#example').dataTable( {
    "paging":   false,
    "ordering": false,
    "info":     false
  } );
} );

  </script>