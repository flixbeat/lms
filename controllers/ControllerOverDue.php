<?php
	require_once 'Controller.php';

	class ControllerOverDue extends Controller{

		public $model;

		public function invoke(){
			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			$title1 = "Fines Management";

			$data = array('title'=>$title1);
			$this->loadView('head',$data);
			$this->loadView('navbar',null);
			$this->loadView('overdue_view',null);
			$this->loadView('footer',null);			
			
			if(isset($_GET['btnSub'])){
				$sId = $_GET['sId'];
				$bId = $_GET['bId'];
				$dDate = $_GET['tfDDate'];
				$rDate = $_GET['tfRDate'];
				$amt = $_GET['tfAmt'];

				$this->loadModel('ModelAddOverDueFines');
				$this->model = new ModelAddOverDueFines();
				$this->model->addOverDueFine($bId,$sId,$dDate,$rDate,$amt);
				echo "<script>alert('Book Fine Information has been recorded.')</script>";
				$this->model->updateBorrowRecord($bId);
			}
		}
	}
?>