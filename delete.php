<?php 
	
	require_once('includes/database.php');
	include('/header.php');

	$id = $_GET['id'];
	$result = $conn->query("SELECT * FROM customer WHERE id=$id");
	$row = $result->fetch_assoc();

	
		$delete = "DELETE FROM customer WHERE id='$id'";

		if ($conn->query($delete) === TRUE) 
		{
		    header('location:index.php?deleted-successfully');
		} else 
		{
		     header('location:index.php?delete-ERROR');
		}


?>