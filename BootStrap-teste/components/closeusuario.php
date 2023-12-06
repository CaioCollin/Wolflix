<?php
session_start();
session_destroy();
header("Location: ../../BootStrap-teste/Projeto-Login/components/login.php");

exit();
?>