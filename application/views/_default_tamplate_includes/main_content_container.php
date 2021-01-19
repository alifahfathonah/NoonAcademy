<div id="content_container">

             <div class="first_column">
               <?php require_once("application/views/contents/main_page_first_column_content.php"); ?>
             </div><!-- end of first_column -->
             <div class="second_column">
                  <div class="tab_content" id="tab1">
                  	<?php require_once("application/views/contents/tab1_content.php"); ?>
                  </div><!-- end of table_content -->
                  
                  <div class="tab_content" id="tab2">
                  	<?php require_once("application/views/contents/tab2_content.php"); ?>
                  </div><!-- end of table_content -->
                  
                  <div class="tab_content" id="tab3">
                  	<?php require_once("application/views/contents/tab3_content.php"); ?>
                  </div><!-- end of table_content -->
             </div><!-- end of second_column -->
             
      </div><!-- end of content_container -->

<script type="text/javascript">
// This is the jQuery Script that will be used to control the Tabes in the page.

$(document).ready(function() {		
      	$("#tab2").show().addClass('active'); // Show Tab2 by default		
});

$(".zorkif_slider_menu_bar a").click(function(event) {
  	
	event.preventDefault(); // Prevent Default Hyperlink Click
	  
	if($(this).attr('id')=="overview") {
		 $("#tab3").hide(); 
		 $("#tab2").hide(); 
		 $("#tab1").show();
		 
		 $(".zorkif_slider_menu_bar a").removeClass('active');
		 $(this).addClass('active');

	}
	if($(this).attr('id')=="gallery") {
    	//alert($(this).attr('id'));
		 $("#tab3").hide(); 
		 $("#tab1").hide(); 
		 $("#tab2").show();
		 $(".zorkif_slider_menu_bar a").removeClass('active');
		 $(this).addClass('active');
	}
	if($(this).attr('id')=="press") {
 		//alert($(this).attr('id'));
		 $("#tab2").hide(); 
		 $("#tab1").hide(); 
		 $("#tab3").show();
		 $(".zorkif_slider_menu_bar a").removeClass('active');
		 $(this).addClass('active');		 
	}	                   
});



</script>