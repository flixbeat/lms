<?php
	require_once 'Controller.php';

	class ControllerAddRule extends Controller{

		public $model;
		public function invoke(){

			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			$this->loadModel('ModelAddRule');
			$this->model = new ModelAddRule();
			
			if($this->model->user->getUserType($_SESSION['user']) != "Administrator"){
				echo "<script>alert('Restricted Page. Please contact your system administrator.')</script>";
				echo "<script>location.href = 'admin.php'</script>";
				die();
			}


			$title1 = "Administration Management";

			$data = array('title'=>$title1);
			$this->loadView('head',$data);
			$this->loadView('navbar',null);

			

			if(isset($_GET['btnAdd'])){
				$rule = $_GET['tfRule'];
				$val = $_GET['tfVal'];
				$this->model->addRule($rule,$val);
				$data['alertM'] = "<div class='alert alert-success'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>close</a>
							<strong>Success!</strong> Administrative Rule has been recorded. 
						</div>";
				$this->loadView('add_rule',$data);
			}
			else{
				$this->loadView('add_rule',$data);
			}
			$this->loadView('footer',null);			
			
		}
	}
?>