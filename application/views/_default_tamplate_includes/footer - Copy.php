
</div><!-- End of main_container -->
            <div id="footer_container">
           	  <div id="footer"> 
                    <div class="footer_column round_corners">
                        <div class="icon">
                        <img src="images/footer/about.png" width="200" height="198" alt="About us">
                        </div><!-- end of icon -->
                        <div class="text_content">
                                <h2>About</h2>
                                <p>This is just some text </p>
                        </div><!-- end of column text_content -->
           			</div><!-- end of footer_column -->                
				<div class="footer_column_divider"> </div> <!-- end of footer_column_divider -->
 
                    <div class="footer_column round_corners">
                        <div class="icon">
                        <img src="images/footer/blog.png" width="200" height="198" alt="About us">
                        </div><!-- end of icon -->
                        <div class="text_content">
                                <h2>Register with Us</h2>

                        </div><!-- end of column text_content -->
           			</div><!-- end of footer_column -->                
				<div class="footer_column_divider"> </div> <!-- end of footer_column_divider -->
 
  
                      <div class="footer_column round_corners">
                        <div class="icon">
                        <img src="images/footer/help.png" width="200" height="198" alt="About us">
                        </div><!-- end of icon -->
                        <div class="text_content">
                                <h2>Help</h2>
                                <p>This is just some text </p>
                        </div><!-- end of column text_content -->
           			</div><!-- end of footer_column -->                
				<div class="footer_column_divider"> </div> <!-- end of footer_column_divider -->
 
  
                      <div class="footer_column round_corners">
                        <div class="icon">
                        <img src="images/footer/twitter.png" width="200" height="198" alt="About us">
                        </div><!-- end of icon -->
                        <div class="text_content">
                                <h2>Twitter</h2>
                                <p>This is just some text </p>
                        </div><!-- end of column text_content -->
           			</div><!-- end of footer_column -->                
				<div class="clear_all">&nbsp;</div>
  				<div id="footer_bar" class="round_corners">
                	<div id="footer_bar_text_message">نريد آخر الأخبار؟ إنضم إلى قائمة مراسلاتنا!</div>
                    <div id="footerbar_newsletter_subscription"><form action="?page_id=news_letter" method="post" id="frmNewsLetter"><input type="email" name="EmailAddress" placeholder="YOUR EMAIL HERE" class="round_corners" id="EmailAddress">
                      <input type="submit" name="button" id="button" value="Submit">
                  </form></div>
                </div>  
				<div class="clear_all">&nbsp;</div>
                <div class="footer_note">Citynet، LLC © 2012 . جميع الحقوق محفوظة. نتاج </div>                  
                <div class="clear_all">&nbsp;</div>                                
              </div><!-- end of footer -->     
            </div><!-- end of footer_contrainer -->            
<script type="text/javascript">
/* // This is the jQuery Script that will be used to control the Tabes in the page.

$(document).ready(function() {
      	$("#tab1").show(); // Show Tab1 by default
});

$(".zorkif_slider_menu_bar a").click(function(event) {
  	
	event.preventDefault(); // Prevent Default Hyperlink Click
	  
	if($(this).attr('id')=="about_us") {
		 $("#tab3").hide(); 
		 $("#tab2").hide(); 
		 $("#tab1").show();

	}
	if($(this).attr('id')=="support") {
    	//alert($(this).attr('id'));
		 $("#tab3").hide(); 
		 $("#tab1").hide(); 
		 $("#tab2").show();
	}
	if($(this).attr('id')=="blog") {
 		//alert($(this).attr('id'));
		 $("#tab2").hide(); 
		 $("#tab1").hide(); 
		 $("#tab3").show();
	}	                   
});
 */


</script>

<script type="text/javascript">
  function Zorkif_fn_ShowStatusMessage($data){
	alert("Loading..");
	 $('#error_message').html($data);
	 $('#error_message').show();
	 $('#error_message').animate({top:"0"}, 500);
 }
 $(document).ready(function(e) {

   Zorkif_fn_ShowWarningMessage("Please provide full information.");
 });
	// Make the Forms HTML 5 Compatable on Old Browser such as ie6
	$(function() {
 		 $('form').h5form();
	});




 

</script>
</body>
</html>