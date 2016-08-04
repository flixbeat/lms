<div class = "container">
	<h3>Top Ten Students (<span class = "text-warning">Chart</span>) SY: <?=$data['sy']?></h3>
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
			
		</div>
	</div>
	
	<div class = "panel panel-primary">
		<div class = "panel-heading">
			<strong>
			<?php
				echo isset($_GET['gradeLevel']) ? "Top 10 ".$_GET['gradeLevel'] : "Top 10 Grade 1"; 
			?>
			</strong>
		</div>
		<div class = "panel-body">
			<div class = "text-center" style = "margin-left: 5%">
				<?php
					include 'libs/inc/chartphp_dist.php';
					$p = new chartphp();
					
					$p->data = array();

					foreach($data['topTen'] as $topTen){
						array_push($p->data,array(array($topTen['section'],$topTen['login_count'])));					
					}

					#array_push($p->data,array(array("Section 7-1",100)));

					#$p->title = isset($_GET['gradeLevel']) ? "Top 10 ".$_GET['gradeLevel'] : "Top 10 Grade 1"; 
					$p->ylabel = "Login Count"; 
					$p->xlabel = "Sections"; 
					
					$p->options["legend"]["show"] = true; 
					$p->series_label = array('Q1','Q2','Q3');  

					$p->chart_type = "bar";
					
					$out = $p->render('c1');

					echo $out;
				?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cbGradeLevel').change(function(){
			$('#gradeLevel').val($(this).val());
			$('input[name="type"]').val('chart');
			$('form').submit();
		});

		$('#gradeLevel').val($('#cbGradeLevel').val());

		<?php if(isset($_GET['gradeLevel'])): ?>
		$('#cbGradeLevel').val("<?=$_GET['gradeLevel']?>");
		<?php endif;?>
	});
</script>
