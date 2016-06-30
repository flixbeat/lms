<?php
	require_once 'ModelAdmin.php';

	class ModelLogin extends ModelAdmin{
		public $uname;
		public $pword;
		public $log;
		public function __construct(){
			parent::__construct();
		}

		public function loginAcc($uname,$pword){
			$query = $this->con->query ("SELECT * FROM tbl_users WHERE uname = '$uname' AND pword = '$pword' ");
			if($query->num_rows==1){
				$row = $query->fetch_assoc();
				return $row['id'];
			}
			else
				return 0;
		}
		
	}
?>
