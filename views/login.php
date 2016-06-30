<div class="container">
	<div class="row">
		<div class ="col-sm-3">
			
		</div>
		<div class="col-sm-6 well">
			<h3>Login</h3><hr />
			<form action = "admin_login.php" method = "post">
				<div class="form-group">
					<label>Username</label>
					<input type = "text" name = "uname" class = "form-control">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type = "password" name = "pword" class="form-control">
				</div>
				<button name = "btnLogin" class = "btn btn-primary">Login</button>
			</form>
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