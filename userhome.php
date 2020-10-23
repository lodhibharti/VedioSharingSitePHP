<?php 
session_start();
include "dbconfigure.php";
if(verifyuser())
{
$emailid = $_SESSION['semail'];
$query = "select * from user where emailid='$emailid'";
$rs = my_select($query);
if($row = mysqli_fetch_array($rs))
{
$username = $row[0];
$contact = $row[3];
}
}
else
{
header("location:index.php");
}

?>
<html>
<head>
<?php include "header.php"; ?>
<style>
th{color : brown}
td{color : blue ; font-weight : bold}
</style>
</head>
<body>
<?php include "nav2.php";
echo "<br><br><br><div><b>&nbsp;Welcome</b> <b style = 'text-transform : capitalize ; color : blue'>$username</b></div>";
?>

<div class="container" style = "margin-top : 50px">
<h2 class="text-center" style = "font-family : 'Monotype Corsiva' ; color : #E6120E ; font-weight : bold">User Profile</h2>
<br>
<br>
<table class="table table-hover table-borderless">
<tr>
<th>UserName</th>
<td><?php echo $username ?></td>
</tr>
<tr>
<th>Email ID</th>
<td><?php echo $emailid ?></td>
</tr>
<tr>
<th>Contact</th>
<td><?php echo $contact ?></td>
</tr>
</table>
<a href = "editprofile.php" class="btn btn-warning"><b>Edit Profile</b></a>
</div>
</body>
</html>