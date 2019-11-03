<?php



include 'db.php';




    // Process signup submission
    $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);


    if ($db) {
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $password = substr(md5($_POST['password']),0,32);
    $error = 0;
    
          
    $sql = "SELECT name, id FROM users WHERE email='$email' AND password_digest='$password'";


    $result=mysql_query($sql,$db);
    

    
    //Sucesso
    if($dbdata['email']==$email && $dbdata['password_digest']==$password){
        $_SESSION["id"] = $dbdata['id'];
        $_SESSION["name"] = $dbdata['name'];
        $_SESSION["error"] = 2;
        header("Location: index.php");
    }
    
    }


?>