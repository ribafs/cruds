<?php
	include('conn.php');
	if(isset($_POST['add'])){
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		
		mysqli_query($conn,"insert into `user` (firstname, lastname) values ('$firstname', '$lastname')");
	}
?>