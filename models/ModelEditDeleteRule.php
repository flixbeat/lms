<?php
	require_once 'ModelAdmin.php';

	class ModelEditDeleteRule extends ModelAdmin{

		public function __construct(){
			parent::__construct();
		}

		public function selRule(){
			$qry = "SELECT * FROM tbl_rules";
			$res = $this->con->query($qry);
			return $res;
		}

		public function updateRule($ruleId,$rule,$val){
			$qry = "UPDATE tbl_rules SET rule = '$rule', value = $val WHERE id = $ruleId";
			$res = $this->con->query($qry);
		}

		public function deleteRule($id){
			$qry = "DELETE FROM tbl_rules WHERE id = $id";
			$res = $this->con->query($qry);
		}

	}	
?>