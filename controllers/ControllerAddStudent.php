<?php
	require_once 'Controller.php';

	class ControllerAddStudent extends Controller{


		public function invoke(){
			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			$title1 = "Student Management";
			
			$this->loadModel('ModelAddStudent');
			$model = new ModelAddStudent();
			$resGrdLvl = $model->selGradeLevel();
			//$resSec = $model->selSection();

			$data = array('resGrdLvl'=>$resGrdLvl,'title'=>$title1);
			$data['alertM'] = null;
			if(isset($_GET['btnAdd'])){
				$sNum = $_GET['tfStudNum'];
				$sName = $_GET['tfStudName'];
				$grdLvl = $_GET['selGrdLvl'];
				$section = $_GET['selSec'];
				
				$model->selStudent($sNum);
				if($model->stExist ==0){
					$model->addStudent($sNum,$sName,$grdLvl,$section);
					
					$data['alertM'] = "<div class='alert alert-success'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>close</a>
							<strong>Success!</strong> Student data has been save. 
						</div>";
				}
				else{
					$data['alertM'] = "<div class='alert alert-danger'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>close</a>
							<strong>Warning!</strong> Student Number Exists. 
						</div>";
				}

			}

			$this->loadView('head',$data);
			$this->loadView('navbar',null);
			$this->loadView('add_student',$data);
			$this->loadView('footer',null);			
			
		}
	}
?>