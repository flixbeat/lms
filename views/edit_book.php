<div class = "container-fluid">
	<div class = "container">
		<form action = "admin.php" method = "post">
			<div class = "panel panel-primary">
				<div class = "panel-heading">
					<strong>Edit Book</strong>
				</div>
				<div class = "panel-body">
					<div class = "row">
						<div class = "col-md-4">
							<div class = "well well-md"><strong>1 Basic Info</strong> <small>(all fields required)</small></div>
							<div class = "form-group">
								<label>Book Number</label>
								<span class = "text-danger"><small>(Warning, changing the book number will overwrite existing records.)</small></span>
								<input type = "number" class = "form-control" name = "bookNumber" value = "<?php echo $data['bookNumber'];?>" required/>
							</div>
							<div class = "form-group">
								<label>ISBN</label>
								<input type = "text" class = "form-control" name = "isbn" value = "<?php echo $data['isbn'];?>" required/>
							</div>
							<div class = "form-group">
								<label>Title</label>
								<input type = "text" class = "form-control" name = "title" value = "<?php echo $data['bookTitle'];?>" required/>
							</div>
							<div class = "form-group">
								<label>Author</label>
								<input type = "text" class = "form-control" name = "author" value = "<?php echo $data['author'];?>" required/>
							</div>
							<div class = "form-group">
								<label>Publisher</label>
								<input text = "text" class = "form-control" name = "publisher" value = "<?php echo $data['publisher'];?>" required/>
							</div>
						</div>
						<div class = "col-md-4">
							<div class = "well well-md"><strong>2 Core Info</strong></div>
							<div class = "form-group">
								<label>Text Overview</label>
								<textarea class = "form-control" style = "resize:none;" rows = "5" name = "description" ><?php echo $data['shortText'];?></textarea>
							</div>
							<div class = "form-group">
								<label>Pages</label>
								<input type = "number" class = "form-control" name = "pages" value = "<?php echo $data['pages'];?>" />
							</div>
							<div class = "form-group">
								<label>Year</label>
								<input type = "number" class = "form-control" name = "year" value = "<?php echo $data['year'];?>" />
							</div>
							<div class = "form-group">
								<label>Date Received</label>
								<div class = "row">
									<div class = "col-sm-4">
										<small>Month</small>
										<select class = "form-control" id = "cbMonth">
											<?php
												for($i=1;$i<=12;$i++){
													if($i<10) $i = '0'.$i;
													echo "<option>$i</option>";
												}
											?>
										</select>
										<input type = "hidden" name = "drMonth">
									</div>
									<div class = "col-sm-4">
										<small>Day</small>
										<select class = "form-control" id = "cbDay">
											<?php
												for($i=1;$i<=31;$i++){
													if($i<10) $i = '0'.$i;
													echo "<option>$i</option>";
												}
											?>
										</select>
										<input type = "hidden" name = "drDay">
									</div>
									<div class = "col-sm-4">
										<small>Year</small>
										<select class = "form-control" id = "cbYear">
											<?php
												for($i=1900;$i<=date("Y");$i++){
													if($i<10) $i = '0'.$i;
													echo "<option>$i</option>";
												}
											?>
										</select>
										<input type = "hidden" name = "drYear">
									</div>
								</div>
							</div>

						</div>
						<div class = "col-md-4">
							<div class = "well well-md"><strong>3 Additional Info</strong></div>
							<div class = "form-group">
								<label>Edition</label>
								<input type = "number" class = "form-control" name = "edition" value = "<?php echo $data['edition'];?>" />
							</div>
							<div class = "form-group">
								<label>Cost Price</label>
								<input type = "number" class = "form-control" name = "cost" value = "<?php echo $data['cost'];?>" />
							</div>
							<div class = "form-group">
								<label>Source of Fund</label>
								<input type = "text" class = "form-control" name = "source" value = "<?php echo $data['source'];?>" />
							</div>
							<div class = "form-group">
								<label>Class</label>
								<input type = "text" class = "form-control" name = "class" value = "<?php echo $data['class'];?>" />
							</div>
							<div class = "form-group">
								<label>Stock / Quantity</label>
								<input type = "number" class = "form-control" name = "qty" value = "<?php echo $data['qty'];?>" />
							</div>
							<div class = "form-group">
								<label>Remarks</label> <small>(optional)</small>
								<select class = "form-control" id = "cbRemarks">
									<?php
										foreach ($data['remarksOptions'] as $val) {
											echo "<option>$val</option>";
										}
									?>
								</select>
								<input type = "hidden" name = "remarks" >
							</div>
						</div>
					</div>
				</div>	
			</div>
			<div class = "panel-footer clearfix">
				<button class = "btn btn-primary pull-right" name = "btnEditBook">Save</button>
			</div>
		</div>
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#cbMonth').val("<?php echo $data['drMonth'];?>");
		$('#cbDay').val("<?php echo $data['drDay'];?>");
		$('#cbYear').val("<?php echo $data['drYear'];?>");
		$('#cbRemarks').val("<?php echo $data['remarks'];?>");

		$('input[name="drMonth"]').val($('#cbMonth').val());
		$('input[name="drDay"]').val($('#cbDay').val());
		$('input[name="drYear"]').val($('#cbYear').val());
		$('input[name="remarks"]').val($('#cbRemarks').val());

		$('#cbMonth').change(function(){
			$('input[name="drMonth"]').val($(this).val());
		});

		$('#cbDay').change(function(){
			$('input[name="drDay"]').val($(this).val());
		});

		$('#cbYear').change(function(){
			$('input[name="drYear"]').val($(this).val());
		});

		$('#cbRemarks').change(function(){
			$('input[name="remarks"]').val($(this).val());
		});

	});
</script>