<?php 

	require_once('includes/database.php');
	include('/header.php');
	
	$id = $_GET['id'];
	$result = $conn->query("SELECT * FROM customer WHERE id=$id");
	$row = $result->fetch_assoc();

	if(!empty($_POST['btn-edit']))
	{ 
		$sql = "UPDATE customer SET name='".$_POST['name']."',
        surname='".$_POST['surname']."', contact_number='".$_POST['contact_number']."',
        email='".$_POST['email']."', sa_id_number='".$_POST['sa_id_number']."',
        address='".$_POST['address']."' WHERE id='".$_POST['id']."'";

		if ($conn->query($sql) === TRUE) 
		{
		    header('location:index.php?updated-successfully');
		    echo "Record updated successfully";
		} else 
		{
		    echo "Error updating record: " . $conn->error;
		}
	}

?>

	<form method="post">
		<input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
		<p>
			<label for="name">First Name:</label>
			<input type="text" name="name" id="name" value="<?php echo $row['name'] ?>" data-parsley-required>
		</p>
		<p>
			<label for="surname">Last Name:</label>
			<input type="text" name="surname" id="surname" value="<?php echo $row['surname'] ?>" data-parsley-required>
		</p>
		<p>
			<label for="contact_number">Contact_number:</label>
			<input type="text" name="contact_number" id="contact_number" value="<?php echo $row['contact_number'] ?>" data-parsley-required>
		</p>
		<p>
			<label for="email">Email:</label>
			<input type="email" name="email" id="email" value="<?php echo $row['email'] ?>" data-parsley-type="email" data-parsley-required>
		</p>
		<p>
			<label for="sa_id_number">sa_id_number:</label>
			<input type="text" name="sa_id_number" id="sa_id_number" value="<?php echo $row['sa_id_number'] ?>" data-parsley-required data-parsley-minlength="13">
		</p>
		<p>
			<label for="address">Address:</label>
			<input type="text" name="address" id="address" value="<?php echo $row['address'] ?>" data-parsley-required>
		</p>
		<input type="submit" name="btn-edit" value="Submit">
	</form>
	<a href="/">back</a>

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="/js/parsley.js"></script>
<script type="text/javascript">
	$('form').parsley();
</script>
