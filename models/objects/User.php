<?php
	require_once 'models/MySQLConnection.php';
	class User extends MySQLConnection{

		public function __construct(){
			$this->connectDB();
		}

		public function getUserType($userId){
			$q = "SELECT (SELECT user_type FROM tbl_usertypes WHERE id = tbl_users.user_type_id) as user_type FROM tbl_users WHERE id = $userId";
			$res = $this->con->query($q);
			$row = $res->fetch_assoc();
			return $row['user_type'];
		}

		public function getUserTypeId($userId){
			$q = "SELECT (SELECT id FROM tbl_usertypes WHERE id = tbl_users.user_type_id) as id FROM tbl_users WHERE id = $userId";
			$res = $this->con->query($q);
			$row = $res->fetch_assoc();
			return $row['id'];
		}

	}
?>