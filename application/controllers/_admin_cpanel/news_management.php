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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO news (NewsTitle, NewsText,  WhoUserID, Content_LanguageID) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['NewsTitle'], "text"),
                       GetSQLValueString($_POST['NewsText'], "text"),
                       GetSQLValueString($_SESSION['MM_UserID'], "int"),
                       GetSQLValueString($_POST['Content_LanguageID'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
}

if ((isset($_GET['DeleteID'])) && ($_GET['DeleteID'] != "")) {
  $deleteSQL = sprintf("DELETE FROM news WHERE NewsID=%s",
                       GetSQLValueString($_GET['DeleteID'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($deleteSQL, $conn) or die(mysql_error());
}

mysql_select_db($database_conn, $conn);
$query_Rs_GetContentLanguages = "SELECT * FROM content_languages ORDER BY LanguageName ASC";
$Rs_GetContentLanguages = mysql_query($query_Rs_GetContentLanguages, $conn) or die(mysql_error());
$row_Rs_GetContentLanguages = mysql_fetch_assoc($Rs_GetContentLanguages);
$totalRows_Rs_GetContentLanguages = mysql_num_rows($Rs_GetContentLanguages);


?>
