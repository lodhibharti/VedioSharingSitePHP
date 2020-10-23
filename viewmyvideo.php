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
<link rel = stylesheet href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel = stylesheet href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

<script src = https://code.jquery.com/jquery-3.3.1.js></script>
<script src = https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js></script>
<script src = https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js></script>
<script src = https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js></script>
<script src = https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js></script>
<script src = https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js></script>
<script src = https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js></script>





<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>



</head>
<body>

<?php include "nav2.php"; 
$query = "select * from video";
$rs = my_select($query);
?>

<div class="container" style = "margin-top : 100px">
<h2 class="text-center" style = "font-family : 'Monotype Corsiva' ; color : #E6120E ; font-weight : bold">View My Videos</h2>
<br>
<br>
<table class="table table-hover" id="example">
<thead style = "background-color : lightblue">
<tr>
<th>Title</th>
<th>Category</th>
<th>Video</th>
<th>Thumbnail</th>
<th>UploadingDate</th>
<th>Description</th>
<th>Status</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php 
while($row=mysqli_fetch_array($rs))
{
echo "<tr>";
echo "<td>$row[1]</td>";
echo "<td>$row[2]</td>";
echo "<td>$row[3]</td>";
echo "<td>$row[4]</td>";
echo "<td>$row[6]</td>";
echo "<td>$row[7]</td>";
echo "<td>$row[8]</td>";
echo "<td><a href='deletevideo.php?id=$row[0]' class='btn btn-danger'>Delete</a></td>";
echo "</tr>";
}
?>
</tbody>
</table>
</div>

</body>
</html>