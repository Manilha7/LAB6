<?php

include 'db.php';

// put full path to Smarty.class.php
require('/usr/share/php/smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);


// criar query numa string
$query  = "SELECT name,microposts.created_at,microposts.updated_at, content FROM users INNER JOIN microposts ON users.id = microposts.user_id ORDER BY microposts.updated_at DESC;";
// executar a query
if(!($result = @ mysql_query($query,$db)))
    die("Erro " . mysql_errno() . " : " . mysql_error());
// vai buscar o resultado da query
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


if ($MESSAGE eq "Sucesso") {
	$smarty->assign("MENU_2","Welcome".$nome);
	$smarty->assign("MENU_3","Logout");
	$smarty->assign("href2","");
	$smarty->assign("href3","logout_action.php");

}


$smarty->display('index_template.tpl');
mysql_close();
?>
