<html>
<head>
<?php include "header.php"; ?>

</head>
<body>
<?php include "nav1.php" ?>

<form method = post class="container" style = "margin-top : 100px">
<h2 class="text-center" style = "font-family : 'Monotype Corsiva' ; color : #E6120E ; font-weight : bold">User SignUp</h2>
<br>
<div class="form-group">
<label><b>UserName</b></label>
 <input type = text name='username' class="form-control" placeholder="Enter Your Name Here"> 
 <label><b>Password</b></label>
 <input type = password name='password' class="form-control" placeholder="Enter Password"> 
 <label><b>EmailID</b></label>
 <input type = email name='emailid' class="form-control" placeholder="Enter Your Email Here"> 
 <label><b>Contact</b></label>
 <input type = text name='contact' class="form-control" placeholder="Enter Your Contact Number">
<br>
<input type = submit value="Submit" name = submit class='btn btn-primary'> 
</div>
</form>

</body>
</html>
<?php 
include "dbconfigure.php";
if(isset($_POST['submit']))
{
$username = $_POST['username'];
$password = $_POST['password'];
$emailid = $_POST['emailid'];
$contact = $_POST['contact'];

$query = "insert into siteuser values('$username','$password','$emailid','$contact')";
$n = my_iud($query);
if($n==1)
{
echo '<script>alert("SignUp Successful");
window.location="login.php";
</script>';
}
else
{
echo '<script>alert("Something Went Wrong , Try Again")</script>';
}
}
?>