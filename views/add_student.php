<div class="container">
	<h2>Add Student Information</h2><hr>
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
		<?php
			echo $data['alertM'];
		?>
		<input type = "hidden" id = "hidChk">
		<div id = 'alertExist'>
			<div class='alert alert-danger'>
				<strong>Warning!</strong> Sorry, student number already exists.<br>Please input a unique student number to add a record.  
			</div>
		</div>
		<div id = 'alertNotEx'>
			<div class='alert alert-success'>
				<strong>Success!</strong> Student number is unique. You can now add a student record.
			</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<strong>Add Student Panel</strong>
			</div>
				<div class="panel-body">
					<label>Student Number</label>
					<input type="text" class="form-control" id ="sNum_v1" required>
					<br>
					<p class = 'text-danger'>(Please check first the student number to enable the form.)    
					<button id = 'btnChk' class="btn btn-warning">Check Student #</button></p>
				<form action="student_add.php" method="get">
					<input type="hidden" class="form-control" id ="sNum_v2" name="tfStudNum">
					<label>Last Name</label>
					<input type="text" class="form-control" id = "tfStudLName" name="tfStudLName" required disabled><br>
					<label>First Name</label>
					<input type="text" class="form-control" id = "tfStudFName" name="tfStudFName" required disabled><br>
					<label>Middle Name</label>
					<input type="text" class="form-control" id = "tfStudMName" name="tfStudMName" required disabled><br>
					<label>Grade Level</label>
					<select class = "form-control" id = "selGrdLvl" name = "selGrdLvl" disabled>
					
						<?php
							
							while($row = $data['resGrdLvl']->fetch_assoc()){
								$grdLvl = $row['grade_level'];
								$gId = $row['id'];
								echo "<option value = '$grdLvl'>$grdLvl</option>";
								
							}
						
						?>
					</select>
					<input type = "hidden" id = "grdHid">
					<br>
					<label>Section</label>
					<select class="form-control" id = "selSec" name = "selSec" disabled>
						
					</select>
				</div>
				<div class="panel-footer">
					
					<div class="pull-right">
						<button class="btn btn-primary" id="btnAdd" name="btnAdd" disabled>Add Student</button>
					</div>
					</form>
					<button class="btn btn-info" onclick = "location.href='admin.php'"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
				</div>
			
		</div>
	</div>
	<div class = "col-sm-3"></div>
</div>
<div id="res">
	
</div>
<script>
	$(document).ready(function(){
		var grdLvl;
		var section;
		$('#alertExist').hide();
		$('#alertNotEx').hide();
		$('#btnChk').click(function(){
			if($('#sNum_v1').val()==false){
				alert('Please Input a Student Number');
				location.reload();
			}
			else{
				$.ajax({
					type: 'post',
					url: 'admin.php',

					data:{

						ajax: true,
						action: 'selStudent',
						sNum: $('#sNum_v1').val()					
					},
					success: function(data){
						$("#hidChk").val(data);
						var checker = $("#hidChk").val();
						if(checker == 1){
							$('#alertExist').fadeIn();
							$('#tfStudLName').prop('disabled',true);
							$('#tfStudFName').prop('disabled',true);
							$('#tfStudMName').prop('disabled',true);
							$('#selGrdLvl').prop('disabled',true);
							$('#selSec').prop('disabled',true);
							$('#btnAdd').prop('disabled',true);
							$('#alertNotEx').fadeOut();
							//$('#btnChk').click();
						}
						else if(checker == 0){
							$('#alertNotEx').fadeIn();
							$('#tfStudLName').prop('disabled',false);
							$('#tfStudFName').prop('disabled',false);
							$('#tfStudMName').prop('disabled',false);
							$('#selGrdLvl').prop('disabled',false);
							$('#selSec').prop('disabled',false);
							$('#btnAdd').prop('disabled',false);
							$('#alertExist').fadeOut();
							$('#sNum_v2').val($('#sNum_v1').val());
							$('#btnChk').click();
						}

					}

				});
			}
		});	

		$('#selGrdLvl').change(function(){
			grdLvl = $(this).val();
			$('#grdHid').val(grdLvl);

			var str = grdLvl.split(" ");

			$.ajax({
				type: 'post',
				url: 'admin.php',

				data:{

					ajax: true,
					action: 'selSection',
					grdStr: str[1]
				},
				success: function(data){
					$('#selSec').html(data);
				}
			});
			
		});

		$('#selSec').change(function(){
			section = $(this).val();
			
		});
		
		$('#selGrdLvl').change();
		$('#selSec').change();
	});
</script> 