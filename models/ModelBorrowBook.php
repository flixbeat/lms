<?php
	require_once 'ModelAdmin.php';

	class ModelBorrowBook extends ModelAdmin{
		
		public $chkStudent;
		public $brChecker;
		public $sameBkChkr;
		public $dueChk;
		public $totalRec;
		public $valRule;

		public function __construct(){
			parent::__construct();
		}	

		public function compareDueDate($dDate){
			$qry = "SELECT '$dDate'>=curDate() as dueDate";
			$res = $this->con->query($qry);
			while ($row = $res->fetch_assoc()) {
				$this->dueChk = $row['dueDate'];
			}
		}
		public function selBookClass(){
			$qry = "SELECT class FROM tbl_classes";
			$res = $this->con->query($qry);
			return $res;

		}

		public function selBook($class){
			$qry = "SELECT id,book_number,title,copy,if(availability = 1,'Available','Unavailable') as stat, availability FROM tbl_books WHERE class = (select id from tbl_classes where class = '$class') ORDER BY copy ASC";
			$res = $this->con->query($qry);
			return $res;
		}

		public function borrowBook($bkId,$sId,$dDate){
			$sy = $this->getCurrentSchoolYearId();
			$qry = "INSERT INTO tbl_borrowing_logbook (book_id,student_id,cur_date,due_date,school_year_id,return_status) VALUES ($bkId,(select id from tbl_students where student_num = $sId),curDate(),'$dDate',$sy,0)";
			$res = $this->con->query($qry); 
			
		}

		public function upAvailability($bkId){
			$qry2 = "UPDATE tbl_books SET availability = 0 WHERE id = $bkId";
			$res2 = $this->con->query($qry2);
		}

		#check if student exists
		public function selStudent($sId){
			$qry = "SELECT * FROM tbl_students WHERE student_num = '$sId'";
			$res = $this->con->query($qry);
			if($res->num_rows == 1){
				$this->chkStudent = "studentExists";
			}
			else if($res->num_rows == 0){
				$this->chkStudent = "studentNotExists";
			}
		}

		public function checkBorrowRecord($bkId,$sId){
			$qry = "SELECT count(*) as totalRec FROM tbl_borrowing_logbook WHERE student_id = (select id from tbl_students where student_num = '$sId') AND cur_date = curDate() AND return_status = 0";
			$res = $this->con->query($qry);
			if($res->num_rows == 1){
				while ($row = $res->fetch_assoc()) {
					$this->totalRec = $row['totalRec'];
				}
			}
		}

		public function checkBorrowExist($bkId,$sId){
			$title;
			$qry1 = "SELECT title FROM tbl_books WHERE id  = $bkId";
			$res1  = $this->con->query($qry1);
			if($res1->num_rows ==1){
				while($row1 = $res1->fetch_assoc()){
					$title = $row1['title'];
				}
			}

			$qry2 = "SELECT * FROM tbl_borrowing_logbook WHERE student_id = (select id from tbl_students where student_num = '$sId')AND return_status = 0 AND book_id = (SELECT id from tbl_books where title = '$title' LIMIT 1)";
			$res2 = $this->con->query($qry2);
			if($res2->num_rows > 0){
				$this->sameBkChkr = "sameBook";
			}
			else if($res2->num_rows == 0){
				$this->sameBkChkr = "notSameBook";
			}

		}

		public function selBorrowRule(){
			$qry = "SELECT tbl_rules.value FROM tbl_rules WHERE rule LIKE 'max_borrow'";
			$res = $this->con->query($qry);
			if($res->num_rows == 1){
				while($row = $res->fetch_assoc()){
					$this->valRule = $row['value'];
				}
			}
		}
	}
?>
