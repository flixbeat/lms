<div class="container">
	<h1>Password Management</h1><hr>
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<strong>Change Password</strong>
			</div>	
			
			<div class="panel-body">
				Username: <label><?php echo $_SESSION['uname']?></label><br>
				Access Level: <label><?php echo $_SESSION['usertype']?></label></label><hr>
				<input type = "hidden" value = "<?php echo $_SESSION['pwd']?>" id = "sesPwd">
				<label>Old Password</label>
					<input type="hidden" class = "form-control" id="oldChkr">
					<div class = "form-group">
						<div class = "input-group">
							<input type = 'password' class = 'form-control' name = 'tfOldPwd' id = 'tfOldPwd' required>
							<div class="input-group-addon"><button id="btnChk"><span class = "glyphicon glyphicon-ok"></span> Check Password</button></div>
						</div>
					</div>
					<form action="pwd_change.php" method="post">
						<input type="hidden" name = "hidId" value="<?php echo $_SESSION['user']?>">
						<label>New Password</label>
						<input type = 'password' class = 'form-control' id = 'tfNewPwd' name = 'tfNewPwd' disabled required><br>
						<label>Confirm Password</label><p class="text-danger">(Re-enter password to confirm)</p>
						<input type = 'password' class = 'form-control' id = 'tfConPwd' disabled required><br>
						<div class = "pull-right">
							<button class="btn btn-primary btnSub" name="save" disabled>Save</button>
						</div>
						<br>
					</form>

			</div>
			<div class="panel-footer">
				<button class="btn btn-info" onclick = "location.href='admin.php'"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
			</div>
			</div>
		</div>
	</div>
	<div class="col-sm-3"></div>
</div>

<script>
	var oldPwd;
	$(document).ready(function(){
		$("#tfNewPwd").blur(function(){
		 	if ($(this).val().length < 6) {
	    		alert("length must be 6 characters or greater");
	    		$('#tfConPwd').prop( "disabled", true);
			}
			if ($(this).val().length >= 6) {
				$('#tfConPwd').prop( "disabled", false);
			}
		});

		$("#tfConPwd").blur(function(){
		 	if($(this).val() == $("#tfNewPwd").val()){
		 		$('.btnSub').prop( "disabled", false);
		 	}
		 	if($(this).val() != $("#tfNewPwd").val()){
		 		$('.btnSub').prop( "disabled", true);
		 	}
		});

		$("#btnChk").click(function(){
			oldPwd = $('#tfOldPwd').val();
			$.ajax({
				type: 'post',
				url: 'admin.php',

				data:{

					ajax: true,
					action: 'chkOldPwd',
					oldPwd: $('#tfOldPwd').val()					
				},
				success: function(data){
					$('#oldChkr').val(data);
					if($('#oldChkr').val() == $('#sesPwd').val()){
						$('#tfNewPwd').prop( "disabled", false);
					}
					if($('#oldChkr').val() != $('#sesPwd').val()){
						$('#tfNewPwd').prop( "disabled",true);
						alert('Password incorrect.');
					}
				}

			});
		});

	});
	
</script>