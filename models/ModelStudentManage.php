<?php
	require_once 'ModelAdmin.php';
	class ModelStudentManage extends ModelAdmin{

		public function __construct(){
			parent::__construct();
		}

		public function adjustGradeLevels(){
			$q = "UPDATE tbl_students SET grade_level_id = CASE 
					WHEN grade_level_id = 7 THEN 7
					WHEN grade_level_id < 7 THEN grade_level_id + 1 END";

			$this->con->query($q);
		}
	}
?>