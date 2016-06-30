<?php
	class Controller{
		protected function loadView($filename,$data){
			require_once 'views/'.$filename.'.php';
		}

		protected function loadModel($filename){
			require_once 'models/'.$filename.'.php';
		}

		protected function redirect($filename){
			header("Location: $filename.php");
		}

		protected function goToPreviousPage(){
			echo '<script>history.go(-1)</script>';
		}
		
	}
?>