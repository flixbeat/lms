<nav class = "navbar navbar-default">
	<div class="container-fluid">
		<div class = "navbar-header">
			<a class = "navbar-brand" href = "#">Saint Louis School Center Library System</a>

		</div>

		<!--ul class = "nav navbar-nav">
			<li><a href="admin.php">Dashboard</a></li>
			<li><a href="index.php">Student Search</a></li>
		</ul>

		<ul class = "nav navbar-nav navbar-right">
			<li><a href="admin.php?action=logout"><span class = "glyphicon glyphicon-log-out"></span> Logout</a></li>
		</ul-->
	</div>
</nav>

<div class = "container">
	<img class = "img-responsive" src = "imgs/panorama.jpg"/>
	<hr>
	<div class = "row">
		<div class = "col-sm-5">
			<h4>Welcome To Online Library Management System (SLSC)</h4>
			<hr>
		
			<p>
				<img class = "img-responsive img-circle" src = "imgs/logo.jpg" width= "40%" height = "40%" style = "float:left">
				Welcome to Online Library Management System exclusively for Saint-Loius School Center
				Elementary Department.
			</p>
			<p>
				To start using the system, click any of the buttons below found under 'Access library data' panel.
			</p>
			<p>
				To deploy book search module for the students, simply hit the 'search books button' under 'access library data'.
				To enter book management, hit the button with 'M' symbol. Be aware that only authorized library personnel with registered accounts can access the management page, adding
				new accounts may need administrative privileges.
			</p>
			<div class = "panel panel-primary">
				<div class = "panel-heading">
					<strong>Access library data</strong>
				</div>
				<div class = "panel-body">
					<div class = "row text-center">
						<div class = "col-sm-4">
							<button class = "btn btn-default" onclick="location.href = 'index.php?action=searchBook'"><img src = "imgs/search-book.png" class = "img-responsive"></button><br>
							Search Books
						</div>
						<div class = "col-sm-4">
							<button class = "btn btn-default" onclick = "location.href='student_tracker.php'"><img src = "imgs/graph.png" class = "img-responsive"></button><br>
							Student Tracker
						</div>
						<div class = "col-sm-4">
							<button class = "btn btn-default" onclick="location.href = 'admin.php'"><img src = "imgs/management.png" class = "img-responsive"></button><br>
							Management
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class = "col-sm-7">
			<div id = "x" class = "carousel slide" data-ride = "carousel">
				<!-- indicators -->
				<ol class = "carousel-indicators">
					<li data-target = "#x" data-slide-to = "0" class = "active"></li>
					<li data-target = "#x" data-slide-to = "1"></li>
					<li data-target = "#x" data-slide-to = "2"></li>
				</ol>
			
				<!--wrapper for slides-->
				<div class = "carousel-inner" role = "listbox">
					<div class = "item active">
						<img src = "imgs/1.jpg" alt = "">
					</div>
					<div class = "item">
						<img src = "imgs/2.jpg" alt = "">
					</div>
					<div class = "item">
						<img src = "imgs/3.jpg" alt = "">
					</div>
				</div>

				<!-- controls -->
				<a class="left carousel-control" href="#x" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#x" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>

			</div>
			<br>
			
			
		</div>
	</div>
</div>