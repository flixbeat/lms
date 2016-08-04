<?php
	require_once 'Controller.php';

	class ControllerPopup extends Controller{

		public function invoke(){
			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			$title1 = "View Borrowing History";
			$this->loadView('head',$data = array('title'=>$title1));
			$data['id']=$_GET['id'];
			$data['sNum']=$_GET['num'];
			$this->loadView('popup_history',$data);
			$this->loadView('footer',null);
		}
	}
?>