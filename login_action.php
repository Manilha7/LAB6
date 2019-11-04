<?php



include 'db.php';


    // Process signup submission
    $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);


    if ($db) {
    $name=$_POST["name"];
    $email = $_POST["email"];
    $password = substr(md5($_POST['password']),0,32);
    $error = -1;
    
          
    $sql = "SELECT * FROM users WHERE email='$email'";
    $sql1 = "SELECT email FROM users WHERE email='$email'";
    $sql2 = "SELECT password_digest FROM users WHERE email='$email'";
   

     mysql_query($sql,$db);
    $result = mysql_query($sql,$db);
    $dbdata = mysql_fetch_array($result);
    $dbexist = mysql_num_rows($result);
    
    $result1 = mysql_query($sql1,$db);
    $dbdata1 = mysql_fetch_array($result1);
    $dbexist1 = mysql_num_rows($result1);
    
    $result2 = mysql_query($sql2,$db);
    $dbdata2 = mysql_fetch_array($result2);
    $dbexist2 = mysql_num_rows($result2);


    //sucesso
    if($dbdata['email']==$email && $dbdata['password_digest']==$password){
        $_SESSION["id"] = $dbdata['id'];
        $_SESSION["name"] = $dbdata['name'];
        $_SESSION["error"] = 0;
        header("Location: index.php");
    }
    // insucesso
     else if(($dbdata1['email']==$email && $dbdata2['password_digest']!=$password) || $dbexist1==0 ){
        $_SESSION["error"] = -1;
        header("Location: login.php?email=$email");
    }
    }


?>