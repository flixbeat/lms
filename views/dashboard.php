<div class = "container-fluid">
	<h3>DASHBOARD</h3>
	<div class = "row">
		<div class = "col-sm-4">
			<div class = "panel panel-primary">
				<div class = "panel-heading">
					<strong>Control Panel</strong>	
				</div>
				<div class = "panel-body">
					<table class = "table">
						<tr align = "center">
							<td><button class = "btn btn-default"><img src = "imgs/add-book.png" data-toggle = "modal" data-target = "#manage-book-modal"></button><br>Manage Books</td>
							<td><button class = "btn btn-default"><img src = "imgs/generate-report.png"></button><br>Generate Reports</td>
							<td><button class = "btn btn-default"><img src = "imgs/add-book.png"></button><br>Label</td>
						</tr>
						<tr align = "center">
							<td><button class = "btn btn-default"><img src = "imgs/add-book.png"></button><br>Label</td>
							<td><button class = "btn btn-default"><img src = "imgs/add-book.png"></button><br>Label</td>
							<td><button class = "btn btn-default"><img src = "imgs/add-book.png"></button><br>Label</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class = "col-sm-8">
			<div class = "panel panel-primary">
				<div class = "panel-heading">
					<strong>Library Student Statistics</strong>
				</div>
				<div class = "panel-body">
					(insert graph here)
				</div>
			</div>
		</div>


		<div class = "modal fade" id = "manage-book-modal" tabindex = "1" role = "dialog" aria-labelledby = "manage-book" aria-hidden = "true">
			<div class = "modal-dialog modal-sm">
				<div class = "modal-content">
					<div class = "modal-header">
						<button type = "button" class = "close" data-dismiss = "modal" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class = "modal-title" id = "manage-book">Manage Library Assets</h4>
					</div>
					<div class = "modal-body">
						<button class = "btn btn-default btn-block"
							onclick = "location.href='admin.php?action=createBook'"
							>Create New Book Entry</button>
						<button class = "btn btn-default btn-block">Edit Existing Book Record</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>