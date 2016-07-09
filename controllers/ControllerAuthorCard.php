<?php
	require_once 'Controller.php';
	class ControllerAuthorCard extends Controller{
		public $model;

		public function invoke(){
			$data = array();
			$data['title'] = 'Generate Author Card';
			

			$this->loadModel('ModelAuthorCard');
			$this->model = new ModelAuthorCard();

			if(isset($_POST['bookSearch'])){
				$keyword = $_POST['keyword'];
				$data['books'] = $this->model->searchBook($keyword);
			}

			$this->loadView('head',$data);
			$this->loadView('navbar',null);
			$this->loadView('author_card_report',$data);
			$this->loadView('footer',null);
		}
	}
?>