<script>
	$(document).ready(function(){
		
		$('#addUsertype').change(function(){
			var x = $(this).val();
			$('#addUserTypeId').val(x);
			alert($('#addUserTypeId').val());
		});

		$('#editUname').change(function(){
			var y = $(this).val();
			$('#editUnameHid').val(y);
			
		});

		$('#editUsertypeId').change(function(){
			var z = $(this).val();
			$('#editUserType').val(z);
			
		});
		
	});
</script>

<div class="container">
	<h3>User Management</h3>
	<button class = "btn btn-info pull-right" onclick = "location.href = 'admin.php'"><span class = "glyphicon glyphicon-arrow-left"></span> Back</button>
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#home">Home</a></li>	
			<li><a data-toggle="tab" href="#add">Add</a></li>	
			<li><a data-toggle="tab" href="#edit">Edit</a></li>	
			<li><a data-toggle="tab" href="#delete">Delete</a></li>	
		</ul>
	<br>
	
</div>

<div class="tab-content">
	<div id="home" class="tab-pane fade in active">
		<div class = "row">
			<div class="col-md-6 col-md-offset-3">

				<!--table class = "table table-bordered">
					<tr>
						<th>Usertype</th>
					</tr>
					<?php
						/*
						while($row = $data['resultSet']->fetch_assoc()){
							$u = $row['user_type'];
							echo '<tr><td>'.$u.'</td></tr>';
						}*/
					?>

				</table-->
				<div class = "panel panel-primary">
					<div class = "panel-heading">
						<strong>List of Users</strong>
					</div>
					<div class = "panel-body">
						<table class = "table table-bordered">
							<tr>
								<th>Username</th>
								<th>Name</th>
								<th>Usertype</th>
								<th>Position</th>
								<th>Last Login</th>
							</tr>
							<?php while($row = $data['users']->fetch_assoc() ):?>
								<tr>
									<td><?=$row['uname']?></td>
									<td><?=$row['name']?></td>
									<td><?=$row['utype']?></td>
									<td><?=$row['position']?></td>
									<td><?=$row['last_login']?></td>
								</tr>	
							<?php endwhile;?>
							
						</table>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<div id="add" class="tab-pane fade">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-primary">
					<div class = "panel-heading">
						<strong>Add User</strong>
					</div>
					<div class ="panel-body">
						<form id="add" action = "user_management.php" method = "post">
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="addUname">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="addPword">
							</div>
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" name="addName">
							</div>
							<div class="form-group">
								<label>Position</label>
								<input type="text" class="form-control" name="addPos">
							</div>
							<div class="form-group">
								<label for = "adduserType">Usertype</label>
								<select class = "form-control" id = "addUsertype" name = "addUserType">
									
									<?php
										$temp_id = 0;

										while ($row = $data['userTypeId']->fetch_assoc()){
											$id = $row['id'];
											$ut = $row['user_type'];
											
											if($temp_id == 0)
												$temp_id = $id;
											echo"<option value = '$id'>$ut</option>";
										
										}	
									?> 
								</select>									
							</div>
							<input type="hidden" name = "addUserType" id="addUserTypeId" value="<?php echo $temp_id; ?>">
							<button name="btnAddUser" class="btn btn-primary">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<div id="edit" class="tab-pane fade">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-primary">
					<div class = "panel-heading">
						<strong>Edit User</strong>
					</div>					
					<div class ="panel-body">
						<form action="user_management.php" method="post">
							<div class="form-group">
							<label for = "editUname">Username</label>
								<select class = "form-control" id="editUname" name = "editUname" >
									<?php

										$temp_uId = 0;
										while ($row = $data['editUname']->fetch_assoc()){
											$u_id = $row['id'];
											$uname = $row['uname'];
											
											if($temp_uId == 0)
												$temp_uId = $u_id;
											echo"<option value = $u_id>$uname</option>";
										}	
									?>
								</select>
								<input type='hidden' name='editUnameHid' value = "<?php echo $temp_uId;?>" name ='editUnameHid' id='editUnameHid'>
							</div>
							<div class="form-group">
								<label for = "edituserType">Usertype</label>
								<select class = "form-control" id="editUsertypeId" name = "editUserType" >
									<?php
										$temp_eId = 0;
										while ($row = $data['editUsertypeId']->fetch_assoc()){
											$id = $row['id'];
											$ut = $row['user_type'];
											if($temp_eId == 0)
												$temp_eId = $id;
											echo"<option value = $id>$ut</option>";
										}	
									?>
								</select>
								<input type="hidden" name = "editUserType" value="<?php echo $temp_eId;?>" id="editUserType">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="editPword">
							</div>
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" name="editName">
							</div>
							<div form-group>
								<label>Position</label>
								<input type="text" class="form-control" name="editPos">
							</div>
							<br>
							<button type="submit" name="btnEditUser" class="btn btn-primary">Save</button>
						</form>
					</div>				
				</div>
			</div>
		</div>
	</div>
	<div id="delete" class="tab-pane fade">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class = "panel panel-primary">
					<div class = "panel-heading">
						<strong>Delete Users</strong>
					</div>
					<div class = "panel-body">
						<form action="user_management.php" method="post"> 
						 	<table class="table table-hover">
								
									<tr>
										<th>Username</th>
										<th>Position</th>
										<th>Usertype</th>
										<th>Name</th>
										<th>Delete</th>
									</tr>
									<?php
										while($row = $data['deleteResultSet']->fetch_assoc()){
											
											$u = $row['uname'];
											$name = $row['name'];
											$pos = $row['position'];
											$utype = $row['user_type'];
											
											echo'<tr><td>'.$u.'</td>';
											echo '<td>'.$name.'</td>';
											echo '<td>'.$pos.'</td>';
											echo '<td>'.$utype.'</td>';
											
											echo '<td><button name = "btnDeleteUser" class="btn btn-primary" id="btnDeleteUser" value="'.$row['id'].'">Delete</button></td></tr>';
										}
									?>
								<input type="hidden" name="deleteUsertype" id="deleteUsertype" >	
							</table>
						</form>		
					</div>
				</div>
					
			</div>
		</div>
	</div>
</div>

