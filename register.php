<?php

// put full path to Smarty.class.php
require_once('/usr/share/php/smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';


if (isset($_GET['Error'])) {
	$username=$_GET['username'];
     $email=$_GET['email'];
}	



function errorMessage($Error){

    if ($Error==0) {
        return "Todos os campos devem ser preenchidos";
    }
    elseif ($Error==1) {
    	 return  "Email já existe na base de dados";
    }
    elseif ($Error==2) {
    	return "Email tem formato incorrecto";
    }
    elseif ($Error==3) {
    	return "Password em branco";
    }
    elseif ($Error==4) {
    	 return "Passwords não coincidem";
    } else return "Error desconhecido";
}

if(isset($_GET['Error']))
    $MessageError=errorMessage($_GET['Error']);
else $MessageError = -1;


	
	$smarty->assign("username",$username);
	$smarty->assign("email",$email);
	$smarty->assign("MessageError",$MessageError);
    $smarty->assign("MENU_1","Home");
    $smarty->assign("MENU_2","Register");
    $smarty->assign("MENU_3","Login");
    $smarty->assign("href1","index.php");
    $smarty->assign("href2","register.php");
    $smarty->assign("href3","login.php");
    $smarty->display('register_template.tpl');


?>
