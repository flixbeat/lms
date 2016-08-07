<?php
	require_once 'Controller.php';

	class ControllerAdminUserManagement extends Controller{
		public $model;

		public function invoke(){

			$this->loadModel('ModelAdminUserManagement');
			$this->model = new ModelAdminUserManagement();
			
			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			if($this->model->user->getUserType($_SESSION['user']) != "Administrator"){
				echo "<script>alert('Restricted Page. Please contact your system administrator.')</script>";
				echo "<script>location.href = 'admin.php'</script>";
				die();
			}

			
			$pageTitle = 'User Management';


			if(isset($_POST['btnAddUser'])){
				$uname = $_POST['addUname'];
				$pwd = $_POST['addPword'];
				$userTypeId = $_POST['addUserType'];
				$name = $_POST['addName'];
				#$pos = $_POST['addPos'];

				$this->model->addUser($uname,$pwd,$userTypeId,$name);
				if($this->model->userChk == 1){
					echo "<script>alert('Sorry, User already exists')</script>";
				}
				else if($this->model->userChk == 0){
					echo "<script>alert('User has been recorded')</script>";
				}
				
			}

			if(isset($_POST['btnEditUser'])){
				$id = $_POST['editUnameHid'];
				$userTypeId = $_POST['editUserType'];
				$pwd = $_POST['editPword'];
				$name = $_POST['editName'];
				$pos = $_POST['editPos'];

				$this->model->editUser($id,$pwd,$userTypeId,$name,$pos);

			}

			if(isset($_POST['btnDeleteUser'])){
				$id = $_POST['btnDeleteUser'];
				if($id != 1){
					$this->model->deleteUser($id);
				}
				else{
					echo "<script>alert('Unable to delete System Admin')</script>";
				}
			}

			$data['users'] = $this->model->getUsers();

			$resultSet = $this->model->showUserTypes();
			$data['title'] = $pageTitle;
			
			$data['resultSet'] = $resultSet;

			$userTypeId = $this->model->selectUserType();
			$data['userTypeId'] = $userTypeId ;

			$editUname = $this->model->selectUsername();
			$data['editUname'] = $editUname;

			$editUsertypeId = $this->model->selectEditUserType();
			$data['editUsertypeId'] = $editUsertypeId;

			$deleteResultSet = $this->model->selectUserDelete();
			$data['deleteResultSet'] = $deleteResultSet;

			$this->loadView('head',$data);
			$this->loadView('navbar', null);
			$this->loadView('user_management',$data);
			$this->loadView('footer',null);		
		}		
	}	
?>