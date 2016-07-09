
<div class = "container-fluid">
	<h3>Search Results</h3>
	<hr>
	<form class = "form" action = "index.php" method = "post">
		<div class = "form-group">
			<div class = "input-group">
				<input type = "text" class = "form-control" name = "keyword" value = "<?php echo $_POST['keyword']?>">
				<div class="input-group-addon"><span class = "glyphicon glyphicon-search"></span> Search</div>
			</div>
		</div>
	</form>
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
			echo'<tr><td>'.'<a href = "index.php?bookId='.$row['id'].'">'. $row['title'].'</a></td>';
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
<style type="text/css">
	.input-group-addon{
		cursor: pointer;
	}
</style>
<script type="text/javascript">
	$('.input-group-addon').click(function(){
		$('form').submit();
	});
</script>