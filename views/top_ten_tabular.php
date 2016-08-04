<div class = "container">
	<h3>Top Ten Students (<span class = "text-success">Tabular</span>) SY: <?=$data['sy']?></h3>
	
	<button class = "btn btn-warning btn-sm pull-right"
		onclick = "location.href = 'top_ten.php?type=chart'"
	>Chart</button>

	<button class = "btn btn-success btn-sm pull-right"
		onclick = "location.href = 'top_ten.php?type=tabular'"
	>Tabular</button>
	
	<hr>

	<div class = "row">
		<div class = "col-sm-4">
			<div class = "panel panel-primary">
				<div class = "panel-heading">
					<strong>Select Grade Level</strong>
				</div>
				<div class = "panel-body">
					<select class = "form-control" id = "cbGradeLevel">
						<?php foreach($data['gradeLevels'] as $gradeLevel):?>
						<option><?=$gradeLevel['grade_level']?></option>
						<?php endforeach;?>
					</select>
					<form action = "top_ten.php" method = "get">
						<input type = "hidden" name = "gradeLevel" id = "gradeLevel"/>
						<input type = "hidden" name = "type"/>
					</form>
				</div>
				<div class = "panel-footer">
					<button class = "btn btn-info" onclick = "location.href = 'admin.php'"><span class = "glyphicon glyphicon-arrow-left"></span> Back</button>
				</div>
			</div>
		</div>
		<div class = "col-sm-8">
			<div class = "panel panel-primary">
				<div class = "panel-heading">
					<strong>
					<?php
						echo isset($_GET['gradeLevel']) ? "Top 10 ".$_GET['gradeLevel'] : "Top 10 Grade 1"; 
					?>
					</strong>
				</div>
				<div class = "panel-body" id = "tabular-data">
					<table class = "table table-hover">
						<tr>
							<th>Top</th>
							<th>Section</th>
							<th class = "stud-name">Student Name</th>
							<th>Library Entry</th>
						</tr>
						<?php foreach($data['topTen'] as $num=>$topTen):?>
							<tr>
								<td><?=$num+1?></td>
								<td><?=$topTen['section']?></td>
								<td class = "stud-name"><?=$topTen['student_name']?></td>
								<td><?=$topTen['login_count']?></td>
							</tr>
						<?php endforeach?>
					</table>
				</div>
				<div class = "panel-footer">
					<button class= "btn btn-primary" onclick="print('#tabular-data')"><span class="glyphicon glyphicon-print"></span> Print</button>
					<span class = "pull-right">Hide Student Name</span> <input type = "checkbox" class = "pull-right" id = "chkHideStudName"> 
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cbGradeLevel').change(function(){
			$('#gradeLevel').val($(this).val());
			$('input[name="type"]').val('tabular');
			$('form').submit();
		});

		$('#gradeLevel').val($('#cbGradeLevel').val());

		<?php if(isset($_GET['gradeLevel'])): ?>
		$('#cbGradeLevel').val("<?=$_GET['gradeLevel']?>");
		<?php endif;?>

		$('#chkHideStudName').click(function(){
			var isChecked = $(this).is(':checked');
			if(isChecked)
				$('.stud-name').fadeOut();
			else
				$('.stud-name').fadeIn();
		});
	});

	function print(elementId){

		var data = $(elementId).html();
		
		var mywindow = window.open('', 'my div', 'height=640,width=800');
        mywindow.document.write('<html><head><title><?=isset($_GET["gradeLevel"]) ? "Top 10 ".$_GET["gradeLevel"] : "Top 10 Grade 1"; ?></title>');
        mywindow.document.write('<link rel = "stylesheet" href = "css/tabular.css"/>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        //mywindow.close();

        return true;
	}
</script>
