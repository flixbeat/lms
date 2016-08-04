<?php
	require_once 'Controller.php';

	class ControllerBorrowBookPart2 extends Controller{

		public $modelBorrow;

		public function invoke(){
			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			$title1 = "Borrow Book";
			
			$this->loadView('head',$data = array('title'=>$title1));
			$this->loadView('navbar',null);
			
			if(isset($_GET['tfStNum'])){
				$stu_num = $_GET['tfStNum'];
				$dueDate = $_GET['tfDueDate'];
				$dateBase = date("Y-m-d");
				$this->loadModel('ModelBorrowBook');
				$modelBorrow = new ModelBorrowBook();
				$modelBorrow->checkStudentId($stu_num);
				$chk_student = $modelBorrow->stuChk;

				if($dueDate<$dateBase){
					echo "<script>alert('Invalid Due Date');</script>";
					$this->loadView('borrow_book',null);
				}
				else{
					if($chk_student == true){
					
						
						$bkNum = $_GET['hidBkNum'];
						$bookTitle = $_GET['bkTitle'];
						
						
						$modelBorrow->checkerBorrow($bkNum,$stu_num);
						if($modelBorrow->pwede==1){
							$modelBorrow->borrowBook($bkNum,$stu_num,$dueDate);
							$data['bookNum'] = $bkNum;
							$data['bookTitle'] = $bookTitle;
							$data['bookDueDate'] = $dueDate;
							$data['studentNum'] = $stu_num;
							$data['studentName'] = $modelBorrow->name;
							echo "<script>alert('Book has been Borrowed')</script>";
							$this->loadView('borrow_landing',$data);
						}
						else{
							echo "<script>alert('You still have existing borrowed book!')</script>";
							$this->loadView('borrow_book',null);
						}
					}
					else{
						echo "<script>alert('Student Number is not registered')</script>";
						$this->loadView('borrow_book',null);
					}
				}
			}
			else{
				$this->loadView('borrow_book_part2',null);
			}
			$this->loadView('footer',null);
		}
	}
?>