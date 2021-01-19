<?php
/*
	#Filename:   language_file_en.php
	#CreatedAt:  22/1/2013 10:49AM
	#Purpose:    To Provide Easy Language Tampleting for the Application User Interface
	#Language:   English
	#Direction:  Left-To-Right
	#Developer:  Kifayat Ullah Khan
	#Email:      kifayat@outlook.com
*/


// Login Form
define("LOGIN_FORM_HEADING","User Account Login");
define("LOGIN_FORM_TITLE","Login Information");
define("LOGIN_FORM_USERNAME_LABEL","Enter Username");
define("LOGIN_FORM_PASSWORD_LABEL","Enter Password");
define("LOGIN_FORM_SUBMIT_BUTTON","Login Now");
define("LOGIN_FORM_FAILED_LOGIN_HEADING","Login Failed");

// User's Control Panel 
define("USER_CPANEL_WELCOME","Welcome"); //cpanel_session_menu_en.php
define("USER_CPANEL_TITLE_HEADING","User's Control Panel");//cpanel.php
define("USER_CPANEL_PROFILE_HEADING","User Account Profile"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_FIRST_NAME_LABEL","First Name"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_MIDDLE_NAMES_LABEL","Middle Names"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_LAST_NAME_LABEL","Last Names"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_FULLNAME_LABEL","Full Name");
define("USER_CPANEL_PROFILE_ADDRESS_LINE1_LABEL","Address Line1"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_ADDRESS_LINE2_LABEL","Address Line2"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_EMAIL_LABEL","Email"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_COUNTRY_NAME_LABEL","Country"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_CONTACT_NO_LABEL","ContactNo"); //user_profile_view.php ,user_profile.php

define("USER_CPANEL_PROFILE_COMPANY_NAME_LABEL","Company <em>optional</em>"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_WEB_SITE_LABEL","WebSite"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_PHONE_LABEL","Phone"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_CITY_LABEL","City"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_COMMENTS_LABEL","Comments"); //user_profile_view.php ,user_profile.php

define("USER_CPANEL_PROFILE_UPLOAD_PICTURES_LABEL","Upload Picture"); //user_profile_view.php ,user_profile.php 
 
define("USER_CPANEL_PROFILE_USERNAME_LABEL","Username"); //student_registration.php ,teacher_registration.php 
define("USER_CPANEL_PROFILE_PASSWORD_LABEL","Password"); //student_registration.php ,teacher_registration.php 
define("USER_CPANEL_PROFILE_SUBMIT_BUTTON","Create Account"); //student_registration.php ,teacher_registration.php 


//General Global Buttons
// These Buttons are Used in multiple forms where they fit.
define("SUBMIT_BUTTON_SAVE","Save");
define("SUBMIT_BUTTON_NEXT","Next");
define("SUBMIT_BUTTON_SAVE_CHANGES","Save Changes");  
define("SUBMIT_BUTTON_CHANGE_PASSWORD","Change Password"); 
define("SUBMIT_BUTTON_UPLOAD","Upload");
define("SUBMIT_BUTTON_CREATE_NEW","Create New");
define("SUBMIT_BUTTON_CREATE_SCHEDULE","Create Schedule");


