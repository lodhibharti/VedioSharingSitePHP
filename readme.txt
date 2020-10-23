upload_max_filesize = 50M
post_max_size = 50M
max_input_time = 300
max_execution_time = 300
-------------------------------------------------------
<?php
// CHANGE THE UPLOAD LIMITS
ini_set('upload_max_filesize', '50M');
ini_set('post_max_size', '50M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);

// SET THE DESTINATION FOLDER
$source = $_FILES["file-upload"]["tmp_name"];
$destination = $_FILES["file-upload"]["name"];

// MOVE UPLOADED FILE TO DESTINATION
move_uploaded_file($source, $destination);
?>