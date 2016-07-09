<?php
	require_once 'Controller.php';
	class ControllerAdminAjax extends Controller{
		
		public $model;

		public function invoke(){
			
			$action = $_POST['action'];
			
			if($action == "createBook"){
				$field = $_POST['field']; # current field focus
				$char = $_POST['chr']; # character entry

				$this->loadModel('ModelAdminCreateBook'); # need to be reinstantiated
				$this->model = new ModelAdminCreateBook();  # to be passed on the ajax helper
				$book = $this->model; # get book functions

				$this->loadAjaxHelper('ajax_create_book'); # include external file, ajax helper for response data

				if($field=='isbn')
					getISBNDataList($book,$char); # returns html response from AjaxHelper - helpers/ajax_create_book.php
				else if($field=='title')
					getTitleDataList($book,$char);
				else if($field=='publisher')
					getPublisherDataList($book,$char);
				else if($field=='author')
					getAuthorDataList($book,$char);
				else if($field=='source')
					getSourceOfDataList($book,$char);
				else if($field=='class')
					getClassDataList($book,$char);
			}
			else if($action == "editBook"){
				$bookNumber = $_POST['bookNumber'];
				$this->loadModel('ModelAdminEditBook');
				$this->model = new ModelAdminEditBook();
				echo $this->model->getBookNumberDetails($bookNumber);
			}
			# floyd's
			else if($action == 'checkBook'){
				$title1 = "Borrow Book";
				$data = array('title'=>$title1);
				$this->loadModel('ModelBorrowBook');
				$modelBorrow = new ModelBorrowBook();
				
					if(!empty($_POST['bookNum'])){
					$bkNum = $_POST['bookNum'];
					echo $modelBorrow->checkBook($bkNum);
					//echo $modelBorrow->title;
					//$this->loadView('borrow_book',$data = array('bkNum'=>$modelBorrow->bkNum,'bkTitle'=>$modelBorrow->title));
					}
				
			}
			else if($action == 'returnBook'){
				$title1 = "Return Book";
				$data = array('title'=>$title1);
				$this->loadModel('ModelReturnBook');
				$modelR = new ModelReturnBook();
				
				if(!empty($_POST['bookNum'])){
					$bkNum = $_POST['bookNum'];
					$stuNum = $_POST['stuNum'];
					echo $modelR->checkBook($bkNum,$stuNum);
				}
				
			}
			# mine
			else if($action == 'printAuthorCard'){
				$bookId = $_POST['bookId'];
				$this->loadModel('ModelAuthorCard');
				$this->model = new ModelAuthorCard();
				echo $this->model->printPreview($bookId);
			}
		}

		private function loadAjaxHelper($filename){
			require_once 'helpers/'.$filename.'.php';
		}
	}
?>