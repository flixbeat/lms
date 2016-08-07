<nav class = "navbar navbar-default">
	<div class="container-fluid">
		<div class = "navbar-header">
			<a class = "navbar-brand" href = "#">Library System</a>

		</div>

		<ul class = "nav navbar-nav">
			<li><a href="admin.php">Dashboard</a></li>
			<li><a href="index.php">Student Search</a></li>

		</ul>

		<ul class = "nav navbar-nav navbar-right">
			<li><a href="pwd_change.php"><span class = "glyphicon glyphicon-user"></span> View Profile (<?= $_SESSION['uname']?>)</a></li>
			
			<li><a href="admin.php?action=logout"><span class = "glyphicon glyphicon-log-out"></span> Logout</a></li>
		</ul>
	</div>
</nav>
	