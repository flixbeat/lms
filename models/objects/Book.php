<?php
	require_once 'models/MySQLConnection.php';
	class Book extends MySQLConnection{
		
		public $bookNumber;
		public $isbn;
		public $title;
		public $authorId;
		public $publisherId;
		public $shortText;
		public $pages;
		public $year;
		public $dateReceived;
		public $edition;
		public $cost;
		public $sourceId;
		public $classId;
		public $qty;
		public $remarksId;

		public function __construct($bookId){
			$this->connectDB();
			$q = "SELECT * FROM tbl_books WHERE id = $bookId";
			$res = $this->con->query($q);
			$row = $res->fetch_assoc();
			$this->bookNumber = $row['book_number'];
			$this->isbn = $row['isbn'];
			$this->title = $row['title'];
			$this->authorId = $row['publisher'];
			$this->publisherId = $row['publisher'];
			$this->shortText = $row['short_text'];
			$this->pages = $row['pages'];
			$this->year = $row['book_year'];
			$this->dateReceived = $row['date_received'];
			$this->edition = $row['edition'];
			$this->cost = $row['cost_price'];
			$this->sourceId = $row['source_of_fund'];
			$this->classId = $row['class'];
			$this->qty = $row['qty'];
			$this->remarksId = $row['remarks'];
		}

		public function getAuthorText(){
			$q = "SELECT author FROM tbl_authors WHERE id = $this->authorId";
			$res = $this->con->query($q);
			$row = $res->fetch_assoc();
			return $row['author'];
		}

		public function getPublisherText(){
			$q = "SELECT publisher FROM tbl_publishers WHERE id = $this->publisherId";
			$res = $this->con->query($q);
			$row = $res->fetch_assoc();
			return $row['publisher'];
		}

		public function getSourceText(){
			$q = "SELECT source_of_fund FROM tbl_source_of_funds WHERE id = $this->sourceId";
			$res = $this->con->query($q);
			$row = $res->fetch_assoc();
			return $row['source_of_fund'];
		}

		public function getClassText(){
			$q = "SELECT class FROM tbl_classes WHERE id = $this->classId";
			$res = $this->con->query($q);
			$row = $res->fetch_assoc();
			return $row['class'];
		}

		public function getRemarksText(){
			$q = "SELECT remarks FROM tbl_remarks WHERE id = $this->remarksId";
			$res = $this->con->query($q);	
			$row = $res->fetch_assoc();
			return $row['remarks'];
		}

		public function getDrYear(){
			$arr = explode("-", $this->dateReceived);
			return $arr[0];
		}

		public function getDrMonth(){
			$arr = explode("-", $this->dateReceived);
			return $arr[1];
		}

		public function getDrDay(){
			$arr = explode("-", $this->dateReceived);
			return $arr[2];
		}


	}
?>