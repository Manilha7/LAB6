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

    //Sucesso
    if($error==-1){
        $Erro='Sucesso';
        $smarty->display('message_template.html');
        $smarty->assign('MESSAGE', $Erro);
        $smarty->parseCurrentBlock();
    }
    //Insucesso
    else if($error==1){
        $Erro='Password Incorreta';
        $smarty->assign('MESSAGE', $Erro);
        $smarty->assign('EMAIL', $email);
        session_destroy();
    }
    

    
    $smarty->assign("MENU_1","Home");
    $smarty->assign("MENU_2","Register");
    $smarty->assign("MENU_3","Login");
    $smarty->assign("href1","index.php");
    $smarty->assign("href2","register.php");
    $smarty->assign("href3","login.php");
    $smarty->display('login_template.tpl');


?>
