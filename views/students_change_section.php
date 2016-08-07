
<div id = "dataGrade-1" style = "display:none;">
	<?php 
		while($row = $data['section1']->fetch_assoc()){
			echo "<option value = '".$row['section']."'>" .$row['section']. "</option>";
		}
	?>
</div>
<div id = "dataGrade-2" style = "display:none;">
	<?php 
		while($row = $data['section2']->fetch_assoc()){
			echo "<option value = '".$row['section']."'>" .$row['section']. "</option>";
		}
	?>
</div>
<div id = "dataGrade-3" style = "display:none;">
	<?php 
		while($row = $data['section3']->fetch_assoc()){
			echo "<option value = '".$row['section']."'>" .$row['section']. "</option>";
		}
	?>
</div>
<div id = "dataGrade-4" style = "display:none;">
	<?php 
		while($row = $data['section4']->fetch_assoc()){
			echo "<option value = '".$row['section']."'>" .$row['section']. "</option>";
		}
	?>
</div>
<div id = "dataGrade-5" style = "display:none;">
	<?php 
		while($row = $data['section5']->fetch_assoc()){
			echo "<option value = '".$row['section']."'>" .$row['section']. "</option>";
		}
	?>
</div>
<div id = "dataGrade-6" style = "display:none;">
	<?php 
		while($row = $data['section6']->fetch_assoc()){
			echo "<option value = '".$row['section']."'>" .$row['section']. "</option>";
		}
	?>
</div>

<div class = "container">
	<h3>Change Student Level & Section</h3>
	<hr>
	<form action = "student_manage.php" method = "get">
		<input type = "hidden" name = "action" value = "changeSection"/>
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<strong>Filter</strong>
			</div>
			<div class = "panel-body">
				<div class = "col-sm-6">
					<div class = "col-sm-6">
						<div class = "form-group">
							<label>Grade Level</label>
							<select class = "form-control" id = "cbFilterLevel-0" class = "cbLevel">
								<option value = "*">ALL</option>
								<div id = "optionsLevel-0">
								<?php for($i=1;$i<=6;$i+=1): ?>
								<option value = "<?=$i?>"><?=$i?></option>
								<?php endfor;?>
								</div>
							</select>
						</div>
						<input type = "hidden" name = "filterGrade" id = "filterGrade"/>
					</div>
					<div class = "col-sm-6">
						<div class = "form-group">
							<label>Section</label>
							<select class = "form-control" id = "cbFilterSection-0" class = "cbSection">
								<option value = "*">ALL</option>
								<?php 
									while($row = $data['sections']->fetch_assoc()){
										echo "<option value = '".$row['section']."'>" .$row['section']. "</option>";
									}
								?>
							</select>
						</div>
						<input type = "hidden" name = "filterSection" id = "filterSection"/>
					</div>
				</div>
			</div>
			<div class = "panel-footer clearfix">
				<button type = "button" class="btn btn-info" onclick="location.href = 'student_manage.php'"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
				<button class = "btn btn-primary pull-right" name = "btnSearch">Search</button>
			</div>
		</div>
	</form>
	<ul class = "list-group">
		<li class = "list-group-item"><button class = "btn btn-primary btn-sm" id = "btnSave">Save Changes</button></li>
		<li class = "list-group-item">
			<table class = "table table-hover">
				<tr>
					<th>Student LRN</th>
					<th>Student Name</th>
					<th>Grade Level</th>
					<th>Section</th>
				</tr>
				<?php $counter = 1;?>
				<?php $recordCount = $data['students']->num_rows; ?>
				<?php while( $row = $data['students']->fetch_assoc() ): ?>
				<tr>
					<td><?=$row['student_num']?></td>
					<td><?=$row['student_name']?></td>
					<td>
						<select id = "cbFilterLevel-<?=$counter?>">
							<?php for($i=1;$i<=6;$i+=1): ?>
							<option value = "<?=$i?>"><?=$i?></option>
							<?php endfor;?>
						</select>
						<script>
							var level = "<?php echo $row['grade_level']?>";
							var levelR = level.split(' ');
							$("#cbFilterLevel-<?=$counter?>").val(levelR[1]);
						</script>
					</td>
					<td>
						<select id = "cbFilterSection-<?=$counter?>">
						</select>
						
						<script>
							var section = "<?php echo $row['section']?>";
							var sectionR = section.split('-');
							
							$("#cbFilterSection-<?=$counter?>").html($('#dataGrade-'+sectionR[0]).html());
							
							$("#cbFilterSection-<?=$counter?>").val(section);
						</script>
						<input type = "hidden" id = "studId-<?=$counter?>" value = "<?=$row['id']?>" />
					</td>
				</tr>

				<?php $counter+=1; ?>
				<?php endwhile; ?>
			</table>
		</li>
	</ul>
</div>

<script type="text/javascript">
	$("select[id*='cbFilterLevel']").change(function(){
		var id = $(this).attr('id');
		var level = $(this).val();
		idR = id.split('-');
		id = idR[1];
		filterSection(level,id);

		if(level == "*"){
			$('#cbFilterSection-'+id).html(
				"<option value = '*'>ALL</option>" +
				$('#dataGrade-1').html() +
				$('#dataGrade-2').html() +
				$('#dataGrade-3').html() +
				$('#dataGrade-4').html() +
				$('#dataGrade-5').html() +
				$('#dataGrade-6').html()
			);
		}

		$('#filterGrade').val(level);
	});
	$("#cbFilterLevel-0").change();

	$("select[id*='cbFilterSection']").change(function(){
		var id = $(this).attr('id');
		var section = $(this).val();
		idR = id.split('-');
		id = idR[1];

		$('#filterSection').val(section);

	});

	$("#cbFilterSection-0").change();

	function filterSection(level,id){
		if(id == 0){
			$('#cbFilterSection-'+id).html(
				"<option value = '*'>ALL</option>" +
				$('#dataGrade-'+level).html()
			);	
		}
		else
			$('#cbFilterSection-'+id).html($('#dataGrade-'+level).html());
	}

	$('#btnSave').click(function(){
		var recordCount = <?= $recordCount?>;
		var records = [];
		for(var i = 1; i<= recordCount; i+=1){
			var studId = $('#studId-'+i).val();	
			var level = $('#cbFilterLevel-'+i).val();	
			var section = $('#cbFilterSection-'+i).val();
			
			records.push(studId+"|"+level+"|"+section);

				
		}
		saveChanges(records);
	});

	function saveChanges(records){
		$.post(
			'admin.php',
			{
				ajax: true,
				action: 'saveStudSection',
				records: JSON.stringify(records)
			},
			function(data){
				alert(data);
			}
		);
	}

</script>