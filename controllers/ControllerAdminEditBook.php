<?php
	require_once 'Controller.php';
	class ControllerAdminEditBook extends Controller{

		public $model;

		public function invoke(){
			session_start();
			# redirect if no user session
			if(!isset($_SESSION['user'])) $this->redirect('admin_login');
			
			$data = array('title'=>'Edit Book');

			$this->loadModel('ModelAdminEditBook');
			$this->model = new ModelAdminEditBook();

			if(isset($_GET['action'])){
				if( ! isset($_GET['bookId'])){
					$this->loadView('head',$data);
					$this->loadView('navbar',$data);
					$this->loadView('edit_book_select',$data);	
					$this->loadView('footer',null);
				}
				else if(isset($_GET['bookId'])){
					$bookId = $_GET['bookId'];

					$this->model->initBook($bookId);

					$data['bookNumber'] = $this->model->book->bookNumber;
					$data['bookTitle'] = $this->model->book->title;
					$data['isbn'] = $this->model->book->isbn;
					
					# get author(s)
					$data['author'] = $this->model->book->getAuthorText();
					$data['authorR'] = array($data['author']);

					if($this->model->containsChar('~',$data['author']) ){
						$authorR = explode('~',$data['author']);
						$data['authorR'] = array(); # clear array frst
						for($i=0;$i<count($authorR);$i+=1){
							array_push($data['authorR'], $authorR[$i]);
						}
					}

					$data['publisher'] = $this->model->book->getPublisherText();
					$data['shortText'] = $this->model->book->shortText;
					$data['pages'] = $this->model->book->pages;
					$data['year'] = $this->model->book->year;
					$data['drMonth'] = $this->model->book->getDrMonth();
					$data['drDay'] = $this->model->book->getDrDay();
					$data['drYear'] = $this->model->book->getDrYear();
					$data['edition'] = $this->model->book->edition;
					$data['cost'] = $this->model->book->cost;
					$data['source'] = $this->model->book->getSourceText();
					$data['class'] = $this->model->book->getClassText();
					$data['qty'] = $this->model->book->qty;
					$data['remarks'] = $this->model->book->getRemarksText();
					$data['copy'] = $this->model->book->copy;
					$data['tracing'] = $this->model->book->tracing;
					$data['sf'] = $this->model->book->sf;
					$data['is_fiction'] = $this->model->book->isFiction;

					$data['remarksOptions'] = $this->model->getRemarks(); # drop down choices

					$this->loadView('head',$data);
					$this->loadView('navbar',$data);
					$this->loadView('edit_book',$data);	
					$this->loadView('footer',null);
				}
			}
			else if(isset($_POST['btnEditBook'])){
				# basic info
				$bookNumber = $_POST['bookNumber'];
				$isbn = $_POST['isbn'];
				$title = $_POST['title'];

				# multiauthors =========================
				$author = $_POST['author'];

				if($_POST['author2'] != '') $author .= '~' . $_POST['author2'];
				if($_POST['author3'] != '') $author .= '~' . $_POST['author3'];
				if($_POST['author4'] != '') $author .= '~' . $_POST['author4'];
				if($_POST['author5'] != '') $author .= '~' . $_POST['author5'];
				if($_POST['author6'] != '') $author .= '~' . $_POST['author6'];
				if($_POST['author7'] != '') $author .= '~' . $_POST['author7'];

				# multiauthors end =====================

				$publisher = $_POST['publisher'];
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
				$class = $_POST['class'];
				$qty = 1;
				# $qty = $_POST['qty'];
				$remarks = $_POST['remarks'];
				$copy = $_POST['copy'];
				$tracing = $_POST['tracing'];
				$sf = $_POST['special_features'];
				$isFiction = $_POST['is_fiction'];

				# insert data to database and get response message
				$response = $this->model->editBook(
					$bookNumber,$isbn,$title,$author,$publisher,
					$description,$pages,$year,$dateReceived,
					$edition,$cost,$source,$class,$qty,$remarks,$copy,$tracing,$sf,
					$isFiction
				);

				$data['response'] = $response;
				
				$this->loadView('head',$data);
				$this->loadView('navbar',$data);
				$this->loadView('edit_book_onsave',$data);	
				$this->loadView('footer',null);	
			}
		}
	}
?>