        <!-- Lazy load Bootstrap -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <script>

        window.onscroll = function (event) {
        	if (window.pageYOffset < 98) {
        		$("#topNavBar").css("top", "-"+(window.pageYOffset)+"px").css("opacity", 1-(window.pageYOffset/98));
        	}
        	if (window.pageYOffset > 98) {
		  	$("#topNavBar").hide();
		  	$("#bottomNavBar").addClass("navbar-fixed-top");
		  } else {
		  	$("#topNavBar").show();
		  	$("#bottomNavBar").removeClass("navbar-fixed-top");
		  }
		}

        </script>
    </body>
</html>