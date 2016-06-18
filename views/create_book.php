<div class = "container-fluid">
	<div class = "container">
		<form action = "admin.php" method = "post">
			<div class = "panel panel-primary">
				<div class = "panel-heading">
					<strong>Create New Book Entry</strong>
				</div>
				<div class = "panel-body">
					<div class = "row">
						<div class = "col-md-4">
							<div class = "well well-md"><strong>1 Basic Info</strong> <small>(all fields required)</small></div>
							<div class = "form-group">
								<label>Book Number</label>
								<input type = "number" class = "form-control" name = "bookNumber" value = "<?php echo $data['maxBookNumber']+1;?>"/>
							</div>
							<div class = "form-group">
								<label>ISBN</label>
								<input list = "isbn" class = "form-control" name = "isbn" required/>
								<div id = "isbn_datalist">
								<?php
									echo '<datalist id = "isbn">';
									foreach($data['isbns'] as $val){
										echo '<option value = "'.$val.'">';
									}	
									echo '</datalist>';
								?>
								</div>
							</div>
							<div class = "form-group">
								<label>Title</label>
								<input list = "title" class = "form-control" name = "title" required/>
								<div id = "title_datalist">
								<?php
									echo '<datalist id = "title">';
									foreach($data['titles'] as $val){
										echo '<option value = "'.$val.'">';
									}	
									echo '</datalist>';
								?>
								</div>
							</div>
							<div class = "form-group">
								<label>Author</label>
								<input list = "author" class = "form-control" name = "author" required/>
								<div id = "author_datalist">
								<?php
									echo '<datalist id = "author">';
									foreach($data['authors'] as $val){
										echo '<option value = "'.$val.'">';
									}	
									echo '</datalist>';
								?>
								</div>
							</div>
							<div class = "form-group">
								<label>Publisher</label>
								<input list = "publisher" class = "form-control" name = "publisher" required/>
								<div id = "publisher_datalist">
								<?php
									echo '<datalist id = "publisher">';
									foreach($data['publishers'] as $val){
										echo '<option value = "'.$val.'">';
									}
									echo '</datalist>';
								?>
								</div>
							</div>
						</div>
						<div class = "col-md-4">
							<div class = "well well-md"><strong>2 Core Info</strong></div>
							<div class = "form-group">
								<label>Text Overview</label>
								<textarea class = "form-control" style = "resize:none;" rows = "5" name = "description"></textarea>
							</div>
							<div class = "form-group">
								<label>Pages</label>
								<input type = "number" class = "form-control" name = "pages"/>
							</div>
							<div class = "form-group">
								<label>Year</label>
								<input type = "number" class = "form-control" name = "year"/>
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
								<input type = "number" class = "form-control" name = "edition"/>
							</div>
							<div class = "form-group">
								<label>Cost Price</label>
								<input type = "number" class = "form-control" name = "cost"/>
							</div>
							<div class = "form-group">
								<label>Source of Fund</label>
								<input list = "source" class = "form-control" name = "source"/>
								<div id = "source_datalist">
								<?php
									echo '<datalist id = "source">';
									foreach($data['source'] as $val){
										echo '<option value = "'.$val.'">';
									}
									echo '</datalist>';
								?>
								</div>
							</div>
							<div class = "form-group">
								<label>Class</label>
								<input list = "class" class = "form-control" name = "class"/>
								<div id = "class_datalist">
								<?php
									echo '<datalist id = "class">';
									foreach($data['class'] as $val){
										echo '<option value = "'.$val.'">';
									}
									echo '</datalist>';
								?>
								</div>
							</div>
							<div class = "form-group">
								<label>Stock / Quantity</label>
								<input type = "number" class = "form-control" name = "qty"/>
							</div>
							<div class = "form-group">
								<label>Remarks</label> <small>(optional)</small>
								<select class = "form-control" id = "cbRemarks">
									<?php
										foreach ($data['remarks'] as $val) {
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
				<button class = "btn btn-primary pull-right" name = "btnCreateBook">Save</button>
			</div>
		</div>
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#cbMonth').val("<?php echo date('m')?>");
		$('#cbDay').val("<?php echo date('d')?>");
		$('#cbYear').val("<?php echo date('Y')?>");

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

		$('input[name="bookNumber"]').blur(function(){
			if($(this).val()==""){
				alert('Book number must not be empty!');
				$(this).parent().addClass('has-error');
				$(this).focus();
			}
			else{
				$(this).parent().removeClass('has-error');
			}
		});

		$('input[list="isbn"]').keyup(function(){
			$.post('admin.php',{
				ajax:true,
				action:'createBook',
				field:'isbn',
				chr: $(this).val()
			},
				function(data){
					$('#isbn_datalist').html(data);
			});
		});

		$('input[list="title"]').keyup(function(){
			$.post('admin.php',{
				ajax:true,
				action:'createBook',
				field:'title',
				chr: $(this).val()
			},
				function(data){
					$('#title_datalist').html(data);
			});
		});

		$('input[list="publisher"]').keyup(function(){

			$.post('admin.php',{
				ajax:true,
				action:'createBook',
				field:'publisher',
				chr: $(this).val()
			},
				function(data){
					$('#publisher_datalist').html(data);

			});
		});

		$('input[list="author"]').keyup(function(){
			$.post('admin.php',{
				ajax:true,
				action:'createBook',
				field:'author',
				chr: $(this).val()
			},
				function(data){
					$('#author_datalist').html(data);
			});
		});

		$('input[list="source"]').keyup(function(){
			$.post('admin.php',{
				ajax:true,
				action:'createBook',
				field:'source',
				chr: $(this).val()
			},
				function(data){
					$('#source_datalist').html(data);
			});
		});

		$('input[list="class"]').keyup(function(){
			$.post('admin.php',{
				ajax:true,
				action:'createBook',
				field:'class',
				chr: $(this).val()
			},
				function(data){
					$('#class_datalist').html(data);
			});
		});

	});
</script>