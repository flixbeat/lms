<div class = "container">
	<div class = "row">
		<div class = "col-sm-3"></div>
		<div class = "col-sm-6">
			<div id="returnPanel">
				<?php echo $data['alertM']?>
				<div class = "panel panel-info">
					<div class = "panel-heading">
						<strong>Student Details</strong>
						(The details of the edited student records)
					</div>
					<div class = "panel-body">
						<div class = "form-group">
							<label>Student Number</label>
							<input type="text" class="form-control"	id = "infoStNum" value = "<?php echo $data['sNum']?>" disabled/><br>
							<label>Student Name</label>
							<input type="text" class="form-control"	id = "infoStNum" value = "<?php echo $data['sName']?>" disabled/><br>
							<label>Grade Level</label>
							<input type="text" class="form-control"	id = "infoNum" value = "<?php echo $data['grdLvl']?>" disabled/><br>
							<label>Section</label>
							<input type="text" class="form-control"	id = "infoTitle" value = "<?php echo $data['section']?>" disabled/><br>
						</div>

					</div>
					<div class = "panel-footer clearfix">
						<button class="btn btn-warning" onclick= "location.href='admin.php'">Ok (Dashboard)</button>
						<button class="btn btn-success pull-right" onclick= "location.href='student_edit.php'">Back to Student Update</button>
					</div>
				</div>
			</div>
		</div>
		<div class = "col-sm-3"></div>
	</div>
</div>