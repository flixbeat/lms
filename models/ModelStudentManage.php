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

		public function getSections($level = null){
			if($level != null)
				$q = "SELECT section FROM tbl_sections WHERE SUBSTRING(section, 1,1) = '$level';";
			else
				$q = "SELECT section FROM tbl_sections";
			return $this->con->query($q);
		}

		public function getStudents($level = null,$section = null){
			$q = "SELECT st.id,st.student_num, st.student_name, gl.grade_level, sec.section FROM tbl_students st
			INNER JOIN tbl_grade_levels gl ON  st.grade_level_id = gl.id
			INNER JOIN tbl_sections sec ON st.section_id = sec.id WHERE 1";

			if($level != null && $level != "*")
				$q .= " AND gl.grade_level = 'Grade $level'";
			if($section != null && $section != "*")
				$q .= " AND sec.section = '$section'";

			return $this->con->query($q);
		}

		public function saveStudGradeAndSec($records){
			$r = json_decode($records);
			for($i=1; $i<=count($r); $i+=1 ){
				$recR = explode('|',$r[$i-1]);
				$studId = $recR[0];
				$grade = $recR[1];
				$section = $recR[2];
				$q = "UPDATE tbl_students 
					SET grade_level_id = (SELECT id FROM tbl_grade_levels WHERE grade_level = 'Grade $grade'),
					section_id = (SELECT id FROM tbl_sections WHERE section = '$section')
					WHERE id = $studId
				";
				$this->con->query($q);	
			}
			echo "Students' grade and levels has been successfully modified.";
		}
	}
?>