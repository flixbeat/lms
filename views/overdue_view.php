<div class="container">
	<h1>Overdue Fines</h1><hr>
	<div class = "panel panel-primary">
		<div class="panel-heading">
			<strong>Overdue Details</strong>
		</div>
		<div class="panel-body">
			<form action="overdue.php" method="get">
				<div class="col-sm-4">
					<input type="hidden" name="bId" value = "<?php echo $data['bId']?>">
					<input type="hidden" name="sId" value = "<?php echo $data['sId']?>">
					<input type="hidden" class="form-control" name="tfDDate" id="tfDDate" value = "<?php echo $data['dDate']?>">
					<input type="hidden" class="form-control" name="tfRDate" id="tfRDate" value = "<?php echo date('Y/m/d')?>">
					<label>Enter Due Amount</label>
					<input type="text" class="form-control" name="tfAmt" id="tfAmt"><br>
					<div class="pull-right">
						<button class="btn btn-primary" name="btnSub">Submit</button>
					</div>
					<br><br><br>
				</div>
			</form>
			<div class="col-sm-4">
				<label>Student Num</label>
				<input type="text" class="form-control" name="tfSNum" id="tfSName" value = "<?php echo $data['idSnum']?>" disabled><br>
				<label>Student Name</label>
				<input type="text" class="form-control" name="tfSName" id="tfSName" value = "<?php echo $data['sName']?>" disabled><br>
				<label>Returned Date</label>
				<input type="text" class="form-control" name="tfRDate" id="tfRDate" value = "<?php echo date('Y/m/d')?>" disabled>
			</div>
			<div class="col-sm-4">
				<label>Grade Level</label>
				<input type="text" class="form-control" name="tfGrdLvl" id="tfGrdLvl" value = "<?php echo $data['grd']?>" disabled><br>
				<label>Section</label>
				<input type="text" class="form-control" name="tfSec" id="tfSec" value = "<?php echo $data['sec']?>" disabled><br>
			</div>
			<div class="col-sm-4">
				<label>Due Date</label>
				<input type="text" class="form-control" name="tfDDate" id="tfDDate" value = "<?php echo $data['dDate']?>" disabled><br>
				
			</div>
		</div>
	</div>
</div>