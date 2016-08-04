<?php
	require_once 'Controller.php';

	class ControllerEditStudent extends Controller{


		public function invoke(){
			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			$title1 = "Student Management";
			$data = array('title'=>$title1);
			$this->loadView('head',$data);
			$this->loadView('navbar',null);
			
			$this->loadView('footer',null);

			$this->loadModel('ModelEditStudent');
			$model = new ModelEditStudent();
				if(isset($_GET['btnNxt'])){
					$sNum = $_GET['tfSNum'];
					$model->selStudent($sNum);
					$checker = $model->chkStudent;
					$resGrdLvl = $model->selGradeLevel();
					$data = array('resGrdLvl'=>$resGrdLvl,'sNum'=>$model->sNum);

					if($checker ==1){
						$data['id'] = $model->sId;
						$data['sNum'] = $model->sNum;
						$data['grdLvl'] = $model->grdLvl;
						$data['sec'] = $model->sec;
						$data['sName'] = $model->sName;
						
						$this->loadView('edit_student_v2',$data);
					}
					else{
						$data['alertM'] = "<div class='alert alert-danger'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>X</a>
							<strong>Warning!</strong> Student Number does not exists. 
						</div>";
						$this->loadView('edit_student',$data);
					}
				}
				else if(!isset($_GET['btnNxt'])){
					$this->loadView('edit_student',null);
				}
			



			
		}
	}
?>