<div class="container">
	<div class="row">
		<div class ="col-sm-3">
			
		</div>
		<div class="col-sm-6">
			<div class = "panel panel-warning">
				<div class = "panel-heading">
					<strong>Administrative Login</strong>
				</div>
				<div class = "panel-body">
					<form action = "admin_login.php" method = "post">
						<div class="form-group">
							<label>Username</label>
							<input type = "text" name = "uname" class = "form-control">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type = "password" name = "pword" class="form-control">
						</div>
						
					</form>
				</div>
				<div class = "panel-footer clearfix">
					<button class = "btn btn-default" onclick = "location.href = 'index.php'"><span class = "glyphicon glyphicon-home"></span> Back to Home</button>
					<button name = "btnLogin" class = "btn btn-warning pull-right"><span class = "glyphicon glyphicon-log-in"></span> Login</button>
				</div>
			</div>
			
		</div>
		<div class = "col-sm-3">

		</div>
	</div>
</div>
<style>
	.row{
		margin-top: 5em;
	}
</style>
<script type="text/javascript">
	$('button[name="btnLogin"]').click(function(){
		$('form').submit();
	});
</script>