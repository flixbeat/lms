<?php
	require_once 'Controller.php';

	class ControllerEditStudentV2 extends Controller{


		public function invoke(){
			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			$title1 = "Student Management";

			$this->loadView('head',null);
			$this->loadView('navbar',null);
			

				if(isset($_GET['btnEdit'])){
					$id = $_GET['hidId'];
					$sNum = $_GET['SNum'];
					$sName = $_GET['tfSName'];
					$grdLvl = $_GET['selGrdLvl'];
					$sec = $_GET['selSec'];

					$this->loadModel('ModelEditStudent');
					$model = new ModelEditStudent();
					$model->updateStudent($id,$sName,$grdLvl,$sec);
					$model->selSec($sec);
					$data['alertM'] = "<div class='alert alert-success'>
							<strong>Success!</strong> Student record has been updated. 
						</div>";
					$data['sNum'] = $sNum;
					$data['sName'] = $sName;
					$data['grdLvl'] = $grdLvl;
					$data['section'] = $model->sec2;
					$this->loadView('edit_landing',$data);
				}
				else if(isset($_GET['btnEdit'])){
					$this->loadView('edit_student_v2',null);
				}
			$this->loadView('footer',null);
			
		}
	}
?>