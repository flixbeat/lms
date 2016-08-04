<?php
	 require_once("controllers/Controller.php");

	 class ControllerLogin extends Controller{
	 	public $model;
		
	 	public function invoke(){
	 		$this->loadModel('ModelLogin');
	 		$model = new ModelLogin();

	 		$data['title'] = "Admin Login";

	 		if(isset($_POST['uname'])){
	 			$uname = $_POST['uname'];
	 			$pword = $_POST['pword'];
	 			$userId = $model->loginAcc($uname,$pword);

	 			if($userId != 0){
	 				session_start();
	 				$_SESSION['user'] = $userId;
	 				$this->redirect('admin');
	 			}
	 			else{
	 				echo "<script>alert('Login Failed')</script>";
	 			}
	 		}

	 		$this->loadView('head',$data);
	 		$this->loadView('login',null);
	 		$this->loadView('footer',null);
			
	 	}
	}	
?>