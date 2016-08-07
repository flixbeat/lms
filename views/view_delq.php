<div class="container">
	<h1>Deliquent Borrowers Records</h1><hr>
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
		<?php
			if(isset($data['alertM'])){
				echo $data['alertM'];
			}
		?>
		<table class="table table-bordered">
			<thead>
				<th>Student LRN</th>
				<th>Student</th>
				<th>Total Over Due Days</th>
				<th>Section</th>
				
			</thead>
			<form action="delq_view.php" method="get">
				<tbody>
					<?php
						while($row = $data['resDelq']->fetch_assoc()){
							$id = $row['id'];
							$lrn = $row['lrn'];
							$sId = $row['student'];
							$total_due_days = $row['total_due_days'];
							$sec = $row['section'];
							#$rmv_status = $row['status'];
							echo "<tr><td>$lrn</td>";
							echo "<td>$sId</td>";
							echo "<td>$total_due_days</td>";
							echo "<td>$sec</td></tr>";
							#echo "<td>$rmv_status</td>";
							#echo "<td><button class = 'btn btn-success btnRemove' value = $id type='submit' name = 'btnRemove'>Remove</td></tr>";
						
						}
						#echo "<input type = 'hidden' id = 'delqId' name = 'id'>";
					?>
				</tbody>
			</form>
		</table>
	</div>
	<div class="col-sm-3"></div>

<!--<script>
	$(document).ready(function(){
		var btnVal="";
		var valSplit
		$(".btnRemove").click(function(){
			btnVal = $(this).val();
			$('#delqId').val(btnVal);
			//alert($('#delqId').val());
			
		});

	});
</script>-->