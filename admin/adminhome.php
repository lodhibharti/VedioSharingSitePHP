<?php
session_start();
include "dbconfigure.php";
if(verifyuser())
{
$name = $_SESSION['sname'];
 
}

else
{
header("location:index.php");
}

?>

<html>
<head>
<?php include "header.php"; ?>

</head>
<body>
<?php include "nav2.php" ?>



</body>
</html>