<?php
allow_access_to_teachers_and_admins_only();
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
$current_page = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
	$current_page .= "?" . htmlentities($_SERVER['QUERY_STRING']);	 
	$search = array(htmlentities('&STATUS=LIBRARYCREATED'));
	$replace = array('');
  	$current_page=str_replace($search, $replace, $current_page);
}

$editFormAction = $current_page;
 

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
 
 	$UploadedFileName="";
	if (($UploadedFileName=fnUploadFileToPath('DataFileName',USER_LIBRARY_UPLOAD_PATH))=='NOTALLOWED'){
		fnShowMessageBox(MSG_FILE_UPLOAD_FAILED,MSG_TITLE_FILE_UPLOAD_FAILED);
		   echo "<script type=\"text/javascript\">
			$(document).ready(function(e) {
			ZORKIF_ShowErrorMessage(\"". MSG_FILE_UPLOAD_FAILED."\");
			});
		</script>";
	}else{
 
  $insertSQL = sprintf("INSERT INTO eschool_teacher_library_meterial (TeacherLibID, DataFileName, `Description`, IsDownloadable, ShareWithID, CreateAt) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['TeacherLibID'], "int"),
                       GetSQLValueString($UploadedFileName, "text"),
                       GetSQLValueString($_POST['Description'], "text"),
                       GetSQLValueString(isset($_POST['IsDownloadable']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['ShareWithID'], "int"),
                       GetSQLValueString(date("Y-m-d H:i:s"), "date"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
  fnShowMessageBox(MSG_TEACHER_LIBRARY_METERIALS_UPLOAED,MSG_TITLE_TEACHER_LIBRARY_METERIALS_UPLOAED);
  		   echo "<script type=\"text/javascript\">
			$(document).ready(function(e) {
			ZORKIF_ShowNotificationMessage(\"". MSG_TEACHER_LIBRARY_METERIALS_UPLOAED."\");
			});
		</script>";  
	}// end of Insert

}

mysql_select_db($database_conn, $conn);
$query_RsShareWithTypes = "SELECT * FROM eschool_share_with_types";
$RsShareWithTypes = mysql_query($query_RsShareWithTypes, $conn) or die(mysql_error());
$row_RsShareWithTypes = mysql_fetch_assoc($RsShareWithTypes);
$totalRows_RsShareWithTypes = mysql_num_rows($RsShareWithTypes);

// Get the List of Teachers Libraries
$colname_RsGetTeacherLibraries = "-1";
if (isset($_SESSION['MM_UserID'])) {
  $colname_RsGetTeacherLibraries = $_SESSION['MM_UserID'];
}
mysql_select_db($database_conn, $conn);
$query_RsGetTeacherLibraries = sprintf("SELECT * FROM eschool_teacher_library WHERE TeacherUserID = %s ORDER BY TeacherLibID DESC", GetSQLValueString($colname_RsGetTeacherLibraries, "int"));
$RsGetTeacherLibraries = mysql_query($query_RsGetTeacherLibraries, $conn) or die(mysql_error());
$row_RsGetTeacherLibraries = mysql_fetch_assoc($RsGetTeacherLibraries);
$totalRows_RsGetTeacherLibraries = mysql_num_rows($RsGetTeacherLibraries);

if(isset($_GET['STATUS']) && $_GET['STATUS']=="LIBRARYCREATED"){
	
   echo "<script type=\"text/javascript\">
			$(document).ready(function(e) {
			ZORKIF_ShowNotificationMessage(\"". MSG_TEACHER_LIBRARY_CREATED."\");
			});
		</script>";	
}

// Get Library Name as Selected By Query String .

$colname_RsGetLibraryName = "-1";
if (isset($_GET['UploadID'])) {
  $colname_RsGetLibraryName = $_GET['UploadID'];
}
mysql_select_db($database_conn, $conn);
$query_RsGetLibraryName = sprintf("SELECT * FROM eschool_teacher_library WHERE TeacherLibID = %s", GetSQLValueString($colname_RsGetLibraryName, "int"));
$RsGetLibraryName = mysql_query($query_RsGetLibraryName, $conn) or die(mysql_error());
$row_RsGetLibraryName = mysql_fetch_assoc($RsGetLibraryName);
$totalRows_RsGetLibraryName = mysql_num_rows($RsGetLibraryName);

?>