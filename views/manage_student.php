
<div class = "container">
	<h3>General Student Management</h3>
	<button class = "btn btn-info pull-right" onclick = "location.href = 'admin.php'"><span class = "glyphicon glyphicon-arrow-left"></span> Back</button>
	<hr>
	<div class "row">
		<div class = "col-sm-3">
			<div class = "panel panel-primary">
				<div class = "panel-heading">
					<strong>Student Grade Levels</strong>
				</div>
				<div class = "panel-body text-center">
					<form action = "student_manage.php" method = "post" id = "frmAdjustGradeLevels">
						<button class = "btn btn-warning" name = "btnAdjustGradeLevels">All student grade level + 1</button>
					</form>
					<hr>
					<p class = "text-justify"><small>The button above will adjust all students grade level by adding 1 to their current grade level. 
					This will be useful when a new school year arrives since their grade level will change.
					However, student who didn't passed the the year must be edited manually.
					Grade 6 will be marked as graduates and will not be included in some
					data gathering functions like top 10. 
					<span class = "text-danger"><strong>Note: The section will not be changed, only the grade level.</strong></span>
					</small>
					</p>
				</div>
			</div>
		</div>
		<div class = "col-sm-3">
			<div class = "panel panel-primary">
				<div class = "panel-heading">
					<strong>Students' Level & Section</strong>
				</div>
				<div class = "panel-body text-center">
					<button class = "btn btn-primary"
						onclick = "location.href='student_manage.php?action=changeSection'"
					>View students with their <br> current level & sections.</button>
					<hr>
					<p class = "text-justify">
						<small>
							List students and <span class = "text-info"><strong>change their level and/or sections</strong></span> easily.
						</small>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	/*
	$('button[name="btnAdjustGradeLevels"]').click(function(){
		var conf = confirm("Are you sure you wanted to add 1 to all grade levels? this cannot be undone.");
		if(conf){
			$('#frmAdjustGradeLevels').submit();
		}	
	});
	*/
</script>