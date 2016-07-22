<?php

	require_once('/includes/database.php');

	include 

	
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
					<a href="/edit-customer.php?id=<?= $row['id'] ?>">Edit</a>
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

