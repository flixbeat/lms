<?php $row = $data['bookDetails']->fetch_assoc();?>
<div class = "container">
	<h3><?=$row['title'];?></h3>
	<hr>
	<div class = "panel panel-primary">
		<div class = "panel-heading">
			<strong>Book Details</strong>
		</div>
		<div class = "panel-body">
			<div class = "row">
				<div class = "col-sm-6">
					<table class = "table">
						<!--tr>
							<td><strong>Access Number: </strong></td>
							<td><?=$row['book_number']?></td>
						</tr-->
						<tr>
							<td><strong>ISBN: </strong></td>
							<td><?=$row['isbn']?></td>
						</tr>
						<tr>
							<td><strong>Author: </strong></td>
							<td><?=$row['author']?></td>
						</tr>
						<tr>
							<td><strong>Edition: </strong></td>
							<td><?=$row['edition']?></td>
						</tr>
						<tr>
							<td><strong>Publisher: </strong></td>
							<td><?=$row['publisher']?></td>
						</tr>
						<tr>
							<td><strong>Year: </strong></td>
							<td><?=$row['book_year']?></td>
						</tr>
						<tr>
							<td><strong>Date Received: </strong></td>
							<td><?=$row['date_received']?></td>
						</tr>
						<tr>
							<td><strong>Source of Fund: </strong></td>
							<td><?=$row['source_of_fund']?></td>
						</tr>
						<!--tr>
							<td><strong>Cost Price: </strong></td>
							<td>PHP <?=$row['cost_price']?></td>
						</tr-->
						<tr>
							<td><strong>Remarks: </strong></td>
							<td><?=$row['remarks']?></td>
						</tr>
					</table>
				</div>
				<div class = "col-sm-6">
					<div class = "panel panel-info">
						<div class = "panel-heading">
							<strong>Short Overview</strong>
						</div>
						<div class = "panel-body">
							<?=$row['short_text']?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class = "panel-footer">
			<form method = "post" action = "index.php">
				<input type = "hidden" class = "form-control" name = "keyword" value = "<?=$_SESSION['keyword']?>">
				<button class = "btn btn-primary">Back</strong>
			</form>
		</div>
	</div>
</div>