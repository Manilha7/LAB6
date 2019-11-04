<?php

include 'db.php';
session_start();
session_unset();
session_destroy();
 header("Location: message_template.tpl");
?>
