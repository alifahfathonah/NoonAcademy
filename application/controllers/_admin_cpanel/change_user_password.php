<?php
allow_access_to_admins_only();
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1") && !empty($_POST['Username']) && !empty($_POST['Password'])) {
  $updateSQL = sprintf("UPDATE user_accounts SET Password=%s WHERE Username=%s",
                       GetSQLValueString(trim($_POST['Password']), "text"),
                       GetSQLValueString(trim($_POST['Username']), "text"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
  if(mysql_affected_rows()>0){
	   fnShowMessageBox(MSG_PASSWORD_CHANGE_SUCCESSFUL,MSG_TITLE_PASSWORD_CHANGE_SUCCESSFUL);
  }else{
	 fnShowMessageBox(MSG_PASSWORD_CHANGE_FAILED,MSG_TITLE_PASSWORD_CHANGE_FAILED);  
  }
	  
}else{// check if username or password is empty
	if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1") && (empty($_POST['Username']) || !empty($_POST['Password']))) 
	fnShowMessageBox(MSG_PASSWORD_OR_USERNAME_EMPTY,MSG_TITLE_PASSWORD_OR_USERNAME_EMPTY);  
}
?>