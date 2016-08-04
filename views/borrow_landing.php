<div class = "container">
	<h2>Book Borrowing Details</h2><hr>
	<div class = "row">
		<div class = "col-sm-3"></div>
		<div class = "col-sm-6">
			<div id="returnPanel">
				<div class = "panel panel-info">
					<div class = "panel-heading">
						<strong>Book Details</strong>
						(The details of the book and students)
					</div>
					<div class = "panel-body">
						<div class = "form-group">
							<p><?php echo "Today's Date " . date("Y/m/d")?></p>
							<label>Student Number</label>
							<input type="text" class="form-control"	id = "infoStNum" value = "<?php echo $data['studentNum']?>" disabled/><br>
							<label>Student Name</label>
							<input type="text" class="form-control"	id = "infoStNum" value = "<?php echo $data['studentName']?>" disabled/><br>
							<label>Book Number</label>
							<input type="text" class="form-control"	id = "infoNum" value = "<?php echo $data['bookNum']?>" disabled/><br>
							<label>Title</label>
							<input type="text" class="form-control"	id = "infoTitle" value = "<?php echo $data['bookTitle']?>" disabled/><br>
							<label>Due Date</label>
							<input type="text" class="form-control"	id = "infoDueDate" value = "<?php echo $data['bookDueDate']?>" disabled/>
						</div>

					</div>
					<div class = "panel-footer clearfix">
						<button class="btn btn-warning" onclick= "location.href='admin.php'">Ok (Dashboard)</button>
						<button class="btn btn-success pull-right" onclick= "location.href='borrow.php'">Back to borrowing</button>
					</div>
				</div>
			</div>
		</div>
		<div class = "col-sm-3"></div>
	</div>
</div>