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
	$TeacherUserID=0;
	if(isset($_POST['TeacherID']) && $_POST['TeacherID']>0){
		$TeacherUserID=$_POST['TeacherID'];
	}else{
		 $TeacherUserID=$_SESSION['MM_UserID'];
	}
   $insertSQL = sprintf("INSERT INTO eschool_teacher_library (LibName, LibDescription, TeacherUserID, CreateAt) VALUES (%s, %s,%s, %s)",
                       GetSQLValueString($_POST['LibName'], "text"),
                       GetSQLValueString($_POST['LibDescription'], "text"),
                       GetSQLValueString($TeacherUserID, "int"),
                       GetSQLValueString(date("Y-m-d H:i:s"), "date"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
  	  fnShowMessageBox(MSG_TEACHER_LIBRARY_CREATED,MSG_TITLE_TEACHER_LIBRARY_CREATED);  

}

// Get List of all teachers Accounts
mysql_select_db($database_conn, $conn);
$query_RsGetTeachersList = "SELECT * FROM user_accounts WHERE GroupID = 2";
$RsGetTeachersList = mysql_query($query_RsGetTeachersList, $conn) or die(mysql_error());
$row_RsGetTeachersList = mysql_fetch_assoc($RsGetTeachersList);
$totalRows_RsGetTeachersList = mysql_num_rows($RsGetTeachersList);
?>