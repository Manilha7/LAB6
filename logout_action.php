<?php

include 'db.php';
session_start();
session_unset();
session_destroy();
$Message= "See you back soon!";
 header("Location: message_template.tpl&Message=$Message");
?>
