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
								<label>Access Number: <?=$data['bookNumber'];?></label>
								<!--span class = "text-danger"><small>(Warning, changing the book number will overwrite existing records.)</small></span-->
								<input type = "hidden" class = "form-control" name = "bookNumber" value = "<?php echo $data['bookNumber'];?>" required />
							</div>
							<div class = "row">
								<div class = "col-sm-8">
									<div class = "form-group">
										<label>Class</label>
										<input type = "text" class = "form-control" value = "<?php echo $data['class'];?>" disabled/>
										<input type = "hidden" name = "class" value = "<?php echo $data['class'];?>">
									</div>
								</div>
								<div class = "col-sm-4">
									<div class = "form-group">
										<label>Copy (C)</label>
										<input type = "text" class = "form-control" value = "<?php echo $data['copy'];?>" disabled/>
										<input type = "hidden" name = "copy" value = "<?php echo $data['copy'];?>">
									</div>
								</div>
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
								<label>Author 1</label>
								<input type = "text" class = "form-control" name = "author" 
									value = "<?= isset($data['authorR'][0])? $data['authorR'][0]:null ?>" 
									required/>
								<input type = "hidden" name = "author2"
									value = "<?= isset($data['authorR'][1])? $data['authorR'][1]:null ?>" 
								/>
								<input type = "hidden" name = "author3"
									value = "<?= isset($data['authorR'][2])? $data['authorR'][2]:null ?>" 
								/>
								<input type = "hidden" name = "author4"
									value = "<?= isset($data['authorR'][3])? $data['authorR'][3]:null ?>" 
								/>
								<input type = "hidden" name = "author5"
									value = "<?= isset($data['authorR'][4])? $data['authorR'][4]:null ?>" 
								/>
								<input type = "hidden" name = "author6"
									value = "<?= isset($data['authorR'][5])? $data['authorR'][5]:null ?>" 
								/>
								<input type = "hidden" name = "author7"
									value = "<?= isset($data['authorR'][6])? $data['authorR'][6]:null ?>" 
								/>
							</div>
							<div class = "form-group">
								<button  type = "button" class = "btn btn-info" id = "btnAddAuthors" data-toggle = "modal" data-target = "#add-author-modal">Add more authors</button>
							</div>
							<div class = "form-group">
								<label>Publisher</label>
								<input text = "text" class = "form-control" name = "publisher" value = "<?php echo $data['publisher'];?>" required/>
							</div>
							<div class = "form-group">
								<label>Category</label>
								<select class = "form-control" id = "cbCategory">
									<option value = "1">Fiction</option>
									<option value = "0">Non-Fiction</option>
								</select>
								<input type = "hidden" name = "is_fiction" id = "is_fiction" value = "<?=$data['is_fiction']?>">
							</div>
						</div>
						<div class = "col-md-4">
							<div class = "well well-md"><strong>2 Core Info</strong></div>
							<div class = "form-group">
								<label>Text Overview</label>
								<textarea class = "form-control" style = "resize:none;" rows = "5" name = "description" ><?php echo $data['shortText'];?></textarea>
							</div>
							<div class = "form-group">
								<label>Subject Heading / Tracing</label>
								<input type = "text" class = "form-control" name = "tracing" value = "<?php echo $data['tracing'];?>" >
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
							<!--div class = "form-group">
								<label>Stock / Quantity</label>
								<input type = "number" class = "form-control" name = "qty" value = "<?php echo $data['qty'];?>" />
							</div-->
							<div class = "form-group">
								<label>Special Features</label>
								<input type = "text" class = "form-control" name = "special_features" value = "<?php echo $data['sf'];?>">
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
				<button class = "btn btn-primary" onclick = "backToEdit()">Back</button>
				<button class = "btn btn-primary pull-right" name = "btnEditBook">Save</button>
			</div>
		</div>
	</form>
</div>
<div class = "modal fade" id = "add-author-modal" tabindex = "-1" role = "dialog" aria-labelledby = "add-author" aria-hidden = "true">
	<div class = "modal-dialog modal-md">
		<div class = "modal-content">
			<div class = "modal-header">
				<button type = "button" class = "close" data-dismiss = "modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class = "modal-title" id = "manage-book">Add more authors</h4>
			</div>
			<div class = "modal-body">
				<div class = "form-group">
					<label>Author 2</label>
					<input type = "text" class = "form-control" id = "author2"
						value = "<?= isset($data['authorR'][1])? $data['authorR'][1]:null ?>" 
					/>
				</div>
				<div class = "form-group">
					<label>Author 3</label>
					<input type = "text" class = "form-control" id = "author3"
						value = "<?= isset($data['authorR'][2])? $data['authorR'][2]:null ?>" 
					/>

				</div>
				<div class = "form-group">
					<label>Author 4</label>
					<input type = "text" class = "form-control" id = "author4"
						value = "<?= isset($data['authorR'][3])? $data['authorR'][3]:null ?>" 
					/>

				</div>
				<div class = "form-group">
					<label>Author 5</label>
					<input type = "text" class = "form-control" id = "author5"
						value = "<?= isset($data['authorR'][4])? $data['authorR'][4]:null ?>" 
					/>

				</div>
				<div class = "form-group">
					<label>Author 6</label>
					<input type = "text" class = "form-control" id = "author6"
						value = "<?= isset($data['authorR'][5])? $data['authorR'][5]:null ?>" 
					/>

				</div>
				<div class = "form-group">
					<label>Author 7</label>
					<input type = "text" class = "form-control" id = "author7"
						value = "<?= isset($data['authorR'][6])? $data['authorR'][6]:null ?>" 
					/>

				</div>
			</div>
			<div class = "modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
			</div>
		</div>
	</div>
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

		$('#cbCategory').change(function(){
			$('#is_fiction').val($(this).val());
		});

		$('#cbCategory').val("<?=$data['is_fiction']?>");
		// ====================================================================================

		$('#author2').keyup(function(){
			$('input[name="author2"]').val($(this).val());
		});

		$('#author3').keyup(function(){
			$('input[name="author3"]').val($(this).val());
		});

		$('#author4').keyup(function(){
			$('input[name="author4"]').val($(this).val());
		});

		$('#author5').keyup(function(){
			$('input[name="author5"]').val($(this).val());
		});

		$('#author6').keyup(function(){
			$('input[name="author6"]').val($(this).val());
		});

		$('#author7').keyup(function(){
			$('input[name="author7"]').val($(this).val());
		});
	});
</script>