<?php	
	require_once('/database.php');
	include('/header.php');

	$customer_query = $db->fetch('SELECT * FROM customer');
	$dvd_query = $db->fetch('SELECT * FROM dvd');

		// var_dump($_POST);exit;
	if(isset($_POST['save_order']))
	{
		$customer_id = mysqli_real_escape_string($db->conn, $_POST['customer_id']);
		$rent_date = mysqli_real_escape_string($db->conn, $_POST['rent_date']);
		$due_date = mysqli_real_escape_string($db->conn, $_POST['due_date']);
		$act_date = mysqli_real_escape_string($db->conn, $_POST['actual_return_date']);
		error_reporting(0);
		$dvd_id = $_POST['dvd_id'];
		if ( count($dvd_id) < 1 ) {
			echo "You must select at least one dvd.";
			return false;
		}
		
		$order = $db->insert("INSERT INTO orders (customer_id, rent_date, due_date, actual_return_date) VALUES ('$customer_id', '$rent_date', '$due_date','$act_date')");

		if($order) {
			echo "Data has been inserted.";
		} else {
			echo "Error: " . $order . "<br>" . mysqli_error($db->conn);
		}

		foreach( $dvd_id as $dvd_ids ) {
			$dvd_order = $db->insert("INSERT INTO dvd_order (dvd_id, order_id) VALUES ('$dvd_ids', (SELECT MAX(id) FROM orders WHERE customer_id=$customer_id))");
		}

		$order_id_query = $db->fetch('SELECT id FROM orders INSERT INTO dvd_order(order_id)');


	}
?>

<form action="" method="POST">
	<h1>Add an order</h1>
	<h2>Please select a customer *</h2>
	<select name="customer_id" id="customer_id">
		<?php while($customer_data = $customer_query->fetch_assoc()) { ?>
			<option value="<?php echo $customer_data['id']; ?>"><?php echo $customer_data['name']; ?></option>
		<?php } ?>	
	</select>
	<h2>Please select a dvd *</h2>
		<?php while($dvd_data = $dvd_query->fetch_assoc()) { ?>
			<input type="checkbox" name="dvd_id[]" value=<?php echo $dvd_data['id']; ?>><?php echo $dvd_data['name']; ?>
		<?php } ?>	
	<h3>Select rent date</h3>
	<input type="date" name="rent_date">
	<h3>Select due date</h3>
	<input type="date" name="due_date">
	<h3>Select due date</h3>
	<input type="date" name="actual_return_date">
	<input type="submit" name="save_order" value="Add Order">
</form>