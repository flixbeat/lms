<div class = "container-fluid">
	<h2>Returning of Book</h2><hr>
	<div class = "row">
		<div class = "col-sm-5">
			<div class = "panel panel-primary">
				<div class = "panel-heading">
					<strong>Book Returning Panel</strong>
					(Borrowing details)
				</div>

				<div class = "panel-body">
					<form action = "return.php" method = "get">
						<div class = "form-group">
							<p><?php echo "Today's Date " . date("Y/m/d")?></p>
							<label>Student Number</label>
							<input type="text" class="form-control"	id = "tfStNum" name="tfStNum" required><br>
							<label>Access Number</label>
							<input type="number" class="form-control" id = "tfBkNum" name="tfBkNum" required>
							<input type = "hidden" id = "idHid"  name = "idHid">
							<input type = "hidden" id = "HidDueDate"  name = "HidDueDate">
						</div>
						<div class = "pull-right">
								<button id="btnRet" name="btnRet" class="btn btn-primary">Return Book</button>
						</div>
					</form>
					<div class = "pull-left">
						<a href="admin.php"><button class="btn btn-primary">Back</button></a>
					</div>
				</div>
			</div>
		</div>
		<div class = "col-sm-7">
			<div class = "panel panel-info">

				<div class = "panel-heading">
					<strong>Book Details</strong>
					(The details of the borrowed book)
				</div>
				<div class = "panel-body">
					<div class = "form-group">
						<p><?php echo "Today's Date " . date("Y/m/d")?></p>
						<label>Student Number</label>
						<input type="text" class="form-control"	id = "infoStNum" disabled/><br>
						<label>Student Name</label>
						<input type = "text" class="form-control" id = "infoStName" disabled><br>
						<label>Book Number</label>
						<input type="text" class="form-control"	id = "infoNum" disabled/><br>
						<label>Title</label>
						<input type="text" class="form-control"	id = "infoTitle" disabled/><br>
						<label>Due Date</label>
						<input type="text" class="form-control"	id = "infoDueDate" disabled/>

						
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		
			$('#tfBkNum').keyup(function(){
				$.ajax({

					type: 'post',
					url: 'admin.php',
					data:{

						ajax: true,
						action: 'returnBook',
						bookNum:$("#tfBkNum").val(),
						stuNum:$("#tfStNum").val()
						
					},

					success: function(data){
						var bkArrt = data.split("|");
						$('#idHid').val(bkArrt[0]);
						$('#HidDueDate').val(bkArrt[1]);
						$('#infoDueDate').val(bkArrt[1]);
						$('#infoNum').val(bkArrt[2]);
						$('#infoTitle').val(bkArrt[3]);
						$('#infoStNum').val(bkArrt[4]);
						$('#infoStName').val(bkArrt[5]);

						//$('#tae').html(data);
						
						
						
						
					}
				});

			});		
	});

</script>