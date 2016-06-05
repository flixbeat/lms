<div class = "container">
	<div class = "panel panel-default">
		<div class = "panel-heading">Create New Book Entry</div>
		<div class = "panel-body">
			<?php echo $data['response'];?>
		</div>
		<div class = "panel-footer clearfix">
			<button class = "btn btn-default pull-right" onclick = "location.href = 'admin.php'">Back To Dashboard</button>
			<button class = "btn btn-primary pull-right" onclick = "location.href = 'admin.php?action=createBook'">Create Another Entry</button> 
		</div>
	</div>

</div>