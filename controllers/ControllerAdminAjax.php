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
		}

		private function loadAjaxHelper($filename){
			require_once 'helpers/'.$filename.'.php';
		}
	}
?>