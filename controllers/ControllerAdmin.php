<?php
	require_once 'Controller.php';
	class ControllerAdmin extends Controller{

		public $model;

		public function invoke(){
			session_start();
			
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');

			$data = array('title'=>'Dashboard');

			$this->loadModel('ModelHome');
			$this->model = new ModelHome();

			$data['sy'] = $this->model->getCurrentSchoolYear();

			$this->loadModel('ModelAdmin');
			$this->model = new ModelAdmin();
			
			# adjust school year
			if($this->model->setNewSchoolYear()){ # if new school
				echo '<script>alert("A new school year has been set.")</script>';
			}

			$maxGrade = 6;
			$grades = array();

			for($i=1; $i<=$maxGrade; $i+=1){
				$grades[$i] = $this->model->getSectionLogin($i);
			}

			$data['gradesR'] = $grades;

			$this->loadView('head',$data);
			$this->loadView('navbar',$data);
			$this->loadView('dashboard',$data);	
			$this->loadView('footer',null);	

		}
	}
?>