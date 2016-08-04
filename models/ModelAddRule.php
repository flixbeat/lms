<?php
	require_once 'ModelAdmin.php';

	class ModelAddRule extends ModelAdmin{

		public $user;
		
		public function __construct(){
			parent::__construct();

			$this->loadObject('User');
			$this->user = new User();
		}

		public function addRule($rule,$val){
			$qry = "INSERT INTO tbl_rules (rule,value) VALUES ('$rule',$val)";
			$res = $this->con->query($qry);
		}

	}	
?>