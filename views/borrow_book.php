<?php 
#	$bkNum =null;
#	$bkTitle = null;
#	$bkQty= null;
?>
<div class = "container-fluid">
	<h2>Book Checking</h2><hr>
	<div class = "row">
		<div class = "col-sm-5">
			<div class = "panel panel-primary">

				<div class = "panel-heading">
					<strong>Book Borrowing Panel</strong>
				</div>

				<div class = "panel-body">
					<form action = "borrow.php" method = "get">
						<div class = "form-group">
							<p><?php echo "Today's Date " . date("Y/m/d")?></p>
							<label>Book Number</label>
							
							<input type="text" class="form-control"	id = "tfBookNum" name="bookNum" required><br>
							<br>
						</div>
						<input type="hidden" value="" name="hidQty" id = "hidQty">
						<input type="hidden" value="" name="hidNum" id = "hidNum">
						<input type="hidden" value="" name="hidTitle" id = "hidTitle">
						<div class = "pull-right">
								<button id="btnNext" class="btn btn-primary">Next</button>
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
					(The details of the book that will be borrowed)
				</div>
				<div class = "panel-body">
					<div class = "form-group">
						<p><?php echo "Today's Date " . date("Y/m/d")?></p>
						<label>Book Number</label>
						<input type="text" class="form-control"	id = "infoNum" 	name = "infoNum" disabled/><br>
						<label>Title</label>
						<input type="text" class="form-control"	id = "infoTitle" name = "infoTitle" disabled/><br>
						<label>Availability</label>
						<input type="text" class="form-control"	id = "infoQty" name = "infoQty" disabled/>
						
					</div>
				</div>
			</div>
		</div>
	</div>

		
</div>
<script>
	$(document).ready(function(){
		$('#btnNext').click(function(){
			$('#hidQty').val($('#infoQty').val());
			$('#hidNum').val($('#infoNum').val());
			$('#hidTitle').val($('#infoTitle').val());
		});
		$('#tfBookNum').keyup(function(){

			$.ajax({

				type: 'post',
				url: 'admin.php',
				data:{

					ajax: true,
					action: 'checkBook',
					bookNum:$("#tfBookNum").val(),
					
				},

				success: function(data){
					var bkArr = data.split("|");
					$('#infoNum').val(bkArr[0]);
					$('#infoTitle').val(bkArr[1]);
					$('#infoQty').val(bkArr[2]);
					
				}
			});
		});			
	});

</script>