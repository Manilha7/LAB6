<?php



include 'db.php';




    // Process signup submission
    $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);


    if ($db) {
    $name=$_POST["name"];
    $email = $_POST["email"];
    $password = substr(md5($_POST['password']),0,32);
    $error = -1;
    
          
    $sql = "SELECT * FROM users WHERE email='$email' AND password_digest='$password'";


    $result=mysql_query($sql,$db);
    
    if(!($result = @ mysql_query($sql,$db)))
        die("Erro " . mysql_errno() . " : " . mysql_error());

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