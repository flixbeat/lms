<?php
	require_once 'Controller.php';

	class ControllerChangePwd extends Controller{

		public $model;
		public function invoke(){

			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			$this->loadModel('ModelChangePwd');
			$this->model = new ModelChangePwd();


			$title1 = "Password Management";

			$data = array('title'=>$title1);
			$this->loadView('head',$data);
			$this->loadView('navbar',null);
			

			if(!isset($_POST['save'])){
				$this->loadView('change_pwd',$data);
			}
			else if(isset($_POST['save'])){
				$id = $_POST['hidId'];
				$pwd = $_POST['tfNewPwd'];

				$this->model->updatePassword($pwd,$id);
				#echo "<script>alert('Password has been updated')</script>";
				session_destroy();
				$this->redirect('admin_login');
			}

			$this->loadView('footer',null);			
		
		}
	}
?>