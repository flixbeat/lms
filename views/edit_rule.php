<div class="container">
	<h1>Edit Administrative Rules</h1><hr>
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
		<?php
			if(isset($data['alertM'])){
				echo $data['alertM'];
			}
		?>
		<table class="table table-bordered">
			<thead>
				<th>Rule</th>
				<th>Value</th>
				<th>Update Rule</th>
			</thead>

			<tbody>
				<?php
					while($row = $data['resRule']->fetch_assoc()){
						$id = $row['id'];
						$rule = $row['rule'];
						$val = $row['value'];
						$upVals = "$id|$rule|$val";
						echo "<tr><td>$rule</td>";
						echo "<td>$val</td>";
						echo "<td><button class = 'btn btn-success btnUp' value = $upVals  data-toggle = 'modal' data-target = '#update-rule-modal'>Update</td></tr>";
					
					}

				?>
			</tbody>
		</table>
	</div>
	<div class="col-sm-3"></div>
<!-modal for update->
	<div id = "res">
		<div class = "modal fade" id = "update-rule-modal" tabindex = "-1" role = "dialog" aria-labelledby = "book-br" aria-hidden = "true">
			<div class = "modal-dialog modal-sm">
				<div class = "modal-content">
					<div class = "modal-header">
						<button type = "button" class = "close" data-dismiss = "modal" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class = "modal-title" id = "manage-book">Update Rule</h4>
					</div>
					<form action="rule_edit.php" method="get">
						<div class = "modal-body">
							<input type="hidden" id="hidId" name="hidId">
							<label>Rule
								<input type="text" class = "form-control" id = "rule" name="rule" required>
							</label><br><br>
							<label>Value
								<input type="number" class = "form-control" id = "val" name="val" required>
							</label><br>
							<div class = "pull-right">
								<button class="btn btn-primary btnSub" name="btnSub">Submit</button>
							</div>
						</div>
					</form>
					<br><br>
					<div class="modal-footer">
						<div class = 'pull-right'>
							<button class = "btn btn-danger" data-dismiss = "modal">Close</button>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		var btnVal="";
		var valSplit
		$(".btnUp").click(function(){
			btnVal = $(this).val();
			
			valSplit = btnVal.split("|");
			$('#hidId').val(valSplit[0]);
			$('#rule').val(valSplit[1]);
			$('#val').val(valSplit[2]);
		});

	});
</script>