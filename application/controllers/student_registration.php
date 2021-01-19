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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
// Check if Username Already Registered into the database 
$colname_Rs_IsAllreadyRegistred = "-1";
if (isset($_POST['Username'])) {
  $colname_Rs_IsAllreadyRegistred = $_POST['Username'];
}
mysql_select_db($database_conn, $conn);
$query_Rs_IsAllreadyRegistred = sprintf("SELECT Username FROM user_accounts WHERE Username = %s", GetSQLValueString($colname_Rs_IsAllreadyRegistred, "text"));
$Rs_IsAllreadyRegistred = mysql_query($query_Rs_IsAllreadyRegistred, $conn) or die(mysql_error());
$row_Rs_IsAllreadyRegistred = mysql_fetch_assoc($Rs_IsAllreadyRegistred);
$totalRows_Rs_IsAllreadyRegistred = mysql_num_rows($Rs_IsAllreadyRegistred);
// End of check if Username Already Registered into the database 


if ($totalRows_Rs_IsAllreadyRegistred == 0) { // if 0 it means the username is not into the database
	if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	  $Username=strtolower($_POST['Username']);
	  $insertSQL = sprintf("INSERT INTO user_accounts (Username, Password, FirstName, MiddleNames, LastNames, AddressLine1, AddressLine2, City, CountryID, Phone, Email, WebSite, ContactNo, GroupID, AccountStatus, LastLoginIP,CreatedAt) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
						   GetSQLValueString($Username, "text"),
						   GetSQLValueString($_POST['Password'], "text"),
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
						   GetSQLValueString($_POST['ContactNo'], "text"),
						   GetSQLValueString(3, "int"), // GroupID=3 Student
						   GetSQLValueString(1, "int"), // Keep the Acount Activated by Defualt
						   GetSQLValueString($_SERVER['REMOTE_ADDR'], "text"), // $REMOTE_ADDR is used to get the IP address of the User's Computer
						   GetSQLValueString(date("Y-m-d H:i:s"), "date")); 
	
	  mysql_select_db($database_conn, $conn);
	  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
	  
	  $MessageBoxText="Thank you. Your Account has been created successfully";
      $MessageBoxTitle="Account Creation";
	}
}else{
	  $MessageBoxText="Username Allready Registred";
      $MessageBoxTitle="Account Existed";
}// end of already registred
mysql_select_db($database_conn, $conn);
$query_Rs_GetCountryName = "SELECT * FROM country_names ORDER BY CountryID ASC";
$Rs_GetCountryName = mysql_query($query_Rs_GetCountryName, $conn) or die(mysql_error());
$row_Rs_GetCountryName = mysql_fetch_assoc($Rs_GetCountryName);
$totalRows_Rs_GetCountryName = mysql_num_rows($Rs_GetCountryName);

?>
