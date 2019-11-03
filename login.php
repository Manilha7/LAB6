<?php
session_start();
// put full path to Smarty.class.php
require_once('/usr/share/php/smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';


$query  = "SELECT * FROM users INNER JOIN users ON microposts.user_id=users.id ORDER BY microposts.updated_at DESC";


$error = $_SESSION["error"];
$name = $_SESSION["name"];
$email = $_GET["email"];

    if($error==4){
        $MessageError='Preencha todos os campos';
        $smarty->assign('MessageError', $MessageError);
        session_destroy();
    }
    //Sucesso
    else if($error==2){
        $MessageError='Sucesso';
        $smarty->display('register_sucess.html');
        $smarty->assign('MessageError', $MessageError);
        $smarty->parseCurrentBlock();
    }
    //Password Errada
    else if($error==1){
        $MessageError='Password Incorreta';
        $smarty->assign('MessageError', $MessageError);
        $smarty->setVariable('email', $email);
        session_destroy();
    }
    //Nao existe
    else if($error==3){
        $MessageError='Utilizador nao Existe';
        $smarty->assign('MessageError', $MessageError);
        session_destroy();
    }

    $smarty->assign("MENU_1","Home");
    $smarty->assign("MENU_2","Register");
    $smarty->assign("MENU_3","Login");
    $smarty->display('login_template.tpl');


?>
