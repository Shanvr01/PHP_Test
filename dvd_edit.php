<?php
	require_once('/database.php');
	include('/header.php');
	
	$id = $_GET['id'];
	$result = $db->fetch("
	SELECT dvd.id, dvd.category_id, dvd.name, dvd.description, dvd.release_date, category.cat_name
	FROM dvd
	INNER JOIN category
	ON dvd.category_id=category.id WHERE dvd.id=$id;
	"); 
	$row = $result->fetch_assoc();
	$row_id = $row['category_id'];
	if(!empty($_POST['btn-edit']))
	{ 
		$sql = "UPDATE dvd SET name='".$_POST['name']."', category_id='".$_POST['cat']."',
        description='".$_POST['description']."', release_date='".$_POST['release_date']."' WHERE id='".$_POST['id']."'";

		if ($db->update($sql) === TRUE) 
		{
		    header('location:dvd.php?updated-successfully');		   
		} else 
		{
		    echo "Error updating record: " . $conn->error;
		}
	}

?>

<form method="post">
	<input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
	<p>
		<label for="name">DVD Name:</label>
		<input type="text" name="name" id="name" value="<?php echo $row['name'] ?>" data-parsley-required>
	</p>
	<p>
		<label for="description">Description:</label>
		<input type="text" name="description" id="description" value="<?php echo $row['description'] ?>" data-parsley-required>
	</p>
	<p>
		<label for="release_date">Release Date:</label>
		<input type="text" name="release_date" id="release_date" value="<?php echo $row['release_date'] ?>" data-parsley-required>
	</p>
	<p>
	<select name="cat" id="cat">
		<option value="1">Comedy</option>
		<option value="2">Adventure</option>
		<option value="3">Action</option>
		<option value="4">Drama</option>
		<option value="5">Documentary</option>
		<option value="6">Sci-fi</option>
	</select>
		<label for="category">Category:</label>
		<?php echo $row['category_id']; ?>
	</p>
	<input type="submit" name="btn-edit" value="Submit">
</form>
<a href="/dvd.php">back</a>

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="/js/parsley.js"></script>
<script type="text/javascript">
	$('form').parsley();
</script>