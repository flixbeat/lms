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

	 		if(isset($_GET['action'])){
	 			$action = $_GET['action'];
	 			# initial land page when 'change level and section' button is clicked
				if($action == "changeSection"){
					if(isset($_GET['filterGrade']) && isset($_GET['filterSection'])){
						$grade = $_GET['filterGrade'];
						$section = $_GET['filterSection'];
						$data['students'] = $this->model->getStudents($grade,$section);
					}
					else
						$data['students'] = $this->model->getStudents();

					$data['sections'] = $this->model->getSections();
					$data['section1'] = $this->model->getSections(1);
					$data['section2'] = $this->model->getSections(2);
					$data['section3'] = $this->model->getSections(3);
					$data['section4'] = $this->model->getSections(4);
					$data['section5'] = $this->model->getSections(5);
					$data['section6'] = $this->model->getSections(6);
					$this->loadView('students_change_section',$data);


				}
	 		}
	 		else{
	 			$this->loadView('manage_student',$data);	
	 		}
	 		
	 		$this->loadView('footer',null);
			
	 	}
	}	
?>