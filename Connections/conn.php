<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn = "localhost";
$database_conn = "noonacad_eschool";
$username_conn = "noonacad_admin";
$password_conn = "zorkif_123";
@$conn = mysql_pconnect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR); 
@mysql_query("SET NAMES 'utf8'");
@mysql_query('SET CHARACTER SET utf8');
mb_internal_encoding('utf-8');

// Define Time Zone for Your Application
date_default_timezone_set('Asia/Riyadh');
// date_default_timezone_get();

?>