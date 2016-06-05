<nav class = "navbar navbar-default">
	<div class="container-fluid">
		<div class = "navbar-header">
			<a class = "navbar-brand" href = "#">Library System</a>

		</div>
		<ul class = "nav navbar-nav">
			<?php 
				if(basename($_SERVER['PHP_SELF'])=="admin.php"){
					echo '
						<li><a href="admin.php">Dashboard</a></li>
					';
				}
			?>
		</ul>
	</div>
</nav>
