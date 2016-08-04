<?php
	require_once 'Controller.php';

	class ControllerStudentTracker extends Controller{

		public $model;

		public function invoke(){
			$title1 = "Student Tracker";
			$this->loadView('head',$data = array('title'=>$title1));
			#$this->loadView('navbar',null);
			$this->loadModel('ModelStudentTracker');
			$model1 = new ModelStudentTracker();
			$sy1 = date("Y");
			$sy2 = date("Y")+1;
			$syF = $sy1."-".$sy2;

			$model1->selSchoolYear($syF);
			//$sy2 = $model1->sy;
			$data['sy'] = $syF;
			$syId = $model1->getCurrentSchoolYearId();
				if(isset($_GET['tfSnum'])){
					$idNum = $_GET['tfSnum'];
					$model1->selStudent($idNum);
					$checkStud = $model1->checkStud;
					$data['chkStud'] = $checkStud;
					if($checkStud==1){
						$model1->libLogin($idNum,$syId);
						$data['chkLog'] = $model1->checkLog;
						if($model1->op == "inserted"){
							$data['name'] = $model1->name;
							$data['sec'] = $model1->sec;
							$data['op'] = "inserted";
						}
					}
				}
			$this->loadView('student_tracker_view',$data);
			$this->loadView('footer',null);
			
		}
	}
?>