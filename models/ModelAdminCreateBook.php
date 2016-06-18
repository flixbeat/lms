<?php
	require_once 'ModelAdmin.php';
	class ModelAdminCreateBook extends ModelAdmin{

		public function __construct(){
			 parent::__construct();
		}

		public function getBookNumbers(){
			$bookNumbers = array();
			$query = "SELECT book_number FROM tbl_books LIMIT $this->queryLimit;";
			$res = $this->con->query($query);
			while($row = $res->fetch_assoc()){
				array_push($bookNumbers,$row['book_number']);
			}
			return $bookNumbers;
		}

		public function getMaxBookNumber(){
			$query = "SELECT MAX(book_number) as book_number FROM tbl_books";
			$res = $this->con->query($query);
			$row = $res->fetch_assoc();
			return $row['book_number'];
		}

		public function getISBNs($char = null){
			$isbn = array();
			$query = null;
			if($char==null)
				$query = "SELECT isbn FROM tbl_books GROUP BY isbn LIMIT $this->queryLimit";
			else
				$query = "SELECT isbn FROM tbl_books WHERE isbn LIKE '$char%' GROUP BY isbn LIMIT $this->queryLimit";
			$res = $this->con->query($query);
			while($row = $res->fetch_assoc()){
				array_push($isbn,$row['isbn']);
			}
			return $isbn;
		}

		public function getTitles($char = null){
			$titles = array();
			$query = null;
			if($char==null)
				$query = "SELECT title FROM tbl_books GROUP BY title LIMIT $this->queryLimit";
			else
				$query = "SELECT title FROM tbl_books WHERE title LIKE '$char%' GROUP BY title LIMIT $this->queryLimit";
			$res = $this->con->query($query);
			while($row = $res->fetch_assoc()){
				array_push($titles,$row['title']);
			}
			return $titles;
		}

		public function getAuthors($char = null){
			$authors = array();
			$query = null;
			if($char==null)
				$query = "SELECT author FROM tbl_authors LIMIT $this->queryLimit";
			else
				$query = "SELECT author FROM tbl_authors WHERE author LIKE '$char%' LIMIT $this->queryLimit";
			$res = $this->con->query($query);
			while($row = $res->fetch_assoc()){
				array_push($authors,$row['author']);
			}
			return $authors;
		}

		public function getPublishers($char = null){
			$publishers = array();
			$query = null;
			if($char==null)
				$query = "SELECT publisher FROM tbl_publishers LIMIT $this->queryLimit";
			else
				$query = "SELECT publisher FROM tbl_publishers WHERE publisher LIKE '$char%' LIMIT $this->queryLimit";
			$res = $this->con->query($query);
			while($row = $res->fetch_assoc()){
				array_push($publishers,$row['publisher']);
			}
			return $publishers;
		}

		public function getSourceOfFunds($char = null){
			$sfund = array();
			$query = null;	
			if($char==null)
				$query = "SELECT source_of_fund FROM tbl_source_of_funds LIMIT $this->queryLimit";
			else
				$query = "SELECT source_of_fund FROM tbl_source_of_funds WHERE source_of_fund like '$char%' LIMIT $this->queryLimit";
			$res = $this->con->query($query);
			while($row = $res->fetch_assoc()){
				array_push($sfund,$row['source_of_fund']);
			}
			return $sfund;
		}

		public function getClasses($char = null){
			$class = array();
			$query = null;	
			if($char==null)
				$query = "SELECT class FROM tbl_classes LIMIT $this->queryLimit";
			else
				$query = "SELECT class FROM tbl_classes WHERE class like '$char%' LIMIT $this->queryLimit";
			$res = $this->con->query($query);
			while($row = $res->fetch_assoc()){
				array_push($class,$row['class']);
			}

			return $class;
		}

		public function createBook(
			$bookNumber,$isbn,$title,$author,$publisher,
			$desc,$pages,$year,$dateReceived,
			$edition,$cost,$source,$class,$qty,$remarks)
		{
			$bookNumber = $this->sanitize($bookNumber);
			$isbn = $this->sanitize($isbn);
			$title = $this->sanitize($title);
			$author = $this->sanitize($author);
			$publisher = $this->sanitize($publisher);

			$desc = $this->sanitize($desc);
			$pages = $this->sanitize($pages);
			$year = $this->sanitize($year);
			$dateReceived = $this->sanitize($dateReceived);

			$edition = $this->sanitize($edition);
			$cost = $this->sanitize($cost);
			$source = $this->sanitize($source);
			$class = $this->sanitize($class);
			$qty = $this->sanitize($qty);
			$remarks = $this->sanitize($remarks);


			# flag to determine if there are any entry flaws, if there is/are, 
			# then this will be set to true -> prohibiting insertion of
			# data into the table
			$errorFlag = false;

			# message to be shown when the save button is clicked, this will inform
			# the user if there are any errors encountered on the processing of the data
			# or if its successful.
			$response = '<ul class = "list-group">';

			# validate existing book number
			$query = "SELECT id FROM tbl_books WHERE book_number = $bookNumber";
			$res = $this->con->query($query);
			if($res->num_rows > 0) {
				$response .= '<li class = "list-group-item"><span class = "text-danger"><span class = "glyphicon glyphicon-remove-sign"></span> <strong>BOOK NUMBER</strong> already exist.</span></li>';
				$errorFlag = true;
			}

			if($year > 9999){
				$response .= '<li class = "list-group-item"><span class = "text-danger"><span class = "glyphicon glyphicon-remove-sign"></span> Invalid <strong>YEAR</strong>.</span></li>';
				$errorFlag = true;
			}
			
			# author
			$authorId = null;
			$query = "SELECT id FROM tbl_authors WHERE author LIKE '$author'";
			$res = $this->con->query($query);
			if($res->num_rows > 0) {
				$row = $res->fetch_assoc();
				$authorId = $row['id'];
			}
			# create new author if it doesn't exist
			else{
				$query = "INSERT INTO tbl_authors SET author = '$author'";
				$res = $this->con->query($query);
				$authorId = $this->con->insert_id;
				$response .= '<li class = "list-group-item"><span class = "text-success"><span class = "glyphicon glyphicon-info-sign"></span> A new <strong>AUTHOR</strong> has been created</span></li>';
			}

			# publisher
			$publisherId = null;
			$query = "SELECT id FROM tbl_publishers WHERE publisher LIKE '$publisher'";
			$res = $this->con->query($query);
			if($res->num_rows > 0) {
				$row = $res->fetch_assoc();
				$publisherId = $row['id'];
			}
			# create new publisher if it doesn't exist
			else{
				$query = "INSERT INTO tbl_publishers SET publisher = '$publisher'";
				$res = $this->con->query($query);
				$publisherId = $this->con->insert_id;
				$response .= '<li class = "list-group-item"><span class = "text-success"><span class = "glyphicon glyphicon-info-sign"></span> A new <strong>PUBLISHER</storng> has been created.</span></li>';
			}

			# source of fund
			$sourceId = null;
			$query = "SELECT id FROM tbl_source_of_funds WHERE source_of_fund LIKE '$source'";
			$res = $this->con->query($query);
			if($res->num_rows > 0) {
				$row = $res->fetch_assoc();
				$sourceId = $row['id'];
			}
			# create new source of fund if it doesn't exist
			else{
				$query = "INSERT INTO tbl_source_of_funds SET source_of_fund = '$source'";
				$res = $this->con->query($query);
				$sourceId = $this->con->insert_id;
				$response .= '<li class = "list-group-item"><span class = "text-success"><span class = "glyphicon glyphicon-info-sign"></span> A new <strong>SOURCE OF FUND</strong> has been created.</span></li>';
			}

			# class
			$classId = null;
			$query = "SELECT id FROM tbl_classes WHERE class LIKE '$class'";
			$res = $this->con->query($query);
			if($res->num_rows == 0) {
				$response .= '<li class = "list-group-item"><span class = "text-danger"><span class = "glyphicon glyphicon-remove-sign"></span> <strong>CLASS</strong> does not exist.</span></li>';
				$errorFlag = true;
			}
			else{
				$row = $res->fetch_assoc();
				$classId = $row['id'];
			}

			# remarks
			$query = "SELECT id FROM tbl_remarks WHERE remarks LIKE '$remarks'";
			$res = $this->con->query($query);
			$row = $res->fetch_assoc();
			$remarksId = $row['id'];

			# if there are no input errors detected, then the data will be inserted to book table
			if(!$errorFlag){
				$query = "INSERT INTO tbl_books SET book_number = $bookNumber, isbn = '$isbn', title = '$title', author = $authorId, publisher = $publisherId,
				short_text = '$desc', pages = $pages, book_year = $year, date_received = '$dateReceived', 
				edition = $edition, cost_price = $cost, source_of_fund = $sourceId, class = $classId, qty = $qty, remarks = $remarksId";

				# INSERT ALL DATA ENTRY TO DATABASE
				$this->con->query($query) or die($this->con->error);
				$response .= '<li class = "list-group-item list-group-item-success"><strong><span class = "glyphicon glyphicon-ok-sign"></span> A NEW LIBRARY ASSET HAS BEEN CREATED!</strong></li>';
			}
			else{
				$response .= '<li class = "list-group-item list-group-item-danger"><strong><span class = "glyphicon glyphicon-remove-sign"></span> There were errors encountered during the processing of your entry, please correct the issues above and try again.</strong></li>';
			}
			

			$response .= '</ul>';
			return $response;
		}
	}
?>