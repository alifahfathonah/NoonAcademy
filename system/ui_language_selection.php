<?php
/* ============================================================= */
/*      User Interface Language Selection                        */
/* ============================================================= */

// Setting Up User Interface Language Environmnet
$Content_Language="ar";
if((isset($_SESSION['Content_Language']) && $_SESSION['Content_Language']=="ar") || (isset($_SESSION['Content_Language']) && $_SESSION['Content_Language']=="en"))
$Content_Language=$_SESSION['Content_Language'];

if(isset($_GET['lang']) && !empty($_GET['lang'])) {
	$Content_Language=$_GET['lang'];
	$_SESSION['Content_Language']=$Content_Language;
}
switch($Content_Language){
	case "ar": 	
			require_once('system/defined_constants/message_box_constants_inc_ar.php');  // Get English MessageBox Text  Messages 
			require_once('system/defined_constants/language_file_ar.php');  // Get English MessageBox Text  Messages 
			break;
	case "en": 	
			require_once('system/defined_constants/message_box_constants_inc_en.php');  // Get English MessageBox Text  Messages 
			require_once('system/defined_constants/language_file_en.php');  // Get English MessageBox Text  Messages 
			break;			
}
/* ============================================================= */
/*      END of User Interface Language Selection                 */
/* ============================================================= */


?>