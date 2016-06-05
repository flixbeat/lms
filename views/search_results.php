<div class = "container-fluid">
	<form class = "form-inline" action = "index.php" method = "post">
		<div class = "form-group">
			<label>Search Again: </label>
			<input type = "text" class = "form-control" name = "keyword" value = "<?php echo $_POST['keyword']?>">
		</div>
	</form>
	<h3>Search Result</h3>
	<table class ="table">
	<tr>
		<th>Title</th>
		<th>Author</th>	
		<th>Book Number</th>		
		<th>Available</th>
		<th>Edition</th>
		<th>Publisher</th>
		<th>Year</th>	
	</tr>
	<?php
		while($row = $data['resultSet']->fetch_assoc()){
			echo'<tr><td>'. $row['title'].'</td>';
			echo'<td>'. $row['author'].'</td>';
			echo'<td>'. $row['book_number'].'</td>';
			echo'<td>'. $row['qty'].'</td>';
			echo'<td>'. $row['edition'].'</td>';
			echo'<td>'. $row['publisher'].'</td>';
			echo'<td>'. $row['book_year'].'</td></tr>';
		}
	?>
	</table>
</div>