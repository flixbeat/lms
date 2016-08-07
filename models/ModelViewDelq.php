<?php
	require_once 'ModelAdmin.php';

	class ModelViewDelq extends ModelAdmin{
	
		public function __construct(){
			parent::__construct();

			$this->loadObject('User');
			$this->user = new User();
		}

		public function viewDelq(){
			$qry = "SELECT *,(select student_num from tbl_students where id = tblDeq.student_id) as lrn,(select section_id from tbl_students where id = tblDeq.student_id) as secId,(select section from tbl_sections where id = secId) as section,if(remove_status = 1,'Removed','Not Yet Removed') as status,(select student_name from tbl_students where id = tblDeq.student_id) as student FROM tbl_deliquents tblDeq GROUP BY student";
			$res = $this->con->query($qry);
			return $res;
		}

		public function removeDelq($id){
			$qry = "UPDATE tbl_deliquents SET remove_status = 1 WHERE id = $id";
			$res = $this->con->query($qry);
		}

	}	
?>