<style>
	#tf{
		margin-left: 10cm;
		margin-right: 10cm;
	}
	#lbl{
		margin-left: 10cm;
	}
	#btnLogin{
		margin-left: 14cm;
	}
</style>

	<div class = "wrapper container">
			<br>
			<br>	
			<div class = "col-md-12">
				<center>
					<h1>Saint Louis School Center Elementary Department<br>Library Management System <br>(LOG BOOK SY 2016-2017)
						<p><?php echo "Today's Date " . date("Y/m/d")?></p>
					<br>
					</h1>
				</center>
				
			</div>
			
				
				
				
					<form action="student_tracker.php" method="post">
					<input type = "hidden" name = "syHid" value = "2016-2017">
						<div class = "input-group right-addon" id = "tf">
						<input type = "text" id = "idNum" name = "idNum" class = "form-control" placeholder = "ID Number" required/>
						<div class="input-group-addon"><span class = "glyphicon glyphicon-share-alt"></span> Press Enter</div>
						</div>
						<br>
						
				
					</form>
				
				
				
		</div>
