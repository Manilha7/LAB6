<?php

include 'db.php';
session_start();
// put full path to Smarty.class.php
require('/usr/share/php/smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);



$query  = "SELECT name,microposts.created_at,microposts.updated_at,microposts.user_id,content FROM users INNER JOIN microposts ON users.id = microposts.user_id ORDER BY microposts.updated_at DESC;";

if(!($result = @ mysql_query($query,$db)))
    die("Erro " . mysql_errno() . " : " . mysql_error());

$nrows  = mysql_num_rows($result);
for($i=0; $i<$nrows; $i++)
    $tuple[$i] = mysql_fetch_array($result,MYSQL_ASSOC);

$smarty->assign('baseLab4',$tuple);
$smarty->assign("MENU_1","Home");

$smarty->assign("MENU_2","Register");
$smarty->assign("MENU_3","Login");
$smarty->assign("href1","index.php");
$smarty->assign("href2","register.php");
$smarty->assign("href3","login.php");

$name=$_SESSION['name'];
if (isset($_SESSION['name'])) {
	$smarty->assign("MENU_2","Welcome ".$name);
	$smarty->assign("MENU_3","Logout");
	$smarty->assign("href2","blog.php");
	$smarty->assign("userId",$_SESSION['id']);
	$smarty->assign("href3","logout_action.php");

}




$smarty->display('index_template.tpl');
mysql_close();
?>
