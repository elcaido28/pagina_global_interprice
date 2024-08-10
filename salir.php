<?php
session_start();
session_unset();
unset($_SESSION['ID_usu']);
unset($_SESSION['NU']);
unset($_SESSION['NUID']);
session_destroy();

header("Location:index.php");
 ?>
