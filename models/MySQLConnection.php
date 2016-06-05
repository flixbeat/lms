<?php
	class MySQLConnection{
		public $con = null;

		public function connectDB(){
			$isHosted = false;
			$host = null; $uname = null; $pword = null; $db = null; $port = null;
			if(!$isHosted){
				$host = 'localhost';
				$uname = 'root';
				$pword = '';
				$db = 'db_slsc_lms';
				$port = 3306;
			}
			else{
				$host = 'mysql9.000webhost.com';
				$uname = 'a1283901_root';
				$pword = '1m0nf1r3';
				$db = 'a1283901_zplague';
				$port = 3306;
			}
			$this->con = new mysqli($host,$uname,$pword,$db,$port) or die($this->con->error);
		}
	}

?>