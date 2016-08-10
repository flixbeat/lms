<div class="container">
	<h2>Edit Student Information</h2>
	<hr>
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
	<?php echo $data['alertM'];?>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<strong>Edit Student Panel</strong>
			</div>
				<form action="student_edit.php" method="get">
					<div class="panel-body">
						<label>Student LRN</label>
						<input type="text" class="form-control" name = "tfSNum" id = "tfSNum" required><br>
						<div class="pull-right">
							<button class="btn btn-primary" name="btnNxt">Next <span class="glyphicon glyphicon-share-alt"></span></button>
						</div>
						</form>
						<button class="btn btn-info" onclick = "location.href='admin.php'"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
					</div>
			</div>
		</div>
	<div class="col-sm-3"></div>
</div>
