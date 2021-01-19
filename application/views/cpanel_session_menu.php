<?php require_once("application/controllers/".basename( __FILE__ )); ?>
<?php 

$current_page = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
	$current_page .= "?" . htmlentities($_SERVER['QUERY_STRING']);	 
	$search = array(htmlentities('&lang=en'),  htmlentities('&lang=ar'));
	$replace = array('', '');
  	$current_page=str_replace($search, $replace, $current_page);
}

// ?page_id=user_profile_view
if(isset($_SESSION['MM_UserID']) && isset($_SESSION['MM_UserGroup']) && $_SESSION['MM_UserGroup']==1){ // Administrator
?>                        
  <div id="zorkif_drop_down_menu"  class="clearfix"> 
     <ul id="navMain">
     <li class="currentPage"><a href="?page_id=cpanel"><img src="images/header_top_nav/icons/system.png"/><?php echo USER_CPANEL_WELCOME; ?>&nbsp;<?php echo $FullName; ?></a>
            <ul>
                 <li><a href="?page_id=user_profile"><?php echo USER_CPANEL_MENU_PROFILE; ?></a></li>
                 <li><a href="?page_id=change_password"><?php echo USER_CPANEL_MENU_CHANGE_PASSWORD; ?></a></li>
                 <li><a href="?page_id=logout"><?php echo USER_CPANEL_MENU_LOGOUT; ?></a></li>
   			</ul>
        </li>
        
       
       
       
       <li><a href="?page_id=_admin_cpanel/teacher_libraries_list"><img src="images/header_top_nav/icons/usermgmt.png" alt="Library"/><?php echo USER_CPANEL_MENU_USER_MGMT; ?></a>
               <ul>
               <li><a href="?page_id=_admin_cpanel/show_all_users_accounts" ><?php echo USER_CPANEL_MENU_SHOW_USER_LIST; ?></a></li>
                 <li><a href="?page_id=_admin_cpanel/user_registration"><?php echo USER_CPANEL_MENU_REGISTER_NEW_USER; ?></a></li>        
                 <li><a href="?page_id=_admin_cpanel/change_user_password"><?php echo USER_CPANEL_MENU_CHANGE_USER_PASSWORD; ?></a></li>
                    
               </ul>
        </li>
       
       
       
       
       
       
       
       
        
        <li><a href="?page_id=_admin_cpanel/teacher_libraries_list"><img src="images/header_top_nav/icons/library.png" alt="Library"/><?php echo USER_CPANEL_MENU_LIBRARY; ?></a>
               <ul>
                    <li><a href="?page_id=_admin_cpanel/teacher_libraries_list" ><?php echo USER_CPANEL_MENU_TEACHER_LIBRARIES; ?></a></li>          
                    <li><a href="?page_id=_admin_cpanel/teacher_library_new" ><?php echo USER_CPANEL_MENU_NEW_LIBRARY; ?></a></li>
                    <li><a href="?page_id=_admin_cpanel/teacher_upload_lib_meterials" ><?php echo USER_CPANEL_MENU_UPLOAD_DATA; ?></a></li>
               </ul>
        </li>
        
        
 		<li><a href="?page_id=_admin_cpanel/teacher_courses_list"><img src="images/header_top_nav/icons/courses.png" alt="Courses"/><?php echo USER_CPANEL_MENU_COURSES; ?></a>
               <ul class="sub_menu">
                <li><a href="?page_id=_admin_cpanel/teacher_courses_list"><?php echo USER_CPANEL_MENU_COURSES_LIST; ?></a></li>          
                <li><a href="?page_id=_admin_cpanel/teacher_courses_new"><?php echo USER_CPANEL_MENU_NEW_COURSES; ?></a></li> 
                <li><a href="?page_id=_teacher_cpanel/enrolling_student_get_course_list.php" ><?php echo USER_CPANEL_MENU_ENROLL_NEW_STUDENT; ?></a></li>
                <li><a href="?page_id=_teacher_cpanel/enrolled_student_list.php" ><?php echo USER_CPANEL_MENU_ENROLLED_STUDENTS_LIST; ?></a></li>
<li><a href="?page_id=_admin_cpanel/courses_payments.php" ><?php echo USER_CPANEL_MENU_PAYMENTS; ?></a></li>                               
                 </ul>
        </li>
        
         
        <li><a href="?page_id=_teacher_cpanel/teacher_courses_schedule_vc"><img src="images/header_top_nav/icons/classes.png" alt="Classes"/><?php echo USER_CPANEL_MENU_CLASSES; ?></a>
               <ul>
                <li><a href="?page_id=_teacher_cpanel/teacher_courses_schedule_vc"><?php echo USER_CPANEL_MENU_SCHEDULE_CLASSES; ?></a></li>              
                <li><a href="?page_id=_teacher_cpanel/teacher_courses_schedule_vc_list" ><?php echo USER_CPANEL_MENU_MY_CLASSES; ?></a></li>            
               </ul>
        </li>


        <li><a href="?page_id=cpanel"><img src="images/header_top_nav/icons/tools.png" alt="Tools"/><?php echo USER_CPANEL_MENU_TOOLS; ?></a>
               <ul>
                <li><a href="?page_id=_admin_cpanel/news_management"><?php echo USER_CPANEL_MENU_NEWS; ?></a></li>              
          
               </ul>
        </li>
        
        
</ul>
        <div id="content_language_selector">
            <a href="<?php echo $current_page; ?>&lang=ar">العربية</a> |
            <a href="<?php echo $current_page; ?>&lang=en">English</a>
        </div>
</div>
 <?php
}// End of Administrator's User Panel
?>
<?php 
if(isset($_SESSION['MM_UserID']) && isset($_SESSION['MM_UserGroup']) && $_SESSION['MM_UserGroup']==2){ // Teacher
?>                        
  <div id="zorkif_drop_down_menu"  class="clearfix"> 
    <ul id="navMain">
     <li class="currentPage">
       <a href="?page_id=cpanel"><img src="images/header_top_nav/icons/system.png" alt="Profile"/><?php echo USER_CPANEL_WELCOME; ?>&nbsp;<?php echo $FullName; ?></a>
            <ul>
                <li><a href="?page_id=user_profile"><?php echo USER_CPANEL_MENU_PROFILE; ?></a></li>
                 <li><a href="?page_id=change_password"><?php echo USER_CPANEL_MENU_CHANGE_PASSWORD; ?></a></li>
                 <li><a href="?page_id=logout"><?php echo USER_CPANEL_MENU_LOGOUT; ?></a></li>                
            </ul>
       
       
        <li><a href="?page_id=_teacher_cpanel/teacher_libraries_list"><img src="images/header_top_nav/icons/library.png" alt="Library"/><?php echo USER_CPANEL_MENU_LIBRARY; ?></a>
           <ul>
                <li><a href="?page_id=_teacher_cpanel/teacher_libraries_list" ><?php echo USER_CPANEL_MENU_MY_LIBRARY; ?></a></li>          
                <li><a href="?page_id=_teacher_cpanel/teacher_library_new" ><?php echo USER_CPANEL_MENU_NEW_LIBRARY; ?></a></li>
                <li><a href="?page_id=_teacher_cpanel/teacher_upload_lib_meterials" ><?php echo USER_CPANEL_MENU_UPLOAD_DATA; ?></a></li>
           </ul>
        </li>
 		
        
        
        <li><a href="?page_id=_teacher_cpanel/teacher_courses_list"><img src="images/header_top_nav/icons/courses.png" alt="Courses"/><?php echo USER_CPANEL_MENU_COURSES; ?></a>
           <ul>
                <li><a href="?page_id=_teacher_cpanel/teacher_courses_list"><?php echo USER_CPANEL_MENU_MY_COURSES_LIST; ?></a></li>          
                <li><a href="?page_id=_teacher_cpanel/teacher_courses_new"><?php echo USER_CPANEL_MENU_NEW_COURSES; ?></a></li>
                <li><a href="?page_id=_teacher_cpanel/enrolling_student_get_course_list.php" ><?php echo USER_CPANEL_MENU_ENROLL_NEW_STUDENT; ?></a></li>
                <li><a href="?page_id=_teacher_cpanel/enrolled_student_list.php" ><?php echo USER_CPANEL_MENU_ENROLLED_STUDENTS_LIST; ?></a></li>             
           </ul>
        </li> 
        
        <li><a href="?page_id=_teacher_cpanel/teacher_courses_schedule_vc_list"><img src="images/header_top_nav/icons/classes.png" alt="Classes"/><?php echo USER_CPANEL_MENU_CLASSES; ?></a>
               <ul>
                <li><a href="?page_id=_teacher_cpanel/teacher_courses_schedule_vc"><?php echo USER_CPANEL_MENU_SCHEDULE_CLASSES; ?></a></li>              
                <li><a href="?page_id=_teacher_cpanel/teacher_courses_schedule_vc_list" ><?php echo USER_CPANEL_MENU_MY_CLASSES; ?></a></li>            
               </ul>
        </li>
        </ul>
        <div id="content_language_selector">
            <a href="<?php echo $current_page; ?>&lang=ar">العربية</a> |
            <a href="<?php echo $current_page; ?>&lang=en">English</a>
        </div>        
</div>
   
 <?php
}// End of Teacher's User Panel
?>
<?php 
if(isset($_SESSION['MM_UserID']) && isset($_SESSION['MM_UserGroup']) && $_SESSION['MM_UserGroup']==3){ // Student
?>                        
  <div id="zorkif_drop_down_menu"  class="clearfix"> 
    <ul id="navMain">
     
     
      <li class="currentPage"><a href="?page_id=cpanel"><img src="images/header_top_nav/icons/system.png" alt="Profile"/><?php echo USER_CPANEL_WELCOME; ?>&nbsp;<?php echo $FullName; ?></a>
            <ul>
                <li><a href="?page_id=user_profile"><?php echo USER_CPANEL_MENU_PROFILE; ?></a></li>
 				<li><a href="?page_id=change_password" class="main_menu"><?php echo USER_CPANEL_MENU_CHANGE_PASSWORD; ?></a></li>       
        <li><a href="?page_id=logout" class="main_menu"><?php echo USER_CPANEL_MENU_LOGOUT; ?></a></li>                
            </ul>
       
        <li><a href="?page_id=_student_cpanel/courses_list"><img src="images/header_top_nav/icons/courses.png" alt="Courses"/><?php echo USER_CPANEL_MENU_COURSES; ?></a>        
              <ul class="sub_menu">
                 <li><a href="?page_id=_student_cpanel/courses_list"><?php echo USER_CPANEL_MENU_COURSES_LIST; ?></a></li>
                 <li><a href="?page_id=_student_cpanel/my_courses"><?php echo USER_CPANEL_MENU_MY_COURSES_LIST; ?></a></li>
              </ul>
		</li>
        <li><a href="?page_id=_student_cpanel/my_classes" class="main_menu"><img src="images/header_top_nav/icons/classes.png" alt="Classes"/><?php echo USER_CPANEL_MENU_CLASSES; ?></a>
               <ul class="sub_menu">
            	 <li><a href="?page_id=_student_cpanel/my_classes" ><?php echo USER_CPANEL_MENU_MY_CLASSES; ?></a></li>            
               </ul>
        </li>       
    </ul>
        <div id="content_language_selector">
            <a href="<?php echo $current_page; ?>&lang=ar">العربية</a> |
            <a href="<?php echo $current_page; ?>&lang=en">English</a>
        </div>
 </div>   
    
    
<?php
}// End of Student's User Panel
?>

<?php 
if(!isset($_SESSION['MM_UserID']) ){ // If no one is Loged in [Default]
?>                        
  <div id="zorkif_drop_down_menu"  class="clearfix"> 
    <ul id="navMain">
     
     
      <li class="currentPage"><a href="?page_id=check_login"><img src="images/header_top_nav/icons/login.png" alt="Classes"/><?php echo USER_CPANEL_MENU_LOGIN; ?></a></li>
        <li><a href="?page_id=student_registration"><img src="images/header_top_nav/icons/student.png" alt="Classes"/><?php echo USER_CPANEL_MENU_REGISTER_STUDENT; ?></a></li>
        <li><a href="?page_id=teacher_registration"> <img src="images/header_top_nav/icons/teacher.png" alt="Classes"/><?php echo USER_CPANEL_MENU_REGISTER_TEACHER; ?></a></li>
</ul>
        <div id="content_language_selector">
            <a href="<?php echo $current_page; ?>&lang=ar">العربية</a> |
            <a href="<?php echo $current_page; ?>&lang=en">English</a>
        </div>
</div>
<?php
}// End of no user panel
?>
