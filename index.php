<?php

	require_once('includes/database.php');

	$result = $conn->query('SELECT * FROM customer');

	if(isset($_POST['btn-save']))
	{
		$name = mysql_real_escape_string($_POST['name']);
		$surname = mysql_real_escape_string($_POST['surname']);
		$contact_number = mysql_real_escape_string($_POST['contact_number']);
		$email = mysql_real_escape_string($_POST['email']);
		$sa_id_number = mysql_real_escape_string($_POST['sa_id_number']);
		$address = mysql_real_escape_string($_POST['address']);

		
		$sql = $conn->query("INSERT INTO customer (name, surname, contact_number,email, sa_id_number,address) VALUES ('$name', '$surname', '$contact_number','$email', '$sa_id_number','$address')");

		if ($sql) 
		{
		    echo "New record created successfully";
		} else 
		{
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

?>

<table>
	<tbody>
		<?php if ($result->num_rows > 0): ?>
		<tr>
			<th>id</th>
			<th>name</th>
			<th>surname</th>
			<th>contact_number</th>
			<th>email</th>
			<th>sa_id_number</th>
			<th>address</th>
			<th>activity</th>
		</tr>
		<?php while ($row = $result->fetch_assoc()): ?>
			<tr>
				<?php foreach ($row as $column => $value) : ?>

					<td><?php echo $value ?></td>

				<?php endforeach; ?>

				<td>
					<a href="/edit-customer.php?id=<?php echo $row['id'] ?>">Edit</a>
				</td>
				<td>
					<a href="/delete.php?id=<?php echo $row['id'] ?>">Delete</a>
				</td>
			</tr>
		<?php endwhile; ?>

		<?php else: ?>
			<tr>
				<td>
					<h2>No Results</h2>
				</td>
			</tr>
		<?php endif; ?>
	</tbody>
</table>

<h2>Add customer</h2>

<div class="">
	<form method="post">
		<p>
			<!-- <label for="name">First Name:</label> -->
			<input placeholder="name" type="text" name="name" id="name">
		</p>
		<p>
			<!-- <label for="surname">Last Name:</label> -->
			<input placeholder="surname" type="text" name="surname" id="surname">
		</p>
		<p>
			<!-- <label for="contact_number">Contact_number:</label> -->
			<input placeholder="contact_number" type="text" name="contact_number" id="contact_number">
		</p>
		<p>
			<!-- <label for="email">Email:</label> -->
			<input placeholder="email" type="email" name="email" id="email">
		</p>
		<p>
			<!-- <label for="sa_id_number">sa_id_number:</label> -->
			<input placeholder="sa_id_number" type="text" name="sa_id_number" id="sa_id_number">
		</p>
		<p>
			<!-- <label for="address">Address:</label> -->
			<input placeholder="Address" type="text" name="address" id="address">
		</p>
		<input type="submit" name="btn-save" value="Add customer">
	</form>
</div>