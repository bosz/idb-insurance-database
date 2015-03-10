<footer>
	This is the footer<br>
	some Links here too<br>
	End of footer<br>
</footer>
 	<script src="{{ asset('malihu/jquery.mCustomScrollbar.concat.min.js') }}"></script>
  	<script src="{{ asset('colorbox/jquery.colorbox-min.js') }}"></script>

  	<link rel="{{ asset('stylesheet" href="malihu/jquery.mCustomScrollbar.css') }}" />
    <link rel="{{ asset('stylesheet" href="colorbox/colorbox.css') }}" />


  	<script>
	(function($){
		$(window).load(function(){
			
			$(".content").mCustomScrollbar({
			    scrollbarPosition: "inside",
				autoHideScrollbar:true,
				scrollInertia: 1500,
				theme: "dark"
			
			});
			
			$(".inline").colorbox({
				inline:true, 
				width:"60%",
				maxHeight:"90%"
			});
			
		});
	})(jQuery);
	</script>