<div class = "container-fluid">
	<h2>Book Borrowing</h2><hr>
	<div class = "row">
		<div class = "col-sm-4">
			<div class = "panel panel-primary">

				<div class = "panel-heading">
					<strong>Book Checking Panel</strong>
				</div>

				<div class = "panel-body">
					<form action = "borrow.php" method = "get">
						<div class = "form-group">
							<p><?php echo "Today's Date " . date("Y/m/d")?></p>

							<label>Class</label>
							<input list = "bkClass" class="form-control" id = "tfBookClass" name="bookClass" required>
							<datalist id = "bkClass">

								<?php
									if(isset($data['resClass'])){
										while($row = $data['resClass']->fetch_assoc()){
											$class = $row['class'];
											#$cId = $row['id'];
											echo "<option value = '$class'>";
											
										}
									}
								?>
							</datalist>
						</div>
						<div class = "pull-right">
								<button id="btnChk" class="btn btn-primary" name = "btnChk">Check</button>
						</div>
					</form>	
					<div class = "pull-left">
						<a href="admin.php"><button class="btn btn-info">Back</button></a>
					</div>

					
				</div>
			</div>
		</div>
		
		<div class="col-sm-8" id="res">
			<?php 
				if(isset($data['class'])){
					echo "Class: ".$data['class'];
				}
				else{
					echo "";
				}
				 ?>
		
			<?php
				if(isset($data['resBook'])){
					echo "<table class = 'table'>
							<thead>
								<th>Access Number</th>
								<th>Book Title</th>
								<th>Book Copy</th>
								<th>Availability</th>
								<th>Borrow Book</th>
							</thead>

						";
						$rowNum = $data['resBook']->num_rows;
						#echo $rowNum;
						while($row = $data['resBook']->fetch_assoc()){
							$id = $row['id'];
							$active = $row['status'];
							$title = $row['title'];
							$copy = $row['copy'];
							$acNum = $row['book_number'];
							$avail = $row['availability'];
							$stat = $row['stat'];
							$val = "$id|$avail|$copy|$title";
							echo "<tbody>
									<tr><td>$acNum</td>
									<td>$title</td>
									<td>$copy</td>
									<td>$stat</td>
									
									

								";
							if($avail==0){

								if($active== 'U'){
									echo "<td><button class = 'btn btn-success' id = 'btnBrw' disabled>Inactive</button></td></tbody>";
								}
								else{
									echo "<td><button class = 'btn btn-success' id = 'btnBrw' disabled>Borrow</button></td></tr></tbody>";
								}	
							}
							else if($avail==1){
								
								if($active== 'U'){
									echo "<td><button class = 'btn btn-success' id = 'btnBrw' disabled>Inactive</button></td></tbody>";
								}
								else{
									echo"<td><button class = 'btn btn-success' id = 'btnBrw' value = '$val' data-toggle = 'modal' data-target = '#borrow-book-modal'>Borrow</button></td></tr></tbody>";
								}
							}

							
						}
					echo "</table>";
				}
			?>
		</div>
	</div>		
</div>

<!--borrow book modal-->
<div id = 'mod'>
		<div class = "modal fade" id = "borrow-book-modal" tabindex = "-1" role = "dialog" aria-labelledby = "book-br" aria-hidden = "true">
			<div class = "modal-dialog modal-md">
				<div class = "modal-content">
					<div class = "modal-header">
						<button type = "button" class = "close" data-dismiss = "modal" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class = "modal-title" id = "manage-book">Borrow Book</h4>
						<p><?php echo "Today's Date: " . date("Y/m/d")?></p>
					</div>
					<div class = "modal-body">
						<label>Class: <?php 
							if(isset($data['class'])){
								echo $data['class'];
							}
							else{
								echo "";
							}
						 	 ?>
						</label><br>
						<label>Title:
							<input type="text" id = "tit" size = "60" disabled>
						</label><br>
						<label>Book Copy:
							<input type="text" size = "1" id = "cpy" disabled>
						</label><hr>
						<form action="borrow.php" method="get">
						<div class="bForm">
							<input type="hidden" name = "tit2" id = "tit2" size = "60">
							<input type="hidden" name = "cpy2" id = "cpy2" size = "1">
							<input type="hidden" name="cls" value="<?php echo $data['class']?>">
							<label>Student LRN</label>
							<input type = 'text' class = 'form-control' name = 'tfSNum' required><br>
							<label>Due Date</label>
							<input type = 'date' class = 'form-control' name = 'tfdDate' required><br>
							<input type = 'hidden' class = 'form-control' id = 'BkId' name="bkId" required>
							<div class = "pull-right">
								<button class="btn btn-primary btnSub" name="btnSub">Submit</button>
							</div>
						<br>

						</div>

						</form>
					</div>
					<div class="modal-footer">
						<div class = 'pull-right'>
							<button class = "btn btn-danger" data-dismiss = "modal">Close</button>	
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<script type="text/javascript">
	
	var bkId;
	$(document).ready(function(){
		$('#res').delegate('#btnBrw','click',function(){
			bkId = $(this).val();
			//alert(bkId);

			var bkVal = bkId.split("|");
				//alert(bkVal[1]);
				$('#BkId').val(bkVal[0]);
				$('#cpy').val("   "+bkVal[2]);
				$('#tit').val(bkVal[3]);
				$('#cpy2').val(bkVal[2]);
				$('#tit2').val(bkVal[3]);
				/*if(bkVal[1] == 0){
					$('.bForm').hide();
					$('.btnSub').hide();
					$('.aM').show();
					//alert('Book is not Available');

				}
				else if(bkVal[1] ==1){
					$('.bForm').show();
					$('.btnSub').show();
					$('.aM').hide();
					//alert('Book is Available');
					
				}*/
		});
		
	});
	
</script>
