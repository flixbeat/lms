<div class = "container-fluid">
	<h2>Book Borrowing</h2><hr>
	<div class = "row">
		<div class = "col-sm-5">
			<div class = "panel panel-primary">

				<div class = "panel-heading">
					<strong>Book Borrowing Panel</strong>
				</div>

				<div class = "panel-body">
					<form action = "borrow_part2.php" method = "get">
						<div class = "form-group">
							<p><?php echo "Today's Date " . date("Y/m/d")?></p>
							<?php $dueDate = date("Y-m-d", time() + 172800)?>
							<label>Student Number</label>
							<input type="text" class="form-control"	id = "tfStNum" name="tfStNum" required><br>
							<label>Due Date</label>
							<input type="date" class="form-control"	id = "tfDueDate" name="tfDueDate" required><br>
							<input type = "hidden" value="<?php echo $data['bookNum']?>" name="hidBkNum">
							<input type = "hidden" value="<?php echo $data['bookTitle']?>" name="bkTitle">
						</div>
						<div class = "pull-right">
								<button id="btnBrw" class="btn btn-primary">Borrow Book</button>
						</div>
					</form>	
					<div class = "pull-left">
						<a href="borrow.php"><button class="btn btn-primary">Back</button></a>
					</div>
				</div>
			</div>
		</div>
		<div class = "col-sm-7">
			<div class = "panel panel-info">

				<div class = "panel-heading">
					<strong>Book Details</strong>
					(The details of the book that will be borrowed)
				</div>
				<div class = "panel-body">
					<div class = "form-group">
						<p><?php echo "Today's Date " . date("Y/m/d")?></p>
						<label>Book Number</label>
						<input type="text" class="form-control"	id = "infoNum" value = "<?php echo $data['bookNum']?>" disabled/><br>
						<label>Title</label>
						<input type="text" class="form-control"	id = "infoTitle" value = "<?php echo $data['bookTitle']?>" disabled/><br>
						<label>Availability</label>
						<input type="text" class="form-control"	id = "infoQty" name = "infoQty" value = "<?php echo $data['bookAvail']?>" disabled/>
						
					</div>

				</div>
			</div>
		</div>
	</div>

</div>