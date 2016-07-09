<?php
	require_once 'Controller.php';

	class ControllerBorrowBook extends Controller{

		public $modelBorrow;

		public function invoke(){
			$title1 = "Book Management";
			
			$this->loadView('head',$data = array('title'=>$title1));
			$this->loadView('navbar',null);
			if(!isset($_GET['bookNum'])){
				$this->loadView('borrow_book',null);
			}
			else if(isset($_GET['bookNum'])){
				
				$bookAvail = $_GET['hidQty'];
				$bookNum = $_GET['hidNum'];
				$bookTitle = $_GET['hidTitle'];
				if($bookAvail >0){
					$data['bookNum'] = $bookNum;
					$data['bookTitle'] = $bookTitle;
					$data['bookAvail'] = $bookAvail;
					$this->loadView('borrow_book_part2',$data);


				}
				else if($bookAvail ==0){
					echo "<script>alert('Book Not Available')</script>";
					$this->loadView('borrow_book',null);
				}
				
		
			}
			
		}
	}
?>