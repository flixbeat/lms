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

		# changes mm/dd/yyyy to yyyy-mm-dd
		public function reformatDate($date){
			$dateR = explode('/', $date);
			$year = $dateR[2];
			$day = $dateR[1];
			$month = $dateR[0];
			return $this->formatDate($month,$day,$year);
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

		# dashboard graph
		public function getSectionLogin($grade){
			$syId = $this->getCurrentSchoolYearId();
			$q = "SELECT login_count,student_name,section from 
			(select student_id,count(student_id) as login_count,student_name,section,grade_level from tbl_logbook
			INNER JOIN tbl_students on tbl_logbook.student_id = tbl_students.id
			INNER JOIN tbl_sections on tbl_sections.id = tbl_students.section_id
			INNER JOIN tbl_grade_levels on tbl_grade_levels.id = tbl_students.grade_level_id 
			INNER JOIN tbl_school_year on tbl_school_year.id =  tbl_logbook.school_year_id
			WHERE tbl_logbook.school_year_id = '$syId' AND grade_level = 'Grade $grade' GROUP BY section ORDER BY login_count) as X 

			WHERE login_count = (select max(login_count) FROM

			(select student_id,count(student_id) as login_count,student_name,section,grade_level from tbl_logbook
			INNER JOIN tbl_students on tbl_logbook.student_id = tbl_students.id
			INNER JOIN tbl_sections on tbl_sections.id = tbl_students.section_id
			INNER JOIN tbl_grade_levels on tbl_grade_levels.id = tbl_students.grade_level_id 
			INNER JOIN tbl_school_year on tbl_school_year.id =  tbl_logbook.school_year_id
			WHERE tbl_logbook.school_year_id = '$syId' AND grade_level = 'Grade $grade' GROUP BY section ORDER BY login_count) as Y)";

			$res = $this->con->query($q);
			return $res;
		}

		public function getCurrentSchoolYear(){
			$curYear = date('Y');
			$nextYear = $curYear + 1;
			return "$curYear-$nextYear";
		}

		public function getCurrentSchoolYearId(){
			$curYear = date('Y');
			$nextYear = $curYear + 1;
			$sy = "$curYear-$nextYear";
			$q = "SELECT id FROM tbl_school_year WHERE sy LIKE '$sy'";
			$res = $this->con->query($q);
			$row = $res->fetch_assoc();
			return $row['id'];
		}

		public function setNewSchoolYear(){
			$sy = $this->getCurrentSchoolYear();
			$q = "SELECT id FROM tbl_school_year WHERE sy LIKE '$sy'";
			$res = $this->con->query($q);
			if($res->num_rows == 0){
				$q = "INSERT INTO tbl_school_year SET sy = '$sy'";
				$this->con->query($q);
				return 1;
			}
			else return 0;
		}

		function getClassDatalist(){
			$q = "SELECT class FROM tbl_classes ORDER BY class";
			$res = $this->con->query($q);
			$options = '';
			while($row = $res->fetch_assoc()){
				$options .= '<option value = "'.$row['class'].'">';
			}
			return $options;
		}

		function getAuthorDatalist(){
			$q = "SELECT author FROM tbl_authors ORDER BY author";
			$res = $this->con->query($q);
			$options = '';
			while($row = $res->fetch_assoc()){
				if( ! $this->containsChar('~', $row['author']) )
					$options .= '<option value = "'.$row['author'].'">';
			}
			return $options;
		}

		function getPublisherDatalist(){
			$q = "SELECT publisher FROM tbl_publishers ORDER BY publisher";
			$res = $this->con->query($q);
			$options = '';
			while($row = $res->fetch_assoc()){
				$options .= '<option value = "'.$row['publisher'].'">';
			}
			return $options;
		}

		function getSourceOfFundDatalist(){
			$q = "SELECT source_of_fund FROM tbl_source_of_funds ORDER BY source_of_fund";
			$res = $this->con->query($q);
			$options = '';
			while($row = $res->fetch_assoc()){
				$options .= '<option value = "'.$row['source_of_fund'].'">';
			}
			return $options;
		}

		function getRemarksDatalist(){
			$q = "SELECT remarks FROM tbl_remarks ORDER BY remarks";
			$res = $this->con->query($q);
			$options = '';
			while($row = $res->fetch_assoc()){
				$options .= '<option value = "'.$row['remarks'].'">';
			}
			return $options;
		}

		function containsChar($char,$str){
			return (strpos($str, $char) !== false);
		}

		public function selUser($userId){
			$qry = "SELECT uname,user_type_id,pword,(select user_type from tbl_usertypes where id = tbl_users.user_type_id) as usertype FROM tbl_users WHERE id = $userId";
			$res = $this->con->query($qry); 
			if($res->num_rows == 1){
				while ($row = $res->fetch_assoc()) {
					$this->Uname = $row['uname'];
					$this->usertype = $row['usertype'];
					$this->pword = $row['pword'];
				}
			}
		}

		public function checkOldPassword($oldPwd){
			$qry = "SELECT pword FROM tbl_users WHERE pword = md5('$oldPwd')";
			$res = $this->con->query($qry);
			if($res->num_rows == 1){
				$this->chkOldPwd =1;
			}
			else if($res->num_rows == 0){
				$this->chkOldPwd =0;
			}
		}

		 
	}
?>