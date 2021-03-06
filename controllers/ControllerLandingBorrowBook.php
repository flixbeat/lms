<?php
	require_once 'Controller.php';

	class ControllerLandingBorrowBook extends Controller{

		public function invoke(){
			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			$title1 = "Book Landing";
			$this->loadView('head',$data = array('title'=>$title1));
			$this->loadView('navbar',null);
			$this->loadView('borrow_landing',null);
			$this->loadView('footer',null);
			
		}
	}
?>