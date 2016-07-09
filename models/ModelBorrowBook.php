<?php
	require_once 'ModelAdmin.php';

	class ModelBorrowBook extends ModelAdmin{
		
		public $checker;
		public $title;
		public $bkNum;
		public $book_qty;
		public $avail;
		public $name;
		public $pwede;

		public function __construct(){
			parent::__construct();
		}	

		public function checkBook($bkNum){
			$bkNum = $this->sanitizeGET($bkNum);
			$qry = "SELECT title,book_number,availability FROM tbl_books WHERE book_number = $bkNum";
			$res = $this->con->query($qry);
			
			if($res->num_rows>=1){
				while($row = $res->fetch_assoc() ){
					$bkNum = $row['book_number'];
					$title = $row['title'];
					$book_qty = $row['availability'];
				}
			}
			else{
				$bkNum = "N/A";
				$title = "N/A";
				$book_qty = "N/A";
			}
			return "$bkNum|$title|$book_qty";
		}

		public function checkerBorrow($bookNum,$idNum){
			$qry = "SELECT * FROM tbl_borrowing_logbook WHERE book_id = (select id from tbl_books where book_number = $bookNum) AND student_id = (select id from tbl_students s where s.student_num = $idNum) AND cur_date = curDate() AND return_status =0";
			$res = $this->con->query($qry);
			if($res->num_rows==1){
				$this->pwede = 0;
			}
			else{
				$this->pwede = 1;
			}

		}
		public function borrowBook($bookNum,$idNum,$dueDate){
			echo $this->bkNum;
			$book_id;
			$stu_id;
			$avail;
			$qry0 = "SELECT id,student_name FROM tbl_students WHERE student_num = $idNum";
			$res0 = $this->con->query($qry0);
				if($res0->num_rows==1){
					while ($row0 = $res0->fetch_assoc()) {
						$stu_id = $row0['id'];
						$this->name = $row0['student_name'];
					}
				}

			$qry1 = "SELECT id,availability FROM tbl_books WHERE book_number = $bookNum";
			$res1 = $this->con->query($qry1);
				if($res1->num_rows==1){
					while($row1 = $res1->fetch_assoc() ){
						$book_id = $row1['id'];
						$this->avail = $row1['availability'];
					}
				}
			$qry2 = "INSERT INTO tbl_borrowing_logbook (book_id,student_id,cur_date,due_date,return_status) VALUES ($book_id,$stu_id,curDate(),'$dueDate',0)";
					$res2 = $this->con->query($qry2);
					if($res2){
						$this->avail-=1;
					}

			$qry3 = "UPDATE tbl_books SET availability = $this->avail WHERE book_number = $bookNum";
					$res3 = $this->con->query($qry3);
					
			return $this->name;
		}
	}
?>
