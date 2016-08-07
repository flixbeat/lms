<?php
	require_once 'Controller.php';

	class ControllerBorrowBook extends Controller{

		public $model;

		public function invoke(){
			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			$title1 = "Book Borrowing";
			$this->loadModel('ModelBorrowBook');
			$this->model =  new ModelBorrowBook();	
			
			# check book availability
			if(!isset($_GET['btnChk'])){
				
				$resClass = $this->model->selBookClass();
				$data = array('resClass'=>$resClass,'title'=>$title1);
				$this->loadView('head',$data);
				$this->loadView('navbar',null);
				$this->loadView('borrow_book',$data);
			}
			else if(isset($_GET['btnChk'])){
				$resClass = $this->model->selBookClass();
				$data = array('resClass'=>$resClass,'title'=>$title1);
				$class = $_GET['bookClass'];
				$resBook = $this->model->selBook($class);
				$data = array('resBook'=>$resBook,'title'=>$title1,'resClass'=>$resClass,'class'=>$class);
				$this->loadView('head',$data);
				$this->loadView('navbar',null);
				$this->loadView('borrow_book',$data);
				
			}
			
			# borrowing submission 
			if(isset($_GET['btnSub'])){
				#declarations of values and variables
				$sId = $_GET['tfSNum'];
				$bkId = $_GET['bkId'];
				$dDate = $_GET['tfdDate'];
				$tit = $_GET['tit2'];
				$cpy = $_GET['cpy2']; 
				$class = $_GET['cls'];
				

				#calling of model functions in model BorrowBook
				$this->model->selStudent($sId);
				$this->model->compareDueDate($dDate);
				$this->model->checkBorrowRecord($bkId,$sId);
				$this->model->checkBorrowExist($bkId,$sId);
				$this->model->selBorrowRule();

				#property use for checker validations
				$studentChecker = $this->model->chkStudent;
				$dueChecker = $this->model->dueChk;
				$brwRec = $this->model->totalRec;
				$sameBkChkr = $this->model->sameBkChkr;
				#echo "<script>alert($brwRec)</script>";
				#conditional statements for the different validations

				//conditon for student validation
				if($studentChecker == "studentExists"){
					#echo "<script>alert('Student is Registered')</script>";

					//condition for due date validation
					if($dueChecker == 1){
						#echo "<script>alert('Due date is valid.')</script>";

						//condition for total borrowing records
						if($brwRec!=$this->model->valRule){
							#echo "<script>alert('Student can still borrow a book.')</script>";

							// condition for the borrowed book
							if($sameBkChkr == "sameBook"){
								echo "<script>alert('Student already borrowed the book.')</script>";
							}
							else if($sameBkChkr == "notSameBook"){
								#echo "<script>alert('Student not yet borrowed the book.')</script>";
								
								//calling of functions for the borrow book and updating the availability
								$this->model->borrowBook($bkId,$sId,$dDate);
								$this->model->upAvailability($bkId);
								echo "<script>alert('Book has been borrowed')</script>";

							}// end of condition for the borrowed book
						}
						if($brwRec==$this->model->valRule){
							echo "<script>alert('Student cannot borrow a book. 2 books is already borrowed.')</script>";	
						}//end of total borrowing condition

					}
					else if($dueChecker == 0){
						echo "<script>alert('Due date invalid.')</script>";	
					}// end of due date condition
					
				}
				else if($studentChecker == "studentNotExists"){
					echo "<script>alert('Student is not Registered')</script>";
				}//end of student validation

			}
		}
	}
?>