<div class = "container-fluid">
	<h3>DASHBOARD</h3>
	<hr>
	<div class = "row">
		<div class = "col-sm-4">
			<div class = "panel panel-primary">
				<div class = "panel-heading">
					<strong>Control Panel</strong>	
				</div>
				<div class = "panel-body">
					<div class = "row">
						<div class = "col-sm-4">
							<button class = "btn btn-default" data-toggle = "modal" data-target = "#manage-book-modal" ><img src = "imgs/add-book.png" class = "img-responsive"></button>
							<br>Manage Books
						</div>
						<div class = "col-sm-4">
							<button class = "btn btn-default"><img src = "imgs/generate-report.png" class = "img-responsive"></button>
							<br>Generate Reports
						</div>
						<div class = "col-sm-4">
							<button class = "btn btn-default"><img src = "imgs/add-book.png" class = "img-responsive"></button>
							<br>Label
						</div>
					</div>
					<hr>
					<div class = "row">
						<div class = "col-sm-4">
							<button class = "btn btn-default"><img src = "imgs/add-book.png" class = "img-responsive"></button>
							<br>Label
						</div>
						<div class = "col-sm-4">
							<button class = "btn btn-default"><img src = "imgs/add-book.png" class = "img-responsive"></button>
							<br>Label
						</div>
						<div class = "col-sm-4">
							<button class = "btn btn-default"><img src = "imgs/add-book.png" class = "img-responsive"></button>
							<br>Label
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class = "col-sm-8">
			<?php 

				
			?>
			<div class = "panel panel-primary">
				<div class = "panel-heading">
					<strong>Library Student Statistics</strong>
				</div>
				<div class = "panel-body">
					<?php
						include 'libs/inc/chartphp_dist.php';
						$p = new chartphp();
						
						$p->data = array();

						
						foreach($data['gradesR'] as $gradeRes){
							while($row = $gradeRes->fetch_assoc()){
								$section = $row['section'];
								$totalLogin = $row['login_count'];

								#array_push($p->data,array(array("Grade 7",8)));
								array_push($p->data,array(array("Section $section",$totalLogin)));
							}
						}

						#array_push($p->data,array(array("Section 7-1",100)));

						$p->title = "Sections with the most library logins per level."; 
						$p->ylabel = "Login Count"; 
						$p->xlabel = "Level"; 
						
						$p->options["legend"]["show"] = true; 
						$p->series_label = array('Q1','Q2','Q3');  

						$p->chart_type = "bar"; 
						
						$out = $p->render('c1');

						echo $out;
					?>
				</div>
			</div>
		</div>


		<div class = "modal fade" id = "manage-book-modal" tabindex = "-1" role = "dialog" aria-labelledby = "manage-book" aria-hidden = "true">
			<div class = "modal-dialog modal-sm">
				<div class = "modal-content">
					<div class = "modal-header">
						<button type = "button" class = "close" data-dismiss = "modal" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class = "modal-title" id = "manage-book">Manage Library Assets</h4>
					</div>
					<div class = "modal-body">
						<button class = "btn btn-default btn-block"
							onclick = "location.href='admin.php?action=createBook'"
							>Create New Book Entry</button>
						<button class = "btn btn-default btn-block"
							onclick = "location.href='admin.php?action=editBook'">Edit Existing Book Record</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>