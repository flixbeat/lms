<?php
	require_once 'Controller.php';

	class ControllerViewDelq extends Controller{

		public $model;
		public function invoke(){

			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			$this->loadModel('ModelViewDelq');
			$this->model = new ModelViewDelq();	

			$title1 = "Deliquent Management";
			$resDelq = $this->model->viewDelq();
			$data = array('resDelq'=>$resDelq,'title'=>$title1);
			$this->loadView('head',$data);
			$this->loadView('navbar',null);
			
			if(!isset($_GET['btnRemove'])){
				$this->loadView('view_delq',$data);
				
			}
			else if(isset($_GET['btnRemove'])){
				$id = $_GET['id'];
				$this->model->removeDelq($id);
				echo "<script>alert('Record has been removed')</script>";
				$this->redirect('delq_view');
			}

			$this->loadView('footer',null);	
		}
	}
?>