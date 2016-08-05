<?php	
	require_once('includes/database.php');
	include('/header.php');

	$id = $_GET['id'];
	$result = $conn->query("SELECT * FROM dvd WHERE id=$id");
	$row = $result->fetch_assoc();
	
		$delete = "DELETE FROM dvd WHERE id='$id'";

		if ($conn->query($delete) === TRUE) 
		{
		    header('location:dvd.php?deleted-successfully');
		} else 
		{
		     header('location:dvd.php?delete-ERROR');
		}
?>