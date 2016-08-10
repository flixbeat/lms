<script>
	$(document).ready(function(){
		
		/*$('#addUsertype').change(function(){
			var x = $(this).val();
			$('#addUserTypeId').val(x);
			// alert($('#addUserTypeId').val());
		});*/
		$('#editUname').change(function(){
			var y = $(this).val();
			$('#editUnameHid').val(y);
			
		});

		$('#editUsertypeId').change(function(){
			var z = $(this).val();
			$('#editUserType').val(z);
			
		});

		var pwd;
		var conPwd;
		$('.pwdLbl').hide();
		$("#tfConf").blur(function(){
			pwd = $('#tfPwd').val();
			conPwd = $(this).val();
		 	if(pwd!=conPwd){
				//alert('Password mismatch');
				$('.pwdLbl').fadeIn();
			}
			else if(pwd==conPwd){
				$('.pwdLbl').hide();
				$('#tfName').prop( "disabled", false);
				$('#userType').prop( "disabled", false);
				$('#btnSub').prop( "disabled", false);
			}
		});
		
		$('.pwdLblEd').hide();
		var pwdEd;
		var conPwdEd;
		$("#tfConfEd").blur(function(){
			pwdEd = $('#editPword').val();
			conPwdEd = $(this).val();
		 	if(pwdEd!=conPwdEd){
				//alert('Password mismatch');
				$('.pwdLblEd').fadeIn();
			}
			else if(pwd==conPwd){
				$('.pwdLblEd').hide();
				$('#edName').prop( "disabled", false);
				$('#btnEdit').prop( "disabled", false);
			}
		});
	});

	function checkLength(el) {
	  if (el.value.length < 6) {
	    alert("length must be 6 characters or greater");
	    //$('#tfConf').prop( "disabled", true);
	  }
	  else if (el.value.length >= 6) {
	  	//$('#tfConf').prop( "disabled", false);
	  }
	}

	function checkLenUname(el) {
	  if (el.value.length < 4) {
	    alert("length must be 4 characters or greater");
	    $('#tfPwd').prop( "disabled", true);
	    $('#tfConf').prop( "disabled", true);
	  }
	  else if (el.value.length >= 6) {
	  	$('#tfPwd').prop( "disabled", false);
	  	$('#tfConf').prop( "disabled", false);

	  }
	}

	function confirmPword(el) {
	  if (el.value.length < 6) {
	    alert("length must be 6 characters or greater")
	  }
	  else if (el.value.length >= 6) {
	  	$('#tfConf').prop( "disabled", false);
	  }
	}

	function confirmPwordEd(el) {
	  if (el.value.length < 6) {
	    alert("length must be 6 characters or greater")
	  }
	  else if (el.value.length >= 6) {
	  	$('#tfConfEd').prop( "disabled", false);
	  }
	}
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
								<input type="text" class="form-control" name="addUname"  onblur="checkLenUname(this)">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" id="tfPwd" name="addPword" onblur="checkLength(this)"  minlength="6">
							</div>
							<div class="form-group">
								<label>Confirm Password</label><p class="text-danger">(Re-enter password to confirm)</p>
								<label class="bg-danger pwdLbl">Password mismatch</label>
								<input type="password" class="form-control" name="confirmPword" onblur="checkLength(this)"  minlength="6" id = "tfConf">
							</div>
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" id = "tfName" name="addName" disabled>
							</div>
							<!--<div class="form-group">
								<label>Position</label>
								<input type="text" class="form-control" id = "tfPosition" name="addPos" disabled>
							</div>-->
							<div class="form-group">
								<label for = "adduserType">Usertype</label>
								<select class = "form-control" id = "userType" name = "addUserType" disabled>
									
									<?php
										$temp_id = 0;

										while ($row = $data['userTypeId']->fetch_assoc()){
											$id = $row['id'];
											$ut = $row['user_type'];
											
											if($temp_id == 0)
												$temp_id = $id;
											echo"<option value = $id>$ut</option>";
										
										}	
									?> 
								</select>									
							</div>
							
							<button name="btnAddUser" class="btn btn-primary" id = "btnSub" disabled>Save</button>
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
								<select class = "form-control" id="editUname" name = "editUname">
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
								<input type="password" class="form-control" id="editPword" name="editPword" onblur = "checkLength(this)"  minlength="6">
							</div>
							<div class="form-group">
								<label>Confirm Password</label><p class="text-danger">(Re-enter password to confirm)</p>
								<label class="bg-danger pwdLblEd">Password mismatch</label>
								<input type="password" class="form-control" name="confirmPwordEd" onblur="checkLength(this)"  minlength="6" id = "tfConfEd" >
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" id = "edName" name="editName" disabled>
							</div>
							<!--div form-group>
								<label>Position</label>
								<input type="text" class="form-control" name="editPos">
							</div-->
							<br>
							<button type="submit" id = "btnEdit" name="btnEditUser" class="btn btn-primary" disabled>Save</button>
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

