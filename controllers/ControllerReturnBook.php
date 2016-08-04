<?php
	require_once 'Controller.php';

	class ControllerReturnBook extends Controller{

		public $modelReturn;

		public function invoke(){
			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			$title1 = "Book Returning";
			
			$this->loadView('head',$data = array('title'=>$title1));
			$this->loadView('navbar',null);
			#$this->loadView('book_return',null);
			$this->loadModel('modelReturnBook',null);
			$modelR = new modelReturnBook();
			if(!isset($_GET['btnRet'])){
				$this->loadView('book_return',null);

			}
			else if(isset($_GET['btnRet'])){
				$dueDate = $_GET['HidDueDate'];
				$sNum = $_GET['tfStNum'];
				$bkNum = $_GET['tfBkNum'];
				$idBrw = $_GET['idHid'];
				$modelR->compareDueDate($dueDate);
				$dueCheck = $modelR->dueChk;
				$modelR->checkBook($bkNum,$sNum);
				if($modelR->checkRet ==0){
					echo "<script>alert('Borrowing details not found')</script>";
					$this->loadView('book_return',null);
				}
				else if($modelR->checkRet ==1){					
					$modelR->returnBook($modelR->id);
					echo "<script>alert('Book has been Returned')</script>";
					#$this->loadView('book_return',null);
					
					if($dueCheck == 1){
						echo "<script>alert('Book is overdue')</script>";
						//$this->loadView('book_return',null);
						$modelR->selStudent($sNum);
						$data['idSnum'] = $sNum;
						$data['sName'] = $modelR->sName;
						$data['grd'] = 	$modelR->grdId;
						$data['sec'] = 	$modelR->secId;
						$data['dDate'] = $dueDate;
						$data['bId'] = $idBrw;
						$data['sId'] = $modelR->sId;
						$this->loadView('overdue_view',$data);
					}
					else if($dueCheck == 0){
						echo "<script>alert('Book is not overdue')</script>";
						$this->loadView('book_return',null);
					}
					
					

					
				}
			}	
		
			
			
		}
	}
?>