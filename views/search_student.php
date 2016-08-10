<div class = "container">
	<h3>Search Results</h3>
	<hr>
	<form class = "form" action = "student_search.php" method = "get">
		<div class="col-sm-4">
			<div class = "panel panel-primary">
				<div class = "panel-body">
					<div class = "form-group">
						<div class = "input-group">
							<input type = "text" class = "form-control" id="sNum" name = "sNum" placeholder = "Student LRN" required>
							<div class="input-group-addon"><span class = "glyphicon glyphicon-search"></span> Search</div>
						</div>
					</div>
				</div>
				<div class = "panel-footer">
					<button class = "btn btn-info" onclick = "location.href = 'admin.php'"><span class = "glyphicon glyphicon-arrow-left"></span> Back</button>
				</div>
			</div>
			
		</div>
	</form>
	<br>
	<div id = "results">
		<br><br>
		<?php
			if(isset($data['result'])){
				if($data['result']->num_rows==0){
					echo"<div class='alert alert-danger'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>close</a>
							<strong>Warning!</strong> Student LRN does not exists. No Records. 
						</div>";
				}
				else{
					echo"<table class ='table'>
						<tr>
							<thead>
								<th>Student LRN</th>
								<th>Student Name</th>	
								<th>Grade Level</th>		
								<th>Section</th>
								<th>View Borrowing History</th>
							</thead>	
						</tr>";
						
				
					while($row = $data['result']->fetch_assoc()){
						$id = $row['id'];
						$sNum = $row['student_num'];
						$sName = $row['student_name'];
						$sec = $row['section'];
						echo'<tr><td>'. $row['student_num'].'</td>';
						echo'<td>'. $row['student_name'].'</td>';
						echo'<td>'. $row['grade_level'].'</td>';
						echo'<td>'. $row['section'].'</td>';
						echo"<td><button id = 'viewBrw' onclick = 'viewHistory($id,$sNum)'class = 'btn btn-info' value = $id><span class='glyphicon glyphicon-eye-open'></span> View History</button></td></tr>";
					}
				}	
			}
			echo "</table>";
		?>
	</div>
</div>
<style type="text/css">
	.input-group-addon{
		cursor: pointer;
	}
</style>
<script type="text/javascript">
	$('.input-group-addon').click(function(){
		$('form').submit();
		var sNum  = $("#sNum").val();
		if(sNum == false){
			alert('Please input a student number.');
			location.reload();
		}
	});

	function viewHistory(id,sNum){
	    myWindow=window.open("history_popup.php?id="+id+"&num="+sNum,"myWindow", "width=700, height=400");
	    myWindow.moveTo(200,100);
   		myWindow.document.html("student_edit.php");

	}
</script>