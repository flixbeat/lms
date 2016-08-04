<div class="container">
	<h2>Student Library Login 
		<div class = "pull-right">
			SY:
			<?php echo $data['sy']?>
		</div>
	</h2>

	<button class = "btn btn-default pull-right" onclick = "location.href = 'index.php'"><span class = "glyphicon glyphicon-home"></span> Home</button>
	
	<hr>

	<div class="col-sm-3">
	</div>
	
	<div class="col-sm-6">
		<div class="logAlert">
		<?php
			/*$name=null;
			$sec=null;
			$op=null;
			$chkLog=null;
			$chkStud=null;*/
			if(isset($data['chkStud'])){
				$chkStud = $data['chkStud'];
				if($chkStud == 0){
					echo "<div class='alert alert-danger'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>close</a>
							<strong>Login Failed!</strong> Student is not registered.
						</div>";
				}
			}
			if(isset($data['chkLog'])){
				$chkLog=$data['chkLog'];
				
					echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>close</a>
						<strong>Login Failed!</strong> You can just login once per day.
					</div>";
				
			}

			if(isset($data['name'])){
				$name = $data['name'];
				$sec = $data['sec'];
				$op = $data['op'];

				echo "<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>close</a>
						<strong>Login Success!</strong> Name: $name, Section: $sec
					</div>";
			}
		?>
			
		</div>
		<div class ="panel panel-primary">
			<div class="panel-heading">
				<strong>Student Login</strong>
				<div class = "pull-right">
					<?php echo date("Y/m/d")?>
				</div>
			</div>
			<form action="student_tracker.php" method = "get">
				<div class = "panel-body">
					<label>Student Number</label>
					<input type = "text" name = "tfSnum" class="form-control" required>
					<div class = "pull-right"><br>
						<button class="btn btn-primary" value="<?php echo $op?>">Login</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-sm-3">
	</div>
</div>
