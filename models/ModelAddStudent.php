<?php
	require_once 'ModelAdmin.php';

	class ModelAddStudent extends ModelAdmin{

		public $idGrdLvl;
		public $grdLvl;
		public $stExist;
		public function __construct(){
			parent::__construct();
		}

		public function selGradeLevel(){
			$qry = "SELECT * FROM tbl_grade_levels";
			$res = $this->con->query($qry);
			return $res;
			
		}

		public function selSection($sec){
			$qry = "SELECT * FROM tbl_sections WHERE section LIKE '$sec%'";
			$res = $this->con->query($qry);
			if($res->num_rows>=1){
				while($row = $res->fetch_assoc()){
					$secId= $row['id'];
					$section = $row['section'];
					echo "<option value=$secId>$section</option>";
					
				}
			}	
			
		}

		public function selStudent($sNum){
			$qrySt = "SELECT student_num FROM tbl_students WHERE student_num = '$sNum'";
			$resSt = $this->con->query($qrySt);

			if($resSt->num_rows==1){
				$this->stExist = 1;
			}
			else{
				$this->stExist = 0;
			}
		}
		public function addStudent($sNum,$sName,$grd,$sec){
			$qry = "INSERT INTO tbl_students (student_num,student_name,grade_level_id,section_id)
					 VALUES ('$sNum','$sName',(SELECT id FROM tbl_grade_levels WHERE grade_level = '$grd'),$sec)";
			$res = $this->con->query($qry);
			return $res;
		}

	}
?>