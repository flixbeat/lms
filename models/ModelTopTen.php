<?php
	require_once 'ModelAdmin.php';
	class ModelTopTen extends ModelAdmin{

		public function __construct(){
			parent::__construct();
		}

		public function getGradeLevels(){
			$q = "SELECT id,grade_level FROM tbl_grade_levels";
			$res = $this->con->query($q);
			return $res;
		}

		public function getTopTen($gradeLevel,$syId){
			$syId = $this->getCurrentSchoolYearId();
			$q = "SELECT student_name,section,count(student_name) as login_count,grade_level 
			FROM tbl_students st INNER JOIN tbl_logbook logbk
			on logbk.student_id = st.id INNER JOIN tbl_grade_levels gl 
			on gl.id = st.grade_level_id INNER JOIN tbl_sections sec 
			on sec.id = st.section_id
			where grade_level = '$gradeLevel' AND logbk.school_year_id = $syId
			group by student_name order by login_count DESC LIMIT 10";

			return $this->con->query($q);
		}

		# dummy function to insert logbook record
		public function x(){
			for($i=1; $i<=3; $i+=1){
				$z = "INSERT INTO tbl_logbook SET student_id = 15, school_year_id = 2, log_date = curDate()";
				$this->con->query($z);
			}
		}
	}
?>