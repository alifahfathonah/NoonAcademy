<?php

function allow_access_to_teachers_and_admins_only(){	
	 if(isset($_SESSION) &&  $_SESSION['MM_UserGroup']!=2){ // Check if Not Teacher
		 	 if(isset($_SESSION) &&  $_SESSION['MM_UserGroup']!=1){ // Check if Not Administrator
				 ob_end_clean();
				 header("Location: index.php?page_id=check_login&STATUS=LOGINREQUIRED");
				 ob_end_flush();
		     }// end of Administrator Check
	 }// End of Teacher's Check
}

function allow_access_to_admins_only(){	
	 if(isset($_SESSION) && $_SESSION['MM_UserGroup']!=1 ){
		 ob_end_clean();
		 header("Location: index.php?page_id=check_login&STATUS=LOGINREQUIRED");
		 ob_end_flush();
	 }	
}

function allow_access_to_students_only(){	
	 if(isset($_SESSION) && $_SESSION['MM_UserGroup']!=3 ){
		 ob_end_clean();
		 header("Location: index.php?page_id=check_login&STATUS=LOGINREQUIRED");
		 ob_end_flush();
	 }	
}

function allow_access_to_athenticated_users_only(){	
	 if(isset($_SESSION) && $_SESSION['MM_UserGroup']<=0 ){
		 ob_end_clean();
		 header("Location: index.php?page_id=check_login&STATUS=LOGINREQUIRED");
		 ob_end_flush();
	 }	
}

?>