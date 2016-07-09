<?php
	require_once 'ModelAdmin.php';

	class ModelStudentTracker extends ModelAdmin{

		public function __construct(){
			parent::__construct();
		}

		public function libLogin($idNum,$sy){
			$st_grdLvl;
			//$name;
			$qry = "SELECT id,student_num,student_name,grade_level,section FROM tbl_students WHERE student_num = $idNum";
			$res = $this->con->query($qry);
			$status =0;
			if($res->num_rows>=1){
				while($row = $res->fetch_array()){
				$id = $row['id'];
				$st_num = $row['student_num'];
				$st_name = $row['student_name'];
				$st_grdLvl = $row['grade_level'];
				$sec = $row['section'];
				$status = 1;
				}

				$qry3  = "SELECT student_num, log_date FROM tbl_logbook WHERE student_num = $idNum AND log_date=current_date()";	
				$res3 = $this->con->query($qry3);
				
					if($res3->num_rows==1){
						while($row = $res->fetch_array()){
							$name = $row['student_name'];
						}
						echo'<script>
							alert("You are just allowed to login once per day!");
							</script>';
					}
					else{

						$qry2 = "INSERT INTO tbl_logbook SET student_num = $st_num,st_name = '$st_name',grade_level = $st_grdLvl,section = $sec,
								log_date = current_date(),school_year = '$sy'";
						$res2 = $this->con->query($qry2);	
						if($res2){

							echo"<script>
								alert('Student: $st_name Section: $sec, Login has been recorded!');
   								</script>";
							//echo $st_name.","."<br>"."Login has been recorded!"; 
						}
					}				
			}
			else{
				echo'<script>
						alert("Sorry ID is not Registered!");
					</script>';
			
			}
		
		}
	}
?>