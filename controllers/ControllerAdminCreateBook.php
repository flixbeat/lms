<?php
	require_once 'Controller.php';
	class ControllerAdminCreateBook extends Controller{

		public $model;

		public function invoke(){
			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			$data = array('title'=>'Create New Book Entry');
			$this->loadModel('ModelAdminCreateBook');
			$this->model = new ModelAdminCreateBook();

			if(!isset($_POST['btnCreateBook'])){
				// get initial datalist values LIMIT of 10
				$data['maxBookNumber'] = $this->model->getMaxBookNumber();
				$data['bookNumbers'] = $this->model->getBookNumbers(); #array
				$data['isbns'] = $this->model->getISBNs(); #array
				$data['titles'] = $this->model->getTitles(); #array
				$data['authors'] = $this->model->getAuthors(); #array
				$data['publishers'] = $this->model->getPublishers(); #array
				$data['source'] = $this->model->getSourceOfFunds(); #array
				$data['class'] = $this->model->getClasses(); #array
				$data['remarks'] = $this->model->getRemarks(); #array

				$this->loadView('head',$data);
				$this->loadView('navbar',$data);
				$this->loadView('create_book',$data);	
				$this->loadView('footer',null);	
			}
			# execute on form submit 'save'
			else{
				# basic info
				$bookNumber = $_POST['bookNumber'];
				$isbn = $_POST['isbn'];
				$title = $_POST['title'];
				$author = $_POST['author'];
				$publisher = $_POST['publisher'];
				$class = $_POST['class'];
				$copies = $_POST['copies'];
				# core info
				$description = $_POST['description'];
				$pages = $_POST['pages'];
				$year = $_POST['year'];
				$drMonth = $_POST['drMonth'];
				$drDay = $_POST['drDay'];
				$drYear = $_POST['drYear'];
				$dateReceived = $this->model->formatDate($drMonth,$drDay,$drYear);
				# additional info
				$edition = $_POST['edition'];
				$cost = $_POST['cost'];
				$source = $_POST['source'];
				#$qty = $_POST['qty'];
				$qty = 1;
				$sf = $_POST['special_features'];
				$tracing = $_POST['tracing'];
				
				$remarks = $_POST['remarks'];

				# insert data to database and get response message
				$response = $this->model->createBook(
					$bookNumber,$isbn,$title,$author,$publisher,
					$description,$pages,$year,$dateReceived,
					$edition,$cost,$source,$class,$qty,$remarks,$copies,$tracing,$sf
				);

				$data['response'] = $response;
				
				$this->loadView('head',$data);
				$this->loadView('navbar',$data);
				$this->loadView('create_book_onsave',$data);	
				$this->loadView('footer',null);	
			}
		}
	}
?>