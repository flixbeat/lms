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
			else if(isset($_GET['bookId'])){
				$pageTitle = 'Book Details';
			}

			$data = array('title'=>$pageTitle,'resultSet'=>$resultSet);
			$this->loadView('head',$data);
			
			if(isset($_POST['keyword'])) {
				$this->loadView('search_results',$data);
			}
			else if(isset($_GET['bookId'])){
				$data['bookDetails'] = $this->modelHome->getBookDetails($_GET['bookId']);
				$this->loadView('book_details',$data);
			}
			else $this->loadView('home',$data);

			$this->loadView('footer',null);
		}
	}
?>