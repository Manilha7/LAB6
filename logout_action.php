<?php

include 'db.php';

require('/usr/share/php/smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

session_start();
session_unset();
session_destroy();
$Message= "See you back soon!";
$smarty->assign("Message",$Message);
$smarty->display('message_template.tpl')
?>
