<?php

include 'db.php';
session_start();
// put full path to Smarty.class.php
require_once('/usr/share/php/smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

 
    
    $smarty->assign("MENU_1","Home");
    $smarty->assign("MENU_2",$name);
    $smarty->assign("MENU_3","Logout");
    $smarty->assign("href1","index.php");
    $smarty->assign("href3","logout.php");
    $smarty->display('login_template.tpl');

    $error = $_SESSION["error"];
    $name = $_SESSION["name"];
    $email = $_GET["email"];


    //Sucesso
    if($error==0){
        $Erro='Sucesso';
        $smarty->assign('MESSAGE', $Erro);
    }
    if($error==-1){
        $Erro='Username Incorreto ou Password Incorreta';
        $smarty->assign('MESSAGE', $Erro);
        $smarty->assign('email', $email);
        session_destroy();
    }    
     

    $smarty->parseCurrentBlock();
    
?>
