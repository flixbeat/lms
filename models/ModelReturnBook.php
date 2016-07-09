<?php
	require_once 'ModelAdmin.php';

	class ModelReturnBook extends ModelAdmin{

		public $avl;

		public function __construct(){
			parent::__construct();
		}

		public function checkBook($bookNum,$stuNum){
			$qry1 = "SELECT id,due_date,(select book_number from tbl_books b where b.id = lb.book_id) as book_num,(select title from tbl_books b where b.id = lb.book_id) as title,(select student_name from tbl_students s where s.id = lb.student_id) as student_name,(select student_num from tbl_students s where s.id = lb.student_id) as student_num FROM tbl_borrowing_logbook lb WHERE book_id = (select id from tbl_books where book_number = $bookNum) AND student_id = (select id from tbl_students where student_num = $stuNum) AND return_status = 0";
			
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

			}
			else{
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
						echo $this->avl = $row1['availability'];
					}
				}
			$id = $this->sanitizeGET($id);
			$qry2 = "UPDATE tbl_borrowing_logbook SET return_date = curDate(),return_status =1 WHERE id = $id";
			$res2 = $this->con->query($qry2);

			if($res2){
				$this->avl+=1;
				$qry3 = "UPDATE tbl_books SET availability = $this->avl WHERE id = (select book_id from tbl_borrowing_logbook where id = $id)";
				$res3 = $this->con->query($qry3);
			}
		}
	}
?>