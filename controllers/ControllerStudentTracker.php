<?php
	require_once 'Controller.php';

	class ControllerStudentTracker extends Controller{

		public $model;

		public function invoke(){
			$title1 = "Student Tracker";
			$data = array('title'=>$title1);
			$this->loadView('head',null);
			$this->loadView('navbar',null);
			$this->loadView('view_student_tracker',null);

			$this->loadView('footer',null);
			
			if(isset($_POST['idNum'])){
				$id = $_POST['idNum'];
				$sy = $_POST['syHid'];
				$this->loadModel('ModelStudentTracker');
				$modelTracker = new ModelStudentTracker();
				$modelTracker->libLogin($id,$sy);
				$this->loadView('view_student_tracker',null);
				$this->loadView('head',null);
			}
		}
	}
?>