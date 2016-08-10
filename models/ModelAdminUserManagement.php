<?php
	require_once 'ModelAdmin.php';

	class ModelAdminUserManagement extends ModelAdmin{

		public $user;
		public $userChk;

		public function __construct(){
			parent::__construct();
			$this->loadObject('User');
			$this->user = new User();
		}

		public function getUsers(){
			$q = "SELECT tbl_users.id,uname,name,tbl_usertypes.user_type as utype,position,last_login FROM tbl_users INNER JOIN tbl_usertypes ON tbl_usertypes.id = tbl_users.user_type_id	";
			return $this->con->query($q);
		}

		//datas for the table 	
		public function showUserTypes(){
			$query = ("SELECT * FROM tbl_usertypes");
			$result = $this->con->query($query);
			return $result;
		}
		//dropdown for add usertypes
		public function selectUserType(){
			$query = "SELECT id,user_type FROM tbl_usertypes";
			$result = $this->con->query($query);
			return $result;
		}
		//dropdown for edit username
		public function selectUsername(){
			$query="SELECT id, uname FROM tbl_users";
			$result=$this->con->query($query);
			return $result;
		}
		//dropdown for edit usertypes
		public function selectEditUserType(){
			$query = "SELECT id,user_type FROM tbl_usertypes";
			$result = $this->con->query($query);
			return $result;
		}
		//table for delete
		public function selectUserDelete(){
			$query = "SELECT u.id, u.uname, u.`name`, u.position, utype.user_type FROM tbl_users AS u INNER JOIN tbl_usertypes AS utype ON u.user_type_id = utype.id   ";
			$result = $this->con->query($query);
			return $result;
		}
		//add user
		public function addUser($uname,$pwd,$userTypeId,$name){
			$q = "SELECT id FROM tbl_users WHERE uname LIKE '$uname'";
			$res = $this->con->query($q);
			if($res->num_rows == 0){
				$query = "INSERT INTO tbl_users SET uname = '$uname', pword = md5('$pwd') ,created = now(), user_type_id = $userTypeId, name = '$name'";
				$this->con->query($query);	
				$this->userChk =0;	
				#echo "<script>A new user has been created.</script>";
			}
			else if($res->num_rows == 1){
				$this->userChk =1;
				#echo "<script>Username already exist.</script>";
			}			
		}
		
		public function editUser($id,$pwd,$userTypeId,$name){
			$query = "UPDATE tbl_users SET pword = md5('$pwd'), modified = curDate(), user_type_id = '$userTypeId', name = '$name' WHERE id = '$id'  ";
			$this->con->query($query);
			echo "<script>User has been edited.</script>";
		}

		public function deleteUser($id){
			$query = "DELETE FROM tbl_users WHERE id = '$id'";
			$this->con->query($query);
			echo "<script>User has been deleted.</script>";
		}
	}		
?>