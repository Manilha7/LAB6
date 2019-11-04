
<?php



include 'db.php';
    session_start();
    // Process signup submission
    $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);


    if ($db) {
    $email = $_POST["email"];
    $password = substr(md5($_POST['password']),0,32);
    $error = -1;
    
          
    $sql = "SELECT * FROM users WHERE email='$email' AND password_digest='$password'";
   

    $result = mysql_query($sql,$db);
    $dbexist = mysql_num_rows($result);
    $dbdata = mysql_fetch_array($result,MYSQL_ASSOC);
    
    if ($dbexist > 0) {
        $_SESSION["id"] = $dbdata['id'];
        $_SESSION["name"] = $dbdata['name'];
        $_SESSION["error"] = 0;
        header("Location: index.php");
    }
    else{
        $_SESSION["error"] = -1;
        header("Location: login.php?error=$error&email=$email");
        }

    }


?>