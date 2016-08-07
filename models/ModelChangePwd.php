<?php
	require_once 'ModelAdmin.php';
	class ModelChangePwd extends ModelAdmin{
		
		public $chkOldPwd;
		public $oldPwd;
		/*public function checkOldPassword($oldPwd){
			$qry = "SELECT pword FROM tbl_users WHERE pword = $oldPwd";
			$res = $this->con->query($qry);
			if($res->num_rows == 1){
				$this->chkOldPwd =1;
				$this->oldPwd = $row['pword'];
			}
			else if($res->num_rows == 0){
				$this->chkOldPwd =0;
			}
		} */

		public function updatePassword($newPwd,$id){
			$qry = "UPDATE tbl_users SET pword = md5('$newPwd') WHERE id = $id";
			$res = $this->con->query($qry);
		}	
	}
?>