<?php
	require_once 'ModelAdmin.php';

	class ModelEditStudent extends ModelAdmin{

		public $chkStudent;
		public $sId;
		public $sName;
		public $sec;
		public $sec2;
		public $secId;
		public $grdLvl;
		public $grdLvlId;
		public $sNum;

		public function __construct(){
			parent::__construct();
		}

		public function selStudent($stNum){
			$qry = "SELECT *,(select section from tbl_sections where id = tblS.section_id) as sec,(select grade_level from tbl_grade_levels where id = tblS.grade_level_id) as grdLvl FROM tbl_students tblS WHERE student_num = '$stNum'";
			$res = $this->con->query($qry);

			if($res->num_rows == 1){
				while($row = $res->fetch_assoc()){
					$this->sId=$row['id'];
					$this->sNum=$row['student_num'];
					$this->sName=$row['student_name'];
					$this->grdLvlId=$row['grade_level_id'];
					$this->grdLvl=$row['grdLvl'];
					$this->secId=$row['section_id'];
					$this->sec=$row['sec'];
				}
				$this->chkStudent = 1;

			}
			else{
				$this->chkStudent = 0;
			}

		}

		public function selGradeLevel(){
			$qry = "SELECT * FROM tbl_grade_levels";
			$res = $this->con->query($qry);
			return $res;
			
		}

		public function updateStudent($id,$sName,$grdLvl,$sec){
			$qry = "UPDATE tbl_students SET student_name = '$sName',grade_level_id = (select id from tbl_grade_levels where grade_level = '$grdLvl'),section_id  = $sec WHERE id = $id";
			$res = $this->con->query($qry);
		}

		public function selSec($idSec){
			$qry = "SELECT section FROM tbl_sections WHERE id = $idSec";
			$res = $this->con->query($qry);

			if($res->num_rows == 1){
				while($row = $res->fetch_assoc()){
					$this->sec2 = $row['section'];
				}
			}
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


	}
?>	