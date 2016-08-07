<div class="container">
	<h1>Delete Administrative Rules</h1><hr>
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
		<table class="table table-bordered">
			<thead>
				<th>Rule</th>
				<th>Value</th>
				<th>Delete Rule</th>
			</thead>

			<tbody>
				<?php
					while($row = $data['resRule']->fetch_assoc()){
						$id = $row['id'];
						$rule = $row['rule'];
						$val = $row['value'];
						$vals = "$id|$rule|$val";
						echo "<tr><td>$rule</td>";
						echo "<td>$val</td>";
						echo "<td><button class = 'btn btn-success btnYes' value = $vals  data-toggle = 'modal' data-target = '#delete-rule-modal'>Delete Rule</td></tr>";
					
					}

				?>
			</tbody>
		</table>
	</div>
</div>
<div id = "res">
		<div class = "modal fade" id = "delete-rule-modal" tabindex = "-1" role = "dialog" aria-labelledby = "book-br" aria-hidden = "true">
			<div class = "modal-dialog modal-sm">
				<div class = "modal-content">
					<div class = "modal-header">
						<button type = "button" class = "close" data-dismiss = "modal" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class = "modal-title" id = "manage-book">Delete Confirmation</h4>
					</div>
						<div class = "modal-body">
							<label>Rule Details</label>
							<input type="text" class="form-control" id="rule" disabled><br>
							<input type="text" class="form-control" id="val" disabled><hr>
							<label>Are you sure to delete the rule?</label><br>
							<div class = "pull-left">
								<button class="btn btn-danger" class = "btn btn-danger" data-dismiss = "modal">No</button>
							</div>
							<form action="rule_delete.php" method="get">
								<input type="hidden" id="hidId" name="hidId">
								<div class = "pull-right">
									<button class="btn btn-success btnSub" name="btnSub">Yes</button>
								</div>
							</form>
						</div>
					<br><br>
					<!--<div class="modal-footer">
						<div class = 'pull-right'>
							<button class = "btn btn-danger" data-dismiss = "modal">Close</button>	
						</div>
					</div>-->
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		var btnVal;
		var valSplit
		$(".btnYes").click(function(){
			btnVal = $(this).val();
			valSplit = btnVal.split("|")
			$('#hidId').val(valSplit[0]);
			$('#rule').val("Rule: "+valSplit[1]);
			$('#val').val("Value: "+valSplit[2]);


		});

	});
</script>