//Global Contasts Used in Multiple Forms
define("ACTION_BUTTONS_TITLE","Action"); 
define("VIEW_LABEL_CHOOSE","Choose"); 
define("VIEW_LABEL_SUBJECT_TITLE","Subject");
define("VIEW_LABEL_SUBJECT_SUB_TITLE","Sub Title");
define("VIEW_LABEL_COURSE_NAME","Course Name");
define("VIEW_LABEL_DESCRIPTION","Description");
define("VIEW_LABEL_START_DATE","StartDate");
define("VIEW_LABEL_END_DATE","EndDate");
define("VIEW_LABEL_COURSE_FEE","Course Fee");
define("VIEW_LABEL_CLASS_ID","Class ID");
define("VIEW_LABEL_CLASS_SCREEN_NAME","Screen Name");
define("VIEW_LABEL_JOIN_CLASS","Join a Class");
define("VIEW_LABEL_CREATE_AT","Create At");
define("VIEW_LABEL_UPDATE_AT","Updated At");
define("VIEW_LABEL_DOWNLOADABLE","Is Downloadable?");
define("VIEW_LABEL_ENROLLABLE","Is Enrollable?");
define("VIEW_LABEL_SHARE_WITH","Share With");
define("VIEW_LABEL_TITLE","Title");
define("VIEW_LABEL_TIMMING","Timmings");
define("VIEW_LABEL_DURATION","Duration");
define("VIEW_LABEL_DURATION_IN_MINUTES","Minutes");
define("VIEW_LABEL_DAY","Day");
define("VIEW_LABEL_DATED","Dated");
define("VIEW_LABEL_TEACHER","Teacher");
define("VIEW_LABEL_CHOOSE_TEACHER_LIBRARY","Choose Teacher's Library");
define("VIEW_LABEL_TEACHER_LIBRARY","Teacher's Library");
define("VIEW_LABEL_UPLOAD_CONTENT_FILE","Upload Content Data FileName");
define("VIEW_LABEL_MAX_NO_OF_STUDENTS","Max Students");
define("VIEW_LABEL_TOTAL_NO_OF_CLASSES","Total Classes");
define("VIEW_LABEL_UPLOAD_CONTENT","Upload New Content File");
define("VIEW_LABEL_UPLOAD_CONTENT_SHORT_NOTE","<em class=\"small\">* If you want to update the Content File, Please re upload it here </em>");
define("VIEW_LABEL_DOWNLOAD","Download");
define("VIEW_LABEL_DOWNLOAD_RECORDING","Download Video");
define("VIEW_LABEL_START","Starts");
define("VIEW_LABEL_VIEW","View");

//Navigation Buttons
define("VIEW_LABEL_MOVE_FIRST","First");
define("VIEW_LABEL_MOVE_PREVIOUS","Previous");
define("VIEW_LABEL_MOVE_NEXT","Next");
define("VIEW_LABEL_MOVE_LAST","Last");

//Name of Days
define("VIEW_LABEL_SUNDAY","Sunday");
define("VIEW_LABEL_MONDAY","Monday");
define("VIEW_LABEL_TUESDAY","Tuesday");
define("VIEW_LABEL_WEDNESDAY","Wednesday");
define("VIEW_LABEL_THURSDAY","Thursday");
define("VIEW_LABEL_FRIDAY","Friday");
define("VIEW_LABEL_SATURDAY","Saturday");

// GENERAL HEADING LABLES
define("VIEW_LABEL_HEADING_EXPIRED_COURSES","Expired Courses");
define("VIEW_LABEL_HEADING_EXPIRED_CLASSES","Expired Classes");
define("STUDENT_COURSE_MY_UNPAID_COURSES_HEADING","Unpaid Courses");
define("STUDENT_COURSE_MY_PAID_COURSES_HEADING","Paid Courses");

// Main Navigation Menu Bar
define("HEADER_NAV_ABOUT_US","About Us");
define("HEADER_NAV_SERVICES","Services");
define("HEADER_NAV_SUPPORT","Support");
define("HEADER_NAV_COURSES","Courses");

// Change Password
define("USER_CPANEL_PROFILE_ADMIN_USER_PASSWORD_HEADING","Chnage User's Password");//change_user_password.php  
define("ADMIN_PANEL_CHANGE_USER_PASSWORD_TITLE","Change Password for any User"); //change_user_password.php 
define("USER_CPANEL_PROFILE_PASSWORD_HEADING","Change Your Password");
define("USER_CPANEL_PROFILE_PASSWORD_CHANGE_NEW_PASS","New Password");
define("USER_CPANEL_PROFILE_PASSWORD_CHANGE_CONFIRM_PASS","Confirm Password");



//Student Courses List  courses_list.php
define("STUDENT_COURSE_LIST_HEADING","Course Avaliable to you");

