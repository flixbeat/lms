<?php
	require_once 'ModelAdmin.php';

	class ModelReturnBook extends ModelAdmin{

		public $avl;
		public $checkRet;
		public $id;
		public $dueChk;
		public $sName;
		public $secId;
		public $grdId;
		public $sId;
		public $totalDueDays;
		public $finePrice;
		public $delqRule;

		public function __construct(){
			parent::__construct();
		}

		public function checkBook($bookNum,$stuNum){
			$$bookNum = $this->sanitizeGET($bookNum);
			$qry1 = "SELECT id,due_date,(select book_number from tbl_books b where b.id = lb.book_id) as book_num,(select title from tbl_books b where b.id = lb.book_id) as title,(select student_name from tbl_students s where s.id = lb.student_id) as student_name,(select student_num from tbl_students s where s.id = lb.student_id) as student_num FROM tbl_borrowing_logbook lb WHERE book_id = (select id from tbl_books where book_number = $bookNum) AND student_id = (select id from tbl_students where student_num = '$stuNum') AND return_status = 0";
			
			$res1 = $this->con->query($qry1);

			if($res1->num_rows==1){
				while($row1 = $res1->fetch_assoc()){
					$id=$row1['id'];
					$dueDate=$row1['due_date'];
					$bkNum=$row1['book_num'];
					$bkTitle=$row1['title'];
					$stuNum=$row1['student_num'];
					$stuName=$row1['student_name'];
				}
				$this->checkRet =1;
				$this->id = $id;

			}
			else{
				$this->checkRet =0;
				$id=null;
				$dueDate='N/A';
				$bkNum='N/A';
				$bkTitle='N/A';
				$stuNum='N/A';
				$stuName='N/A';
			}	
			return "$id|$dueDate|$bkNum|$bkTitle|$stuNum|$stuName";
		}

		public function returnBook($id){
			$qry1 = "SELECT availability FROM tbl_books WHERE id = (select book_id from tbl_borrowing_logbook where id = $id)";
			$res1 = $this->con->query($qry1);
				if($res1->num_rows==1){
					while($row1 = $res1->fetch_assoc()){
						$this->avl = $row1['availability'];
					}
				}
			$id = $this->sanitizeGET($id);
			$qry2 = "UPDATE tbl_borrowing_logbook SET return_date = curDate(),return_status =1 WHERE id = $id";
			$res2 = $this->con->query($qry2);

			if($res2){
				$qry3 = "UPDATE tbl_books SET availability = 1 WHERE id = (select book_id from tbl_borrowing_logbook where id = $id)";
				$res3 = $this->con->query($qry3);
			}
		}

		public function compareDueDate($dDate){
			$qry = "SELECT '$dDate'<curDate() as dueDate";
			$res = $this->con->query($qry);
			while ($row = $res->fetch_assoc()) {
				$this->dueChk = $row['dueDate'];
			}
		}

		public function selStudent($sNum){
			$qry = "SELECT *,(select section from tbl_sections where id = tblst.section_id) as sec,(select grade_level from tbl_grade_levels where id = tblst.grade_level_id) as grdLvl FROM tbl_students tblSt WHERE student_num = $sNum";
			$res = $this->con->query($qry);
			if($res->num_rows ==1){
				while($row = $res->fetch_assoc()){
					$this->sName = $row['student_name'];
					$this->grdId = $row['grdLvl'];
					$this->secId = $row['sec']; 
					$this->sId = $row['id'];
				}
			}
		}

		public function selOverDueDays($id){
			$qry = "SELECT brLog.due_date, DATEDIFF(curDate(),brLog.due_date) AS dueDays from tbl_borrowing_logbook brLog WHERE id = $id";
			$res = $this->con->query($qry);
			if($res->num_rows ==1){
				while($row = $res->fetch_assoc()){
					$this->totalDueDays = $row['dueDays'];
				}
			}
		}

		public function selFineRule($bookNum){
			$qry = "SELECT tbl_rules.value FROM tbl_rules WHERE rule = (select if(is_fiction = 1,'fiction_fine','non_fiction_fine') as kind from tbl_books where book_number = $bookNum)";
			$res = $this->con->query($qry);
			if($res->num_rows ==1){
				while($row = $res->fetch_assoc()){
					$this->finePrice = $row['value'];
				}
				
			}
		}

		public function selDeliquentRule(){
			$qry = "SELECT tbl_rules.value FROM tbl_rules WHERE rule = 'deliquent_day_count'";
			$res = $this->con->query($qry);
			
			if($res->num_rows == 1){
				while($row = $res->fetch_assoc()){
					$this->delqRule = $row['value'];
				}
			}	
		}

		public function addDeliquent($sNum,$totDueDays){
			$qry = "INSERT INTO tbl_deliquents SET student_id = (select id from tbl_students where student_num = '$sNum'), total_due_days = $totDueDays";
			$res = $this->con->query($qry);
		}
	}
?>