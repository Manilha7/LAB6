<?php

include 'db.php';
session_start();
// put full path to Smarty.class.php
require_once('/usr/share/php/smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

 
    
    $smarty->assign("MENU_1","Home");
    $smarty->assign("MENU_2","Register");
    $smarty->assign("MENU_3","Login");
    $smarty->assign("href1","index.php");
    $smarty->assign("href2","register.php");
    $smarty->assign("href3","login.php");
  
    print_r($_SESSION);
    //Sucesso
    if($error==0){
        $Erro= 0;
        $smarty->assign('MESSAGE', $Erro);
    }
    elseif($error==-1){
        $Erro='Wrong email or password';
        $smarty->assign('MESSAGE', $Erro);
        session_destroy();
    }


        //$smarty->display('login_template.tpl');

    
?>
