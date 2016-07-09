<?php
	require_once 'Controller.php';

	class ControllerReturnBook extends Controller{

		public $modelReturn;

		public function invoke(){
			$title1 = "Book Returning";
			
			$this->loadView('head',$data = array('title'=>$title1));
			$this->loadView('navbar',null);
			$this->loadView('book_return',null);
			$this->loadModel('modelReturnBook',null);
			if(isset($_GET['btnRet'])){
				if(empty(($_GET['idHid']))){
					echo "<script>alert('Borrowing details not found')</script>";
				}
				else if(!empty($_GET['idHid'])){
					$id = $_GET['idHid'];
					$modelR = new modelReturnBook();
					$modelR->returnBook($id);
					echo "<script>alert('Book has been Returned')</script>";

				}
			}	
		
			
			
		}
	}
?>