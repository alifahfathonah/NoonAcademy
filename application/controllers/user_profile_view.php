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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	
	$UploadedFileName="";
	if (($UploadedFileName=fnUploadFileToPath('Picture',USER_PROFILE_UPLOAD_PATH))=='NOTALLOWED'){
		fnShowMessageBox(MSG_FILE_UPLOAD_FAILED,MSG_TITLE_FILE_UPLOAD_FAILED);
		
	}else{
  $updateSQL = sprintf("UPDATE user_accounts SET FirstName=%s, MiddleNames=%s, LastNames=%s, AddressLine1=%s, AddressLine2=%s, City=%s, CountryID=%s, Phone=%s, Email=%s, WebSite=%s, CompanyNameIfAny=%s, ContactNo=%s, Others=%s, Picture=%s WHERE UserID=%s",
                       GetSQLValueString($_POST['FirstName'], "text"),
                       GetSQLValueString($_POST['MiddleNames'], "text"),
                       GetSQLValueString($_POST['LastNames'], "text"),
                       GetSQLValueString($_POST['AddressLine1'], "text"),
                       GetSQLValueString($_POST['AddressLine2'], "text"),
                       GetSQLValueString($_POST['City'], "text"),
                       GetSQLValueString($_POST['CountryID'], "int"),
                       GetSQLValueString($_POST['Phone'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['WebSite'], "text"),
                       GetSQLValueString($_POST['CompanyNameIfAny'], "text"),
                       GetSQLValueString($_POST['ContactNo'], "text"),
                       GetSQLValueString($_POST['Others'], "text"),
                       GetSQLValueString($UploadedFileName, "text"),
                       GetSQLValueString($_POST['UserID'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
	}// end of File Upload Check
}

$colname_Rs_GetUserProfile = "-1";
if (isset($_SESSION['MM_UserID'])) {
  $colname_Rs_GetUserProfile = $_SESSION['MM_UserID'];
}
mysql_select_db($database_conn, $conn);
$query_Rs_GetUserProfile = sprintf("SELECT * FROM user_accounts WHERE UserID = %s", GetSQLValueString($colname_Rs_GetUserProfile, "int"));
$Rs_GetUserProfile = mysql_query($query_Rs_GetUserProfile, $conn) or die(mysql_error());
$row_Rs_GetUserProfile = mysql_fetch_assoc($Rs_GetUserProfile);
$totalRows_Rs_GetUserProfile = mysql_num_rows($Rs_GetUserProfile);


//Get Country Name
mysql_select_db($database_conn, $conn);
$query_Rs_GetCountryName = "SELECT * FROM country_names ORDER BY CountryID ASC";
$Rs_GetCountryName = mysql_query($query_Rs_GetCountryName, $conn) or die(mysql_error());
$row_Rs_GetCountryName = mysql_fetch_assoc($Rs_GetCountryName);
$totalRows_Rs_GetCountryName = mysql_num_rows($Rs_GetCountryName);


?>
