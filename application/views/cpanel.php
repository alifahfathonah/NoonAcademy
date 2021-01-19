<?php
allow_access_to_athenticated_users_only();
?>
<h2><?php echo USER_CPANEL_TITLE_HEADING;?></h2>

<div class="data_column_b">

<?php
if(isset($_SESSION['MM_UserGroup']) && $_SESSION['MM_UserGroup']==1){// Administrators
 require_once("cpanel_tiles_administrators.php"); 
}

if(isset($_SESSION['MM_UserGroup']) && $_SESSION['MM_UserGroup']==2){// teachers
 require_once("cpanel_tiles_teacher.php"); 
}
if(isset($_SESSION['MM_UserGroup']) && $_SESSION['MM_UserGroup']==3){// Students
 require_once("cpanel_tiles_students.php"); 
}
 
 ?>
</div>


<div class="data_column_a">
<?php require_once("content_tiles/login_page.php"); ?>
</div>
