<?php
require_once("_default_tamplate_includes/header.php");


	 echo "<div id=\"content_container\">";
	     
		 // The line below will check if now view has been selected, it will load default view
		 if(!isset($view_name) || strlen($view_name)==0) $view_name="default.php";

		 if(file_exists($view_name)){			
			require_once($view_name); // View Found
		 }
		 else{
			  // This is a Fix for Include from the Index Page for the view path
			 $view_name="application/views/".$view_name;
			 if(file_exists($view_name)){				 
				 require_once($view_name);
			 }else{
				$view_name="_unknown_view.php";
				require_once($view_name); // View Not Found
			 }
		 }
		
	 echo "</div><!-- end of content_container -->";
	 echo "<div class=\"clear_all\">&nbsp;</div>";
	 
require_once("_default_tamplate_includes/footer.php");
?>