<?php
allow_access_to_athenticated_users_only();
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1") && ($_POST['Password']==$_POST['ConfirmPassword'])) {
  $updateSQL = sprintf("UPDATE user_accounts SET Password=%s WHERE UserID=%s",
                       GetSQLValueString($_POST['Password'], "text"),
                       GetSQLValueString($_SESSION['MM_UserID'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
 
   if(mysql_affected_rows()>0){ 
    
   fnShowMessageBox(MSG_PASSWORD_CHANGE_SUCCESSFUL,MSG_TITLE_PASSWORD_CHANGE_SUCCESSFUL);
     echo "<script type=\"text/javascript\">
			$(document).ready(function(e) {
			ZORKIF_ShowNotificationMessage(\"". MSG_PASSWORD_CHANGE_SUCCESSFUL."\");
			});
		</script>";
   }
   else
   {
     
    fnShowMessageBox(MSG_PASSWORD_CHANGE_FAILED,MSG_TITLE_PASSWORD_CHANGE_FAILED);
 		 
   echo "<script type=\"text/javascript\">
			$(document).ready(function(e) {
			ZORKIF_ShowErrorMessage(\"". MSG_PASSWORD_CHANGE_FAILED."\");
			});
		</script>";

    
   }
}else {
	// some thing is wrong or passwrod and cornfirm passwords are not the same.
	if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1") && ($_POST['Password']!=$_POST['ConfirmPassword'])) {
	fnShowMessageBox(MSG_PASSWORD_DEOS_NOT_MATCHES,MSG_TITLE_PASSWORD_DEOS_NOT_MATCHES);
	}
}
?>