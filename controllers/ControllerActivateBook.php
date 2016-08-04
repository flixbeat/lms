<?php
	require_once 'Controller.php';
	class ControllerActivateBook extends Controller{
		public $model;

		public function __construct(){
			$this->loadModel('ModelActivateBook');
			$this->model = new ModelActivateBook();
		}

		public function invoke(){
			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			$data = array();
			$data['title'] = 'Activate / Deactivate Books';
			$data['classDataList'] = $this->model->getClassDataList();

			if(isset($_POST['class'])){
				$data['searchResult'] = $this->model->searchBookByClass($_POST['class']);
			}

			$this->loadView('head',$data);
			$this->loadView('navbar',null);
			$this->loadView('activate_book',$data);
			$this->loadView('footer',null);
		}
	}
?>