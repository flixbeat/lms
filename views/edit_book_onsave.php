<div class = "container">
	<div class = "panel panel-default">
		<div class = "panel-heading">Edit Book</div>
		<div class = "panel-body">
			<?php echo $data['response'];?>
		</div>
		<div class = "panel-footer clearfix">
			<button class = "btn btn-default pull-right" onclick = "location.href = 'admin.php'">Back To Dashboard</button>
			<button class = "btn btn-primary pull-right" onclick = "location.href = 'admin.php?action=editBook'">Edit Another Book</button> 
		</div>
	</div>
</div>