//Student My Courses
define("STUDENT_COURSE_MY_COURSES_HEADING","My Courses");
define("STUDENT_COURSE_MY_MY_CLASSES_HEADING","My Classes");

// Teacher
define("TEACHER_LIBRARY_UPLOAD_HEADING","Upload Files to Your Library"); //teacher_upload_lib_meterials.php
define("TEACHER_LIBRARY_UPLOAD_TITLE","Upload E-Meterials to the Library");  //teacher_upload_lib_meterials.php  , Form Legend Title
define("VIEW_LABEL_SELECT_LIBRARY","Select your Library");//teacher_upload_lib_meterials.php
define("VIEW_LABEL_SELECT_LIBRARY_FILE_UPLOAD_NOTE","Choose File to Upload (.zip, pdf and .rar files only)");//teacher_upload_lib_meterials.php
// Teacher  Library
define("TEACHER_LIBRARY_NEW_HEADING","Create New Library"); //teacher_library_new.php
define("TEACHER_LIBRARY_NEW_TITLE","New Library"); //teacher_library_new.php
define("TEACHER_LIBRARY_SELECT_TEACHER","Select Teacher ID to Create Library for Him"); //teacher_library_new.php


define("TEACHER_LIBRARY_VIEW_HEADING","Teacher's Electronic Library Details");//teacher_library_view.php
define("TEACHER_LIBRARY_VIEW_SUB_TITLE_1","Library Details"); //teacher_library_view.php
define("TEACHER_LIBRARY_VIEW_SUB_TITLE_2","Meterial Uploaded for this Library");//teacher_library_view.php
 
define("TEACHER_LIBRARY_LIST_HEADING","Teacher's Electronic Libraries List"); //teacher_libraries_list.php
 
define("TEACHER_LIBRARY_EDIT_HEADING"," Update Teacher's Electronic Library"); //teacher_libraries_edit.php
 
 
define("TEACHER_COURSE_SCHEDULE_VC_HEADING","Add Teacher's Courses Virtual Class Schedule"); //teacher_courses_schedule_vc.php
define("TEACHER_COURSE_SCHEDULE_VC_TITLE","Schedule your Course"); //teacher_courses_schedule_vc.php

//Teacher course
define("TEACHER_COURSE_NEW_HEADING"," Add New Course "); //teacher_courses_new.php
define("TEACHER_COURSE_NEW_TITLE","Add your New Course "); //teacher_courses_new.php 

define("TEACHER_COURSE_LIST_HEADING"," Teacher's Courses List "); //teacher_courses_list.php
 
//Teacher Add Student to Course
 
define("TEACHER_COURSE_GET_ENROLL_STUDENT_HEADING","Choose a Course to Add Students to It"); //enrolling_student_get_course_list.php
 
define("TEACHER_COURSE_ENROLL_STUDENT_HEADING","Add Students to Selected Course "); //enrolling_student_add_to_course.php

define("TEACHER_COURSE_EDIT_DETAILS_HEADING","Update Course Details"); //edit_course_details.php
 
define("TEACHER_ACCOUNT_REGISTRATION_HEADING","Teacher Account Registration"); //teacher_registration.php

define("TEACHER_ACCOUNT_REGISTRATION_TITLE","Teacher Account Registration"); //teacher_registration.php  

define("TEACHER_ENROLLED_STUDENT_LIST_HEADING","Enrolled Students List"); //enrolled_student_list.php 


//Administrator Panel
define("ADMIN_PANEL_COURSES_LIST_HEADING","Avaliable Course List"); //create_new_course.php 
define("ADMIN_PANEL_UPDATE_COURSE_HEADING","Update Course Details"); //edit_course_details.php 
define("ADMIN_PANEL_UPDATE_COURSE_TITLE","Modify Course Details"); //edit_course_details.php 

