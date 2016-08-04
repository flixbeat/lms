<?php
	require_once 'Controller.php';

	class ControllerTopTen extends Controller{
		public $model;

		public function __construct(){
			$this->loadModel('ModelTopTen');
			$this->model = new ModelTopTen();
		}

		public function invoke(){
			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			$data = array();
			$data['title'] = "Top Ten";
			$data['gradeLevels'] = $this->model->getGradeLevels();
			$data['sy'] = $this->model->getCurrentSchoolYear();
			$data['syId'] = $this->model->getCurrentSchoolYearId();
			
			if(!isset($_GET['gradeLevel'])){
				$gradeLevel = 'Grade 1';
				$data['topTen'] = $this->model->getTopTen($gradeLevel,$data['syId']);
			}
			else{
				$data['topTen'] = $this->model->getTopTen($_GET['gradeLevel'],$data['syId']);	
			}

			$this->loadView('head',$data);
			$this->loadView('navbar',$data);
			
			if($_GET['type'] == 'chart'){
				$this->loadView('top_ten_chart',$data);
			}
			else{
				$this->loadView('top_ten_tabular',$data);
			}

			$this->loadView('footer',$data);
		}
	}
?>