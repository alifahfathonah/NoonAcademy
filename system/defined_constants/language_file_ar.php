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
define("LOGIN_FORM_HEADING","مستخدم تسجيل الدخول");
define("LOGIN_FORM_TITLE","معلومات الدخول");
define("LOGIN_FORM_USERNAME_LABEL","اسم المستخدم");
define("LOGIN_FORM_PASSWORD_LABEL","كلمة المرور");
define("LOGIN_FORM_SUBMIT_BUTTON","دخول");
define("LOGIN_FORM_FAILED_LOGIN_HEADING","Login Failed");

// User's Control Panel 
define("USER_CPANEL_WELCOME","مرحبا"); //cpanel_session_menu_en.php
define("USER_CPANEL_TITLE_HEADING","لوحة التحكم");//cpanel.php
define("USER_CPANEL_PROFILE_HEADING","صفحة المستخدم"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_FIRST_NAME_LABEL","الاسم الأول :"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_MIDDLE_NAMES_LABEL","الاسم الثاني :"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_LAST_NAME_LABEL","الاسم الاخير :"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_FULLNAME_LABEL","اسم الكامل");

define("USER_CPANEL_PROFILE_ADDRESS_LINE1_LABEL","العنوان الاول"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_ADDRESS_LINE2_LABEL","العنوان الثاني"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_EMAIL_LABEL","الايميل"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_COUNTRY_NAME_LABEL","الدولة"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_CONTACT_NO_LABEL","رقم التواصل"); //user_profile_view.php ,user_profile.php

