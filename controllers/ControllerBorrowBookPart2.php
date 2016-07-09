<?php
	require_once 'Controller.php';

	class ControllerBorrowBookPart2 extends Controller{

		public $modelBorrow;

		public function invoke(){
			$title1 = "Borrow Book";
			
			$this->loadView('head',$data = array('title'=>$title1));
			$this->loadView('navbar',null);
			
			if(isset($_GET['tfStNum'])){
				$stu_num = $_GET['tfStNum'];
				$dueDate = $_GET['tfDueDate'];
				$bkNum = $_GET['hidBkNum'];
				$bookTitle = $_GET['bkTitle'];
				$this->loadModel('ModelBorrowBook');
				$this->modelBorrow = new ModelBorrowBook();
				$this->modelBorrow->checkerBorrow($bkNum,$stu_num);
				if($this->modelBorrow->pwede==1){
					$this->modelBorrow->borrowBook($bkNum,$stu_num,$dueDate);
					$data['bookNum'] = $bkNum;
					$data['bookTitle'] = $bookTitle;
					$data['bookDueDate'] = $dueDate;
					$data['studentNum'] = $stu_num;
					$data['studentName'] = $this->modelBorrow->name;
					echo "<script>alert('Book has been Borrowed')</script>";
					$this->loadView('borrow_landing',$data);
				}
				else{
					echo "<script>alert('You still have existing borrowed book!')</script>";
					$this->loadView('borrow_book',null);
				}
			}
			else{
				$this->loadView('borrow_book_part2',null);
			}
			$this->loadView('footer',null);
		}
	}
?>