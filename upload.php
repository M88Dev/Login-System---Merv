<?php
	
	session_start(); 

	include('config.php');
    include('function.php');

    db_connect();

// If upload button is clicked ...
if (isset($_POST['upload'])) {
	$username=$_SESSION['username'];
	$con = "SELECT filename FROM image";
	mysqli_query($conn, $con);

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./image/" . $filename;


	// Get all the submitted data from the form
	$sql = "INSERT INTO image (filename) VALUES ('$filename')";

	// Execute query
	mysqli_query($conn, $sql);

	// Now let's move the uploaded image into the filepro_fieldcount()er: image
	if (move_uploaded_file($tempname, $folder)) {
		echo "<h3> Image uploaded successfully!</h3>";

	} else {

		echo "<h3> Failed to upload image!</h3>";
	}
}
?>


<div id="content">
	<form method="POST" action="" enctype="multipart/form-data">
		<div class="form-group">
			<input class="form-control" type="file" name="uploadfile" value="" />
		</div>
		<div class="form-group">
			<button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
		</div>
	</form>
</div>

<div id="display-image">
	<?php
	$query = "SELECT filename FROM image";
	$result = mysqli_query($conn, $query);

	while ($data = mysqli_fetch_assoc($result)) {

	?>
		<img src="./image/<?php echo $data['filename']; ?>">

	<?php
	}
	?>
</div>

<a href="home.php">back to home</a>

