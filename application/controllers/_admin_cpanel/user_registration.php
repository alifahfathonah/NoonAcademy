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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	  $Username=strtolower($_POST['Username']);
  $insertSQL = sprintf("INSERT INTO user_accounts (Username, Password, FirstName, MiddleNames, LastNames, AddressLine1, AddressLine2, City, CountryID, Phone, Email, WebSite, CompanyNameIfAny, ContactNo, Others, GroupID, AccountStatus, CreatedAt) VALUES (%s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
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
                       GetSQLValueString($_POST['CompanyNameIfAny'], "text"),
                       GetSQLValueString($_POST['ContactNo'], "text"),
                       GetSQLValueString($_POST['Others'], "text"),
                       GetSQLValueString($_POST['GroupID'], "int"),
                       GetSQLValueString($_POST['AccountStatus'], "int"),
					   GetSQLValueString(date("Y-m-d H:i:s"), "date"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
}

mysql_select_db($database_conn, $conn);
$query_Rs_Groups = "SELECT * FROM user_groups ORDER BY GroupID ASC";
$Rs_Groups = mysql_query($query_Rs_Groups, $conn) or die(mysql_error());
$row_Rs_Groups = mysql_fetch_assoc($Rs_Groups);
$totalRows_Rs_Groups = mysql_num_rows($Rs_Groups);

mysql_select_db($database_conn, $conn);
$query_Rs_CountryNames = "SELECT * FROM country_names ORDER BY CountryID ASC";
$Rs_CountryNames = mysql_query($query_Rs_CountryNames, $conn) or die(mysql_error());
$row_Rs_CountryNames = mysql_fetch_assoc($Rs_CountryNames);
$totalRows_Rs_CountryNames = mysql_num_rows($Rs_CountryNames);
?>