<?php 
session_start();
//unset($_SESSION['semail']);
//unset($_SESSION['spwd']);
session_destroy();
setcookie('cname',"",time()-60*60*24*7);
setcookie('cpwd',"",time()-60*60*24*7);
header("location:index.php");
?>