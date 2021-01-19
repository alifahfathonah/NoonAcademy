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

if ((isset($_GET['DeleteID'])) && ($_GET['DeleteID'] != "") && (isset($_SESSION['MM_UserID']))) {
   $deleteSQL = sprintf("DELETE FROM eschool_courses_schedule WHERE CourseClassScheduleID=%s AND TeacherUserID=%s",
                       GetSQLValueString($_GET['DeleteID'], "int"),
					   GetSQLValueString($_SESSION['MM_UserID'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($deleteSQL, $conn) or die(mysql_error());
  
/*   if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  } */
  
  	if (mysql_affected_rows()>0){ // This use auto use the latest used connection
	  $deleteGoTo = "index.php?page_id=_teacher_cpanel/teacher_courses_schedule_list";
	  header(sprintf("Location: %s", $deleteGoTo));
	}else{		 
		fnShowMessageBox(MSG_ACTION_FAILED,MSG_TITLE_ACTION_FAILED);		
	}
  
}
?>
