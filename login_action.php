<?php



include 'db.php';




    // Process signup submission
    $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);


    if ($db) {
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $password = substr(md5($_POST['password']),0,32);
    $error = 0;
    
          
    $sql = "SELECT name, email, password_digest, id FROM users WHERE email='$email' AND password_digest='$password'";
    $sql1 = "SELECT email FROM users WHERE email='$email'";
    $sql2 = "SELECT password_digest FROM users WHERE email='$email'";


    $result=mysql_query($sql,$db);
    $dbdata = mysql_fetch_array($result);
    $dbexist = mysql_num_rows($result);

    $result1 = mysql_query($sql1,$db);
    $dbdata1 = mysql_fetch_array($result1);
    $dbexist1 = mysql_num_rows($result1);
    
    $result2 = mysql_query($sql2,$db);
    $dbdata2 = mysql_fetch_array($result2);
    $dbexist2 = mysql_num_rows($result2);

    if(empty($email) || empty($password)){
        $_SESSION["error"] = 4;
        header("Location: login.php");
    }


    //Sucesso
    else if($dbdata['email']==$email && $dbdata['password_digest']==$password){
        $_SESSION["id"] = $dbdata['id'];
        $_SESSION["name"] = $dbdata['name'];
        $_SESSION["error"] = 2;
        header("Location: index.php");
    }
    //Password Errada
    else if($dbdata1['email']==$email && $dbdata2['password_digest']!=$password){
        $_SESSION["error"] = 1;
        header("Location: login.php?email=$email");
    }
    //Nao existe
    else if($dbexist1==0){
        $_SESSION["error"] = 3;
        header("Location: login.php");
    }

    }


?>