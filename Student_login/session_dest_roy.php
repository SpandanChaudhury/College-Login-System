<?php 
session_start();
session_destroy();
setcookie("welcome", '', time() - 86400, '/');
setcookie("sic", '', time() - 86400, '/');
setcookie("path", '', time() - 86400, '/');
setcookie("error_log",'' , time() - 86400, '/');
setcookie("SIC", '', time() - 86400, '/');

header("Location:form_personal.php");
?>