define("USER_CPANEL_PROFILE_COMPANY_NAME_LABEL","الشركة <em>اختياري</em>"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_WEB_SITE_LABEL","الموقع الالكتروني"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_PHONE_LABEL","رقم الجوال"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_CITY_LABEL","المدينة"); //user_profile_view.php ,user_profile.php
define("USER_CPANEL_PROFILE_COMMENTS_LABEL","تعليقات"); //user_profile_view.php ,user_profile.php

define("USER_CPANEL_PROFILE_UPLOAD_PICTURES_LABEL","رفع صورة"); //user_profile_view.php ,user_profile.php 
 
define("USER_CPANEL_PROFILE_USERNAME_LABEL","اسم المستخدم"); //student_registration.php ,teacher_registration.php 
define("USER_CPANEL_PROFILE_PASSWORD_LABEL","كلمة المرور"); //student_registration.php ,teacher_registration.php 
define("USER_CPANEL_PROFILE_SUBMIT_BUTTON","انشاء حساب"); //student_registration.php ,teacher_registration.php 


//General Global Buttons
// These Buttons are Used in multiple forms where they fit.
define("SUBMIT_BUTTON_SAVE","حفظ");
define("SUBMIT_BUTTON_NEXT","التالي");
define("SUBMIT_BUTTON_SAVE_CHANGES","حفظ التغييرات");  
define("SUBMIT_BUTTON_CHANGE_PASSWORD","تغيير كلمة المرور"); 
define("SUBMIT_BUTTON_UPLOAD","رفع");
define("SUBMIT_BUTTON_CREATE_NEW","انشاء جديد");
define("SUBMIT_BUTTON_CREATE_SCHEDULE","انشاء جدول");


//Global Contasts Used in Multiple Forms
define("ACTION_BUTTONS_TITLE","الاجراء"); 
define("VIEW_LABEL_CHOOSE","اختر"); 
define("VIEW_LABEL_SUBJECT_TITLE","الموضوع");
define("VIEW_LABEL_SUBJECT_SUB_TITLE","عنوان فرعي");
define("VIEW_LABEL_COURSE_NAME","اسم المادة");
define("VIEW_LABEL_DESCRIPTION","وصف");
define("VIEW_LABEL_START_DATE","تاريخ البدء");
define("VIEW_LABEL_END_DATE","تاريخ الانتهاء");
define("VIEW_LABEL_COURSE_FEE","تكلفة المادة");
define("VIEW_LABEL_CLASS_ID","رقم المادة");
define("VIEW_LABEL_CLASS_SCREEN_NAME","الاسم العام");
define("VIEW_LABEL_JOIN_CLASS","الالتحاق بالصف");
define("VIEW_LABEL_CREATE_AT","تاريخ الانشاء");
define("VIEW_LABEL_UPDATE_AT","تاريخ التحميل");
define("VIEW_LABEL_DOWNLOADABLE","السماح بالتحميل");
define("VIEW_LABEL_ENROLLABLE","السماح بالالتحاق");
define("VIEW_LABEL_SHARE_WITH","مشاركة مع");
define("VIEW_LABEL_TITLE","العنوان");
define("VIEW_LABEL_TIMMING","المواعيد");
define("VIEW_LABEL_DURATION","المدة");
define("VIEW_LABEL_DURATION_IN_MINUTES","دقائق");
define("VIEW_LABEL_DAY","اليوم");
define("VIEW_LABEL_DATED","تاريخ الانشاء");
define("VIEW_LABEL_TEACHER","الأستاذ");
define("VIEW_LABEL_CHOOSE_TEACHER_LIBRARY","اختر المكتبة");
define("VIEW_LABEL_TEACHER_LIBRARY","مكتبة الاستاذ");
define("VIEW_LABEL_UPLOAD_CONTENT_FILE","رفع ملفات مادة");
define("VIEW_LABEL_MAX_NO_OF_STUDENTS","عدد الطلاب الاقصى");
define("VIEW_LABEL_TOTAL_NO_OF_CLASSES","عدد المحاضرات");
define("VIEW_LABEL_UPLOAD_CONTENT","رفع ملف مادة جديد");
define("VIEW_LABEL_UPLOAD_CONTENT_SHORT_NOTE","<em class=\"small\">* اذا أردت تحديث ملف المادة , الرجاء اعادة رفعه هنا  </em>");
define("VIEW_LABEL_DOWNLOAD","تحميل");
define("VIEW_LABEL_DOWNLOAD_RECORDING","تحميل فيديو");
define("VIEW_LABEL_START","يبدأ");
define("VIEW_LABEL_VIEW","عرض");

//Navigation Buttons
define("VIEW_LABEL_MOVE_FIRST","الاولى");
define("VIEW_LABEL_MOVE_PREVIOUS","السابق");
define("VIEW_LABEL_MOVE_NEXT","التالي");
define("VIEW_LABEL_MOVE_LAST","الاخير");

//Name of Days
define("VIEW_LABEL_SUNDAY","الاحد");
define("VIEW_LABEL_MONDAY","الاثنين");
define("VIEW_LABEL_TUESDAY","الثلاثاء");
define("VIEW_LABEL_WEDNESDAY","الاربعاء");
define("VIEW_LABEL_THURSDAY","الخميس");
define("VIEW_LABEL_FRIDAY","الجمعه");
define("VIEW_LABEL_SATURDAY","السبت");


// GENERAL HEADING LABLES
define("VIEW_LABEL_HEADING_EXPIRED_COURSES","إنتهت صلاحية المقررات");
define("VIEW_LABEL_HEADING_EXPIRED_CLASSES","إنتهت صلاحية فئات");
define("STUDENT_COURSE_MY_UNPAID_COURSES_HEADING","غير المدفوعة المقررات");
define("STUDENT_COURSE_MY_PAID_COURSES_HEADING","دفع المقررات");

// Main Navigation Menu Bar
define("HEADER_NAV_ABOUT_US","من نحن");
define("HEADER_NAV_SERVICES","الخدمات");
define("HEADER_NAV_SUPPORT","الدعم الفني");
define("HEADER_NAV_COURSES","مواد");

// Change Password
define("USER_CPANEL_PROFILE_ADMIN_USER_PASSWORD_HEADING","تغيير كلمة مرور المستخدم");//change_user_password.php  
define("ADMIN_PANEL_CHANGE_USER_PASSWORD_TITLE","تغيير كلمة المرور لأي مستخدم"); //change_user_password.php 
define("USER_CPANEL_PROFILE_PASSWORD_HEADING","تغيير كلمة المرور");
define("USER_CPANEL_PROFILE_PASSWORD_CHANGE_NEW_PASS","كلمة المرور الجديدة");
define("USER_CPANEL_PROFILE_PASSWORD_CHANGE_CONFIRM_PASS","تأكيد كلمة المرور");



//Student Courses List  courses_list.php
define("STUDENT_COURSE_LIST_HEADING","المواد المتاحة لك");

//Student My Courses
define("STUDENT_COURSE_MY_COURSES_HEADING","المواد الدراسية");
define("STUDENT_COURSE_MY_MY_CLASSES_HEADING","محاضراتي");

// Teacher
define("TEACHER_LIBRARY_UPLOAD_HEADING","رفع ملفات لمكتبتي"); //teacher_upload_lib_meterials.php
define("TEACHER_LIBRARY_UPLOAD_TITLE","تحميل محتوى تعليمي للمكتبة");  //teacher_upload_lib_meterials.php  , Form Legend Title
define("VIEW_LABEL_SELECT_LIBRARY","اختر مكتبتك");//teacher_upload_lib_meterials.php
define("VIEW_LABEL_SELECT_LIBRARY_FILE_UPLOAD_NOTE","اختر الملف للتحميل (.zip, pdf and .rar files only)");//teacher_upload_lib_meterials.php

// Teacher  Library
define("TEACHER_LIBRARY_NEW_HEADING","انشاء مكتبة جديدة"); //teacher_library_new.php
define("TEACHER_LIBRARY_NEW_TITLE","مكتبة جديدة"); //teacher_library_new.php
define("TEACHER_LIBRARY_SELECT_TEACHER","اختر المعلم حتى يتم انشاء مكتبة له"); //teacher_library_new.php

 
define("TEACHER_LIBRARY_VIEW_HEADING","معلومات المكتبات ");//teacher_library_view.php
define("TEACHER_LIBRARY_VIEW_SUB_TITLE_1","معلومات المكتبة"); //teacher_library_view.php
define("TEACHER_LIBRARY_VIEW_SUB_TITLE_2","مواد اضيفت لهذه المكتبة");//teacher_library_view.php
 
define("TEACHER_LIBRARY_LIST_HEADING","قائمة المكتبات الالكترونية"); //teacher_libraries_list.php
 
define("TEACHER_LIBRARY_EDIT_HEADING"," تحديث المكتبة"); //teacher_libraries_edit.php
 
 
define("TEACHER_COURSE_SCHEDULE_VC_HEADING","ضافة جدول"); //teacher_courses_schedule_vc.php
define("TEACHER_COURSE_SCHEDULE_VC_TITLE","جدولة المحاضرات"); //teacher_courses_schedule_vc.php

//Teacher course
define("TEACHER_COURSE_NEW_HEADING"," اضافة مادة جديدة "); //teacher_courses_new.php
define("TEACHER_COURSE_NEW_TITLE","اضافة مادة جديدة "); //teacher_courses_new.php 

define("TEACHER_COURSE_LIST_HEADING","قائمة المواد التعليمية "); //teacher_courses_list.php
 
//Teacher Add Student to Course
 
define("TEACHER_COURSE_GET_ENROLL_STUDENT_HEADING","اختر المادة لالحاق الطلبة بها"); //enrolling_student_get_course_list.php
 
define("TEACHER_COURSE_ENROLL_STUDENT_HEADING","الحاق الطلبة بالمادة المختارة "); //enrolling_student_add_to_course.php

define("TEACHER_COURSE_EDIT_DETAILS_HEADING","تحديث معلومات المادة"); //edit_course_details.php
 
define("TEACHER_ACCOUNT_REGISTRATION_HEADING","تسجيل حساب معلم"); //teacher_registration.php

define("TEACHER_ACCOUNT_REGISTRATION_TITLE","تسجيل حساب معلم"); //teacher_registration.php

define("TEACHER_ENROLLED_STUDENT_LIST_HEADING","قائمة الطلبة الملتحقين"); //enrolled_student_list.php   



//Administrator Panel
define("ADMIN_PANEL_COURSES_LIST_HEADING","قائمة المواد المتاحة"); //create_new_course.php 
define("ADMIN_PANEL_UPDATE_COURSE_HEADING","تحديث معلومات المادة"); //edit_course_details.php 
define("ADMIN_PANEL_UPDATE_COURSE_TITLE","تعديل معلومات المادة"); //edit_course_details.php 

define("ADMIN_PANEL_ACCOUNT_STATUS","حالة الحساب"); 
define("ADMIN_PANEL_USER_GROUP","مجموعة");
define("ADMIN_PANEL_ACCOUNT_REGISTRATION_HEADING","انشاء حساب");
define("ADMIN_PANEL_ACCOUNT_REGISTRATION_TITLE","انشاء حساب");
define("CLASS_SHEDULE_HEADING","المحاضرات المجدولة"); // teacher_courses_schedule_vc_list.php 
define("ADMIN_PANEL_USERS_LIST_HEADING","حسابات المستخدمين");

//Added to User Profile
define("USER_CPANEL_PROFILE_ADDRESS_LABEL","العنوان"); 
define("USER_CPANEL_PROFILE_FULL_NAME_LABEL","الاسم");
define("USER_CPANEL_PROFILE_CONTACT_LABEL","رقم الاتصال"); 
define("USER_CPANEL_PROFILE_OTHER_INFO_LABEL","معلومات اخرى");
define("USER_CPANEL_PROFILE_UPDATE_NOW_LABEL","تحديث");  

// Link Names
define("LINK_OVERVIEW","نظرة عامة");
define("LINK_GALLERY","المعرض");
define("LINK_PRESS_NEWS","أخبار الصحافة");

// News Page
define("NEWS_LABEL_DIRECTION","اتجاه");
define("NEWS_LABEL_HTML_LANG","اللغة HTML");
define("NEWS_LABEL_LANGUAGE_NAME","اللغة اسم");
define("NEWS_LABEL_NEWS_TITLE","عنوان الخبر"); 
define("NEWS_LABEL_NEWS_TEXT","الخبر"); 

//User Control Panel Top Navigation Bar Menus
define("USER_CPANEL_MENU_PROFILE","الصفحة الشخصية"); 
define("USER_CPANEL_MENU_CHANGE_PASSWORD","تغيير كلمة المرور"); 
define("USER_CPANEL_MENU_LOGOUT","خروج"); 
define("USER_CPANEL_MENU_USER_MGMT","ادارة المستخدمين"); 
define("USER_CPANEL_MENU_SHOW_USER_LIST","عرض قائمة المستخدمين"); 
define("USER_CPANEL_MENU_REGISTER_NEW_USER","تسجيل مستخدم جديد"); 
define("USER_CPANEL_MENU_CHANGE_USER_PASSWORD","تغيير كلمة المرور لمستخدم"); 
define("USER_CPANEL_MENU_LIBRARY","المكتبة"); 
define("USER_CPANEL_MENU_MY_LIBRARY","مكتبتي");
define("USER_CPANEL_MENU_TEACHER_LIBRARIES","مكتبات المعلم"); 
define("USER_CPANEL_MENU_NEW_LIBRARY","مكتبة جديدة"); 
define("USER_CPANEL_MENU_UPLOAD_DATA","رفع ملفات"); 
define("USER_CPANEL_MENU_COURSES","المواد");
define("USER_CPANEL_MENU_MY_COURSES_LIST","قائمة المواد");  
define("USER_CPANEL_MENU_COURSES_LIST","قائمة جميع المواد"); 
define("USER_CPANEL_MENU_NEW_COURSES","مادة جديدة"); 
define("USER_CPANEL_MENU_ENROLL_NEW_STUDENT","الحاق طلاب جدد"); 
define("USER_CPANEL_MENU_ENROLLED_STUDENTS_LIST","قائمة الطلاب الملتحقين"); 
define("USER_CPANEL_MENU_PAYMENTS","الدفع"); 
define("USER_CPANEL_MENU_CLASSES","المحاضرات"); 
define("USER_CPANEL_MENU_SCHEDULE_CLASSES","جدولة المحاضرات"); 
define("USER_CPANEL_MENU_MY_CLASSES","محاضراتي"); 
define("USER_CPANEL_MENU_TOOLS","أدوات"); 
define("USER_CPANEL_MENU_NEWS","أخبار"); 
define("USER_CPANEL_MENU_LOGIN","دخول"); 
define("USER_CPANEL_MENU_REGISTER_STUDENT","تسجيل كطالب"); 
define("USER_CPANEL_MENU_REGISTER_TEACHER","تسجيل كمعلم"); 

//Action Menu Confirmation Messages
define("ACTION_MSG_CONFIRM_PAYMENT","دفع الطالب دورة");
define("ACTION_MSG_CONFIRM_DELETE","هل تريد حذف هذا السجل");
define("ACTION_MSG_CONFIRM_EDIT","هل تريد تحديث هذا السجل");
?>