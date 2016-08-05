<?php
	require_once('/database.php');
	include('/header.php');
	// $result = $conn->query('SELECT * FROM dvd');

	$result = $db->fetch("
	SELECT dvd.id, dvd.category_id, dvd.name, dvd.description, dvd.release_date, category.cat_name
	FROM dvd
	INNER JOIN category
	ON dvd.category_id=category.id;
	"); 


	if(isset($_POST['add-dvd']))
	{
		$name = mysqli_real_escape_string($db->conn, $_POST['name']);
		$description = mysqli_real_escape_string($db->conn, $_POST['description']);
		$release_date = mysqli_real_escape_string($db->conn, $_POST['release_date']);
		$category = mysqli_real_escape_string($db->conn, $_POST['cat']);
	
		$sql = $db->update("INSERT INTO dvd (name, description, release_date, category_id) VALUES ('$name', '$description', '$release_date','$category')");

		if ($sql) 
		{
			header('location:dvd.php?updated-successfully');
		   	
		} else 
		{
		    echo "Error: " . $sql . "<br>" . mysqli_error($db);
		}
	}
?>

<h2>Add dvd</h2>
<form method="post" data-parsley-validate>
	<p>
		<!-- <label for="name">First Name:</label> -->
		<input placeholder="Name" type="text" name="name" id="name" data-parsley-required>
	</p>
	<p>
		<!-- <label for="description">Last Name:</label> -->
		<input placeholder="Description" type="text" name="description" id="description" data-parsley-required>
	</p>
	<p>
		<!-- <label for="release_date">release_date:</label> -->
		<input placeholder="Release Date" type="date" name="release_date" id="release_date" data-parsley-required>
	</p>
	<p>
	<label for="cat">Category:</label>
	<select name="cat" id="cat">
		<option value="1">Comedy</option>
		<option value="2">Adventure</option>
		<option value="3">Action</option>
		<option value="4">Drama</option>
		<option value="5">Documentary</option>
		<option value="6">Sci-fi</option>
	</select>
	</p>
	<input type="submit" name="add-dvd" value="Add dvd">
</form>

<table>
	<tbody>
		<?php if ($result->num_rows > 0): ?>
		<tr>
			<th>id</th>
			<th>name</th>
			<th>description</th>
			<th>release date</th>
			<th>category</th>
		</tr>
		<?php while ($row = $result->fetch_assoc()): ?>
			<tr>
				<td>
					<?php echo $row['id']; ?>
				</td>
				<td>
					<?php echo $row['name']; ?>
				</td>
				<td>
					<?php echo $row['description']; ?>
				</td>
				<td>
					<?php echo $row['release_date']; ?>
				</td>
				<td>
					<?php echo $row['cat_name']; ?>
				</td>
				<td>
					<a href="/dvd_edit.php?id=<?php echo $row['id'] ?>">Edit</a>
				</td>
				<td>
					<a href="/dvd_delete.php?id=<?php echo $row['id'] ?>">Delete</a>
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