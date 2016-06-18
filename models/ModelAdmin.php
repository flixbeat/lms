<?php
	require_once 'Model.php';
	class ModelAdmin extends Model{
		public $book;
		protected $queryLimit;

		public function __construct(){
			$this->connectDB();
			$this->queryLimit = 10;
		}

		# for storing date in a table
		public function formatDate($month,$day,$year){
			return "$year-$month-$day";
		}

		public function initBook($bookId){
			$this->loadObject('Book');
			$this->book = new Book($bookId);
		}

		// for remarks drop down - create and edit book UI
		public function getRemarks(){
			$remarks = array();
			$query = "SELECT remarks FROM tbl_remarks";
			$res = $this->con->query($query);
			while($row = $res->fetch_assoc()){
				array_push($remarks,$row['remarks']);
			}
			return $remarks;
		}
	}
?>