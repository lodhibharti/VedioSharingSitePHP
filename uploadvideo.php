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
</head>
<body>
<?php include "nav2.php" ?>


<form method = post class="container" style = "margin-top : 100px" enctype="multipart/form-data">
<h2 class="text-center" style = "font-family : 'Monotype Corsiva' ; color : #E6120E ; font-weight : bold">Upload Video</h2>
<br>
<div class="form-group">
<label><b>Video Title</b></label>
 <input type = text name='title' class="form-control" placeholder="Enter Video Title Here"> 
 <label><b>Category</b></label>
 <select name="category" class="form-control">
 <option value="Education">Education</option>
 <option value="Sports">Sports</option>
 <option value="Entertainment">Entertainment</option>
 <option value="Travelling">Travelling</option>
 </select>
 <label><b>Upload Video File</b></label>
 <input type = file name='videofile' class="form-control">
<label><b>Upload Video Thumbnail</b></label>
 <input type = file name='thumbnail' class="form-control">  
 <label><b>Description</b></label>
 <textarea name='description' class="form-control" placeholder="Video Description Here"></textarea>
<br>
<input type = submit value="Submit" name = submit class='btn btn-primary'> 
</div>
</form>

</body>
</html>
<?php 

if(isset($_POST['submit']))
{
// CHANGE THE UPLOAD LIMITS
ini_set('upload_max_filesize', '50M');
ini_set('post_max_size', '50M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);
$title = $_POST['title'];
$category = $_POST['category'];

move_uploaded_file($_FILES['videofile']['tmp_name'],"uploadvideos/".$_FILES['videofile']['name']);

$videofile = "uploadvideos/".$_FILES['videofile']['name'];

move_uploaded_file($_FILES['thumbnail']['tmp_name'],"uploadthumbnails/".$_FILES['thumbnail']['name']);

$thumbnail = "uploadthumbnails/".$_FILES['thumbnail']['name'];

$uploadingdate = date('d-m-y');
$description = $_POST['description'];
$status = "pending";

$query = "insert into video(title,category,videofile,thumbnail,emailid,uploadingdate,description,status) values('$title','$category','$videofile','$thumbnail','$emailid','$uploadingdate','$description','$status')";
$n = my_iud($query);
if($n==1)
{
echo '<script>alert("Video Uploaded Successful");
window.location="viewmyvideo.php";
</script>';
}
else
{
echo '<script>alert("Something Went Wrong , Try Again")</script>';
}
}
?>