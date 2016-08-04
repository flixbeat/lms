<?php
	require_once 'ModelAdmin.php';

	class ModelSearchStudent extends ModelAdmin{

		public function __construct(){
			parent::__construct();
		}

		public function searchStudent($sNum){
			$qry = "SELECT id,student_num, student_name,(select section from tbl_sections where id = section_id) as section, (select grade_level from tbl_grade_levels where id = grade_level_id) as grade_level FROM tbl_students WHERE student_num = '$sNum'";
			$res = $this->con->query($qry);
			return $res;
		}

		public function filterByDate($id,$date1,$date2){
			$qry = "SELECT id,(select title from tbl_books where id = book_id) as title,(select availability from tbl_books where id = book_id) as qty,cur_date,due_date,return_date,if(return_status = 1,'Returned','Not yet Returned') as status FROM tbl_borrowing_logbook
 				WHERE (cur_date BETWEEN '$date1' AND '$date2') AND student_id = $id";
 			$res = $this->con->query($qry);

 			if($res->num_rows==0){
				echo"<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>close</a>
						<strong>Warning!</strong> No Records. 
					</div>";
			}
			else{
				echo"<table class ='table'>
					<tr>
						<thead>
							<th>Title</th>
							<th>Date Borrowed</th>	
							<th>Due Date</th>		
							<th>Return Date</th>
							<th>Return Status</th>
							<th>Book Availability</th>
						</thead>	
					</tr>";
					
			
				while($row = $res->fetch_assoc()){
					$id = $row['id'];
					echo'<tr><td>'. $row['title'].'</td>';
					echo'<td>'. $row['cur_date'].'</td>';
					echo'<td>'. $row['due_date'].'</td>';
					echo'<td>'. $row['return_date'].'</td>';
					echo'<td>'. $row['status'].'</td>';
					echo'<td>'. $row['qty'].'</td></tr>';
				}
			}	
		
		echo "</table>";
		}

	}
?>