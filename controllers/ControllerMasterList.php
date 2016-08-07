<?php
	require_once 'Controller.php';
	class ControllerMasterList extends Controller{
		public $model;

		public function __construct(){
			$this->loadModel('ModelMasterList');
			$this->model = new ModelMasterList();
		}

		public function invoke(){
			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			$data = array();
			$data['title'] = 'Generate Books Master List';
			$data['classDataList'] = $this->model->getClassDatalist();
			$data['authorDataList'] = $this->model->getAuthorDatalist();
			$data['publisherDataList'] = $this->model->getPublisherDatalist();
			$data['remarksDataList'] = $this->model->getRemarksDatalist();
			$data['sourceOfFundDataList'] = $this->model->getSourceOfFundDatalist();

			if(isset($_POST['dateFrom']) && isset($_POST['dateTo']) ){
				$class = $_POST['class'];
				$dateFrom = $_POST['dateFrom'];
				$dateTo = $_POST['dateTo'];
				$author = $_POST['author'];
				$publisher = $_POST['publisher'];
				$source = $_POST['source_of_fund'];
				$remarks = $_POST['remarks'];

				$data['searchResult'] = $this->model->search($class,$dateFrom,$dateTo,$author,$publisher,$source,$remarks);
			}
			else
				$data['searchResult'] = $this->model->getAllBooks();

			$this->loadView('head',$data);
			$this->loadView('navbar',$data);
			$this->loadView('masterlist_report',$data);
			$this->loadView('footer',null);
		}
	}
?>