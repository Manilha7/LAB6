
<?php



include 'db.php';
    session_start();
    // Process signup submission
    $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);


    if ($db) {
    $email = $_POST["email"];
    $password = substr(md5($_POST['password']),0,32);
    $error = -1;
    
    //print_r($_REQUEST."<br>"); 
    $sql = "SELECT * FROM users WHERE email='$email' AND password_digest='$password'";
   

    $result = mysql_query($sql,$db);
    $dbexist = mysql_num_rows($result);
    $dbdata = mysql_fetch_array($result,MYSQL_ASSOC);
    //print_r($sql);
    if ($dbexist > 0) {
        $_SESSION["id"] = $dbdata['id'];
        $_SESSION["name"] = $dbdata['name'];
        header("Location: index.php");
    }
    else{
        $_SESSION["error"] = -1;
        header("Location: login.php?error=$error");
    }

    }


?>