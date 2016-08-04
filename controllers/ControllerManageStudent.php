<?php
	 require_once("controllers/Controller.php");

	 class ControllerManageStudent extends Controller{
	 	public $model;
		
	 	public function invoke(){
	 		session_start();
	 		# redirect if no user session
	 		if(!isset($_SESSION['user'])) $this->redirect('admin_login');

	 		$data['title'] = "General Student Management";

	 		
	 		$this->loadView('head',$data);
	 		$this->loadView('navbar',null);
	 		$this->loadView('manage_student',$data);
	 		$this->loadView('footer',null);
			
	 	}
	}	
?>