<?php
	require_once 'Controller.php';
	class ControllerAdminAjax extends Controller{
		
		public $model;

		public function invoke(){
			$field = $_POST['field']; # current field focus
			$char = $_POST['chr']; # character entry

			$this->loadModel('ModelAdmin'); # need to be reinstantiated
			$this->model = new ModelAdmin();  # to be passed on the ajax helper
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

		private function loadAjaxHelper($filename){
			require_once 'helpers/'.$filename.'.php';
		}
	}
?>