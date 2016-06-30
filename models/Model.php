<?php
	require_once 'MySQLConnection.php';
	class Model extends MySQLConnection{

		protected function loadObject($filename){
			require_once 'objects/'.$filename.'.php';
		}

		public function sanitize($str){
			$str = mysqli_real_escape_string($this->con,$str); # escape quotes
			return htmlentities($str); # escape html characters
		}

		public function sanitizeGET($str){
			return preg_replace("/[^0-9]+/", "", $str); # allows only numbers
		}

		
	}
?>