define("ADMIN_PANEL_ACCOUNT_STATUS","Account Status"); 
define("ADMIN_PANEL_USER_GROUP","Group");
define("ADMIN_PANEL_ACCOUNT_REGISTRATION_HEADING","Create New Account");
define("ADMIN_PANEL_ACCOUNT_REGISTRATION_TITLE","Create New Account");  
define("CLASS_SHEDULE_HEADING","Your Scheduled Classes"); // teacher_courses_schedule_vc_list.php 
define("ADMIN_PANEL_USERS_LIST_HEADING","Users Accounts"); 

//Added to User Profile
define("USER_CPANEL_PROFILE_ADDRESS_LABEL","Your Address"); 
define("USER_CPANEL_PROFILE_FULL_NAME_LABEL","Your Name");
define("USER_CPANEL_PROFILE_CONTACT_LABEL","Contact Phone"); 
define("USER_CPANEL_PROFILE_OTHER_INFO_LABEL","Other Inforamation");
define("USER_CPANEL_PROFILE_UPDATE_NOW_LABEL","Upate Now"); 

// Link Names
define("LINK_OVERVIEW","Overview");
define("LINK_GALLERY","Gallery");
define("LINK_PRESS_NEWS","Press News");   

// News Page
define("NEWS_LABEL_DIRECTION","Direction");
define("NEWS_LABEL_HTML_LANG","HtmlLang");
define("NEWS_LABEL_LANGUAGE_NAME","Language Name");
define("NEWS_LABEL_NEWS_TITLE","News Title");
define("NEWS_LABEL_NEWS_TEXT","News Text"); 

//User Control Panel Top Navigation Bar Menus
define("USER_CPANEL_MENU_PROFILE","Profile"); 
define("USER_CPANEL_MENU_CHANGE_PASSWORD","Change Password"); 
define("USER_CPANEL_MENU_LOGOUT","Logout"); 
define("USER_CPANEL_MENU_USER_MGMT","User's Management"); 
define("USER_CPANEL_MENU_SHOW_USER_LIST","Show Users List"); 
define("USER_CPANEL_MENU_REGISTER_NEW_USER","Register New User"); 
define("USER_CPANEL_MENU_CHANGE_USER_PASSWORD","Change User's Password"); 
define("USER_CPANEL_MENU_LIBRARY","Library"); 
define("USER_CPANEL_MENU_MY_LIBRARY","My Libraries");
define("USER_CPANEL_MENU_TEACHER_LIBRARIES","Teacher Libraries"); 
define("USER_CPANEL_MENU_NEW_LIBRARY","New Library"); 
define("USER_CPANEL_MENU_UPLOAD_DATA","Upload Data"); 
define("USER_CPANEL_MENU_COURSES","Courses");
define("USER_CPANEL_MENU_MY_COURSES_LIST","My Courses List");  
define("USER_CPANEL_MENU_COURSES_LIST","Courses List"); 
define("USER_CPANEL_MENU_NEW_COURSES","New Courses"); 
define("USER_CPANEL_MENU_ENROLL_NEW_STUDENT","Enroll New Students"); 
define("USER_CPANEL_MENU_ENROLLED_STUDENTS_LIST","Enrolled Students List"); 
define("USER_CPANEL_MENU_PAYMENTS","Payments"); 
define("USER_CPANEL_MENU_CLASSES","Classes"); 
define("USER_CPANEL_MENU_SCHEDULE_CLASSES","Schedule Classes"); 
define("USER_CPANEL_MENU_MY_CLASSES","My Classes"); 
define("USER_CPANEL_MENU_TOOLS","Tools"); 
define("USER_CPANEL_MENU_NEWS","News"); 
define("USER_CPANEL_MENU_LOGIN","Login"); 
define("USER_CPANEL_MENU_REGISTER_STUDENT","Register as Student"); 
define("USER_CPANEL_MENU_REGISTER_TEACHER","Register as Teacher"); 

//Action Menu Confirmation Messages
define("ACTION_MSG_CONFIRM_PAYMENT","Pay students course fee?");
define("ACTION_MSG_CONFIRM_DELETE","Do you want to DELETE this record");
define("ACTION_MSG_CONFIRM_EDIT","Do you want to EDIT this record");
?>