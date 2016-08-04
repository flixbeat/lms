<?php
	require_once 'Controller.php';

	class ControllerSearchStudent extends Controller{

		public function invoke(){
			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			$title1 = "Student Management";
			
			$this->loadView('head',$data = array('title'=>$title1));
			$this->loadView('navbar',null);
			
			if(isset($_GET['sNum'])){
				$sNum = $_GET['sNum'];
				$this->loadModel('ModelSearchStudent');
				$model = new ModelSearchStudent();
				$data['result'] = $model->searchStudent($sNum);
				$this->loadView('search_student',$data);

			}
			else{
				$this->loadView('search_student',null);
			}
			$this->loadView('footer',null);
		}
	}
?>