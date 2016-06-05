<?php
	require_once 'Controller.php';
	class ControllerHome extends Controller{
		public $modelHome;

		public function __construct(){
			$this->loadModel('ModelHome');
			$this->modelHome = new ModelHome();
		}

		public function invoke(){
			$pageTitle = 'LMS - SLSC';
			$resultSet = null;

			if(isset($_POST['keyword'])){ 
				$pageTitle = 'LMS - Search';
				$resultSet = $this->modelHome->searchBook($_POST['keyword']);
			}

			$data = array('title'=>$pageTitle,'resultSet'=>$resultSet);
			$this->loadView('head',$data);
			
			if(isset($_POST['keyword'])) {
				$this->loadView('navbar',null);
				$this->loadView('search_results',$data);
			}
			else $this->loadView('home',$data);

			$this->loadView('footer',null);
		}
	}
?>