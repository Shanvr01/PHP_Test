<?php 

$result = $conn->query('SELECT * FROM customer');
 
<?php while ($row = $result->fetch_assoc()): ?>
			<tr>
				<?php foreach ($row as $column => $value) : ?>

					<td><?php echo $value ?></td>

				<?php endforeach; ?>