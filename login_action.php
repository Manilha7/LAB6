<?php



include 'db.php';

    // Process signup submission
    $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);


    if ($db) {
    $name=$_POST["name"];
    $email = $_POST["email"];
    $password = substr(md5($_POST['password']),0,32);
    $error = -1;
    
          
     $sql = "SELECT name, email, password_digest, id FROM users WHERE email='$email' AND password_digest='$password'";
    $sql_email = "SELECT email FROM users WHERE email='$email'";
    $sql_pass = "SELECT password_digest FROM users WHERE email='$email'";
   

    mysql_query($sql,$db);
    $result = mysql_query($sql,$db);
    $dbdata = mysql_fetch_array($result);
    $dbexist = mysql_num_rows($result);
    
    $result_email = mysql_query($sql_email,$db);
    $dbdata_email = mysql_fetch_array($result_email);
    $dbexist_email = mysql_num_rows($result_email);
    
    $result_pass = mysql_query($sql_pass,$db);
    $dbdata_pass = mysql_fetch_array($result_pass);
    


    //sucesso
    if($dbdata==$email && $dbdata==$password){
        $_SESSION["id"] = $dbdata['id'];
        $_SESSION["name"] = $dbdata['name'];
        $_SESSION["error"] = 0;
        header("Location: index.php");
    }
    // insucesso
     else if(($dbdata1==$email && $dbdata_pass!=$password) || $dbexist_email==0 ){
        $_SESSION["error"] = -1;
        header("Location: login.php?email=$email");
    }
    }


?>