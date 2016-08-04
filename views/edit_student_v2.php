<div class="container">
	<h2>Edit Student Information</h2>
	<hr>
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
		<?php
			if(isset($data['alertM'])){
				echo $data['alertM'];
			}
		?>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<strong>Edit Student Panel</strong>
			</div>
				<form action="student_edit_v2.php" method="get">
					<div class="panel-body">
						<label>Student Number</label>
						<input type="text" class="form-control" value = "<?php echo $data['sNum'];?>" name = "tfSNum" id = "tfSNum" disabled>
						<input type="hidden" class="form-control" value = "<?php echo $data['sNum'];?>" name = "SNum">
						<br>
						<input type="hidden" name = "hidId" value="<?php echo $data['id']?>">
						<label>Student Name</label>
						<input type="text" class="form-control" value = "<?php echo $data['sName'];?>" name="tfSName" id="tfSName" required><br>
						<p class = 'text-success'>Current Grade Level Record: <?php echo $data['grdLvl'];?></p>
						<label>Grade Level</label>
						<select class="form-control" id = "selGrdLvl" name = "selGrdLvl">
							<?php
								while($row = $data['resGrdLvl']->fetch_assoc()){
									$grdLvl = $row['grade_level'];
									$gId = $row['id'];
									echo "<option value = '$grdLvl'>$grdLvl</option>";
									
								}
							?>
						</select></br>
						<p class = 'text-success'>Current Section Record: <?php echo $data['sec'];?></p>
						<label>Section</label>
						<select class="form-control" id = "selSec" name = "selSec" required>
							<option>Choose:</option>
						</select><br>
						<div class="pull-right">
							<button class="btn btn-primary" name="btnEdit">Edit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		var grdLvl;
		var section;
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