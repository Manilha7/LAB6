<?php



include 'db.php';


    require_once('/usr/share/php/smarty/libs/Smarty.class.php');
    $smarty = new Smarty();



    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';


    // Process signup submission
    $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);


    if ($db) {
    $name=$_POST["name"];
    $email = $_POST["email"];
    $password = substr(md5($_POST['password']),0,32);
    $error = -1;
    
          
    $sql = "SELECT * FROM users WHERE email='$email' AND password_digest='$password'";


    $result=mysql_query($sql,$db);
    $dbdata = mysql_fetch_array($result);

    $nrows  = mysql_num_rows($result);
    if ($nrows>0) {
        $_SESSION["error"] = -1;

        header("Location: login_template.tpl");
    }
    else {
        $_SESSION["id"] = $dbdata['id'];
        $_SESSION["name"] = $dbdata['name'];
        $_SESSION["error"] = 0;
        $smarty->assign("MENU_1","Home");
        $smarty->assign("MENU_2","Logout");
        $smarty->assign("MENU_3",$name);
        header("Location: index.php");
    }
    
    }


?>