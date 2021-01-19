<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_Rs_IsAlreadyRegistred = "-1";
if (isset($_POST['EmailAddress'])) {
  $colname_Rs_IsAlreadyRegistred = $_POST['EmailAddress'];
}
mysql_select_db($database_conn, $conn);
$query_Rs_IsAlreadyRegistred = sprintf("SELECT EmailAddress FROM news_letter WHERE EmailAddress = %s", GetSQLValueString($colname_Rs_IsAlreadyRegistred, "text"));
$Rs_IsAlreadyRegistred = mysql_query($query_Rs_IsAlreadyRegistred, $conn) or die(mysql_error());
$row_Rs_IsAlreadyRegistred = mysql_fetch_assoc($Rs_IsAlreadyRegistred);
$totalRows_Rs_IsAlreadyRegistred = mysql_num_rows($Rs_IsAlreadyRegistred);


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ($totalRows_Rs_IsAlreadyRegistred == 0) {
		if ((isset($_POST["EmailAddress"])) && (strlen($_POST["EmailAddress"])>0)) {
	  $insertSQL = sprintf("INSERT INTO news_letter (EmailAddress) VALUES (%s)",
						   GetSQLValueString($_POST['EmailAddress'], "text"));
	
	  mysql_select_db($database_conn, $conn);
	  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
	}
	 
	   //Registration Successfull for Email Address";	   
	   	fnShowMessageBox(MSG_NEWS_LETTER_SUBMISSION,MSG_TITLE_NEWS_LETTER_SUBMISSION);
		   echo "<script type=\"text/javascript\">
			$(document).ready(function(e) {
			ZORKIF_ShowNotificationMessage(\"". MSG_NEWS_LETTER_SUBMISSION."\");
			});
		</script>";
	   
}else{
	   // Allready Registred
	   	   	fnShowMessageBox(MSG_NEWS_LETTER_SUBMISSION_ALREADY_EXISTED,MSG_TITLE_NEWS_LETTER_SUBMISSION_ALREADY_EXISTED);
		   echo "<script type=\"text/javascript\">
			$(document).ready(function(e) {
			ZORKIF_ShowNotificationMessage(\"". MSG_NEWS_LETTER_SUBMISSION_ALREADY_EXISTED."\");
			});
		</script>";
}// end if AlreadyRegistred Check

@mysql_free_result($Rs_IsAlreadyRegistred);
?>
