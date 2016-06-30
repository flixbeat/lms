<?php
	require_once 'Model.php';
	class ModelAdmin extends Model{
		public $book;
		protected $queryLimit;

		public function __construct(){
			$this->connectDB();
			$this->queryLimit = 10;
		}

		# for storing date in a table
		public function formatDate($month,$day,$year){
			return "$year-$month-$day";
		}

		public function initBook($bookId){
			$this->loadObject('Book');
			$this->book = new Book($bookId);
		}

		// for remarks drop down - create and edit book UI
		public function getRemarks(){
			$remarks = array();
			$query = "SELECT remarks FROM tbl_remarks";
			$res = $this->con->query($query);
			while($row = $res->fetch_assoc()){
				array_push($remarks,$row['remarks']);
			}
			return $remarks;
		}

		public function getSectionLogin($grade){
			$q = "SELECT login_count,student_name,section from 
			(select student_id,count(student_id) as login_count,student_name,section,grade_level from tbl_logbook
			INNER JOIN tbl_students on tbl_logbook.student_id = tbl_students.id
			INNER JOIN tbl_sections on tbl_sections.id = tbl_students.section_id
			INNER JOIN tbl_grade_levels on tbl_grade_levels.id = tbl_students.grade_level_id 
			WHERE grade_level = 'Grade $grade' GROUP BY section ORDER BY login_count) as X 

			WHERE login_count = (select max(login_count) FROM

			(select student_id,count(student_id) as login_count,student_name,section,grade_level from tbl_logbook
			INNER JOIN tbl_students on tbl_logbook.student_id = tbl_students.id
			INNER JOIN tbl_sections on tbl_sections.id = tbl_students.section_id
			INNER JOIN tbl_grade_levels on tbl_grade_levels.id = tbl_students.grade_level_id 
			WHERE grade_level = 'Grade $grade' GROUP BY section ORDER BY login_count) as Y)";

			$res = $this->con->query($q);
			return $res;
		}


	}
?>