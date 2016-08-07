<?php
	 require_once("controllers/Controller.php");

	 class ControllerManageStudent extends Controller{
	 	public $model;
			
	 	public function __construct(){
	 		$this->loadModel('ModelStudentManage');
	 		$this->model = new ModelStudentManage();
	 	}

	 	public function invoke(){
	 		session_start();
	 		# redirect if no user session
	 		if(!isset($_SESSION['user'])) $this->redirect('admin_login');

	 		$data['title'] = "General Student Management";

	 		if(isset($_POST['btnAdjustGradeLevels'])){
	 			$this->model->adjustGradeLevels();
	 			$this->redirect('admin');	
	 		}
	 		
	 		$this->loadView('head',$data);
	 		$this->loadView('navbar',null);
	 		$this->loadView('manage_student',$data);
	 		$this->loadView('footer',null);
			
	 	}
	}	
?>