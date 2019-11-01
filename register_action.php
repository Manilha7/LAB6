<?php



include 'db.php';




    // Process signup submission
    $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);


    if ($db) {
    $username  = $_POST['username'];
    $email    = $_POST['email'];
    $password   = $_POST['password'];
    $password_corfirmed= $_POST['password-confirmed'];
    $password_final= substr(md5($_POST['password']),0,32);

    $queryemail =" SELECT * from users where email='$email'";

    if(!($result = @ mysql_query($queryemail,$db)))
        die("Erro " . mysql_errno() . " : " . mysql_error());
    
    $nrows  = mysql_num_rows($result);
    if ($nrows>0) {
        header("Location: register.php?Error=1&username=$username");
    }

    elseif ($password!=$password_corfirmed) {
      header("Location: register.php?Error=4&username=$username&email=$email");
    }

    elseif (empty($password) || empty($password_corfirmed)) {
      header("Location: register.php?Error=3&email=$email&username=$username"); 
    }

    elseif ( empty($password) || empty($password_corfirmed) || empty($username) || empty($email)) {
       header("Location: register.php?Error=0");
    }
    else{
        $sql_insert = "INSERT INTO users(name, email, password_digest, created_at, updated_at) VALUES('$username','$email','$password_final',NOW(),NOW())";
        if(!($result = @ mysql_query($sql_insert,$db)))
   			showerror(); 
        header("Location: register_success.html");
        }
    }

?>