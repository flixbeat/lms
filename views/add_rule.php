<div class="container">
	<h1>Adding of Administrative Rules</h1><hr>
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
		<?php
			if(isset($data['alertM'])){
				echo $data['alertM'];
			}
		?>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<strong>Add Rules Panel</strong>
			</div>	
			<form action="rule_add.php" method="get">
				<div class="panel-body">
					<label>Rule</label>
					<input type="text" name="tfRule" class="form-control" required><br>
					<label>Value</label>
					<input type="number" name="tfVal" class="form-control" required>
				</div>
				<div class="panel-footer">
					
					<div class="pull-right">
						<button class="btn btn-primary" id="btnAdd" name="btnAdd">Add Rule</button>
						</form>
					</div>
					
					<button class="btn btn-info" onclick = "location.href='admin.php'"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-3"></div>
</div>