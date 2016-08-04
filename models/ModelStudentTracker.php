<?php
	require_once 'ModelAdmin.php';

	class ModelStudentTracker extends ModelAdmin{

		public $checkLog;
		public $checkStud;
		public $sy;
		public $syId;
		public $op;
		public $name;
		public $sec;

		public function __construct(){
			parent::__construct();
		}

		public function selSchoolYear($sy){
			$qry = "SELECT * FROM tbl_school_year WHERE sy = '$sy'";
			$res = $this->con->query($qry);
			if($res->num_rows==1){			
				while($row = $res->fetch_assoc()){
					$this->sy = $row['sy'];
					$this->syId = $row['id'];
				}
			}
		}
		public function selStudent($idNum){
			$qry = "SELECT * FROM tbl_students WHERE student_num ='$idNum'";
			$res = $this->con->query($qry);
			if($res->num_rows==1){			
				$this->checkStud =1;
			}
			else{
				$this->checkStud =0;
			}
		}
		public function libLogin($idNum,$sYear){
			$qry1  = "SELECT id FROM tbl_logbook WHERE student_id = (select id from tbl_students where student_num = '$idNum') AND log_date = curDate() AND school_year_id =$sYear";
			$res1 = $this->con->query($qry1);
			if($res1->num_rows==1){
				$this->checkLog = 1;
				

			}
			else if($res1->num_rows==0){
				$qry2 = "INSERT INTO tbl_logbook SET student_id = (select id from tbl_students where student_num = '$idNum'),school_year_id = $sYear, log_date = curDate()";
				$res2 = $this->con->query($qry2);
				
				if($res2){
					$this->op = "inserted";

					$qry3  = "SELECT (select student_name from tbl_students where id = (select id from tbl_students where student_num = '$idNum')) as student_name,
					 	(select section from tbl_sections where id = (select id from tbl_students where student_num = '$idNum')) as student_section
					FROM tbl_logbook WHERE student_id = (select id from tbl_students where student_num = '$idNum') AND school_year_id = $sYear;";

					$res3 = $this->con->query($qry3);
					if($res3->num_rows==1){
						while($row3 = $res3->fetch_assoc()){
							$this->name = $row3['student_name'];
							$this->sec = $row3['student_section'];
						}
					}
				}
			}
			
		}
}
?> 