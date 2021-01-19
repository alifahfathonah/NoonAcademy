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
		require_once("application/controllers/wiziq/WiZiQClassAPI/CancelClass.php");
		$WizIQClass_ID=0;
		$local_db_class_id=0;
		if(isset($_GET['WizIQ_class_id'])) { 
		$WizIQClass_ID=$_GET['WizIQ_class_id'];
		$WizIQClass=new CancelClass;
		$WizIQClass->SetWizIQClassID($WizIQClass_ID);
		$WizIQClass->CancelClass();
		}
		if(isset($_GET['ClassID'])){
			// Deleted Code
			if ((isset($_GET['ClassID'])) && ($_GET['ClassID'] != "") && (isset($_SESSION['MM_UserID']))) {
  $deleteSQL = sprintf("DELETE FROM eschool_courses_classes WHERE ClassID=%s AND TeacherUserID=%s",
                       GetSQLValueString($_GET['ClassID'], "int"),
					   GetSQLValueString($_SESSION['MM_UserID'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($deleteSQL, $conn) or die(mysql_error());

	ob_end_clean();
  $deleteGoTo = "index.php?page_id=_teacher_cpanel/teacher_courses_schedule_vc_list";
  header(sprintf("Location: %s", $deleteGoTo));
}
			// End of Delete Class from Database
		}
		
?>