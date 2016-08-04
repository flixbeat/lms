<?php
	require_once 'ModelAdmin.php';
	class ModelAdminEditBook extends ModelAdmin{

		public function __construct(){
			parent::__construct();
		}

		// used by ControllerAdminAjax
		public function getBookNumberDetails($bookNumber){
			$this->sanitize($bookNumber);
			$q = "SELECT id,title,isbn,(SELECT author FROM tbl_authors WHERE id = tbl_books.author) as author, edition FROM tbl_books WHERE book_number = $bookNumber";
			$res = $this->con->query($q);
			if($res){ # if there are no query errors
				$row = $res->fetch_assoc();
				$id = $row['id'];
				$title = $row['title'];
				$isbn = $row['isbn'];
				$author = $row['author'];
				$edition = $row['edition'];
				return "$title|$isbn|$author|$edition|$id";
			}
		}

		public function editBook(
			$bookNumber,$isbn,$title,$author,$publisher,
			$desc,$pages,$year,$dateReceived,
			$edition,$cost,$source,$class,$qty,$remarks,$copy,$tracing,$sf
		){
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

			$tracing = $this->sanitize($tracing);
			$sf = $this->sanitize($sf);
			$copy = $this->sanitize($copy);

			# flag to determine if there are any entry flaws, if there is/are, 
			# then this will be set to true -> prohibiting insertion of
			# data into the table
			$errorFlag = false;

			# message to be shown when the save button is clicked, this will inform
			# the user if there are any errors encountered on the processing of the data
			# or if its successful.
			$response = '<ul class = "list-group">';

			# validate existing book number
			/*
			$query = "SELECT id FROM tbl_books WHERE book_number = $bookNumber";
			$res = $this->con->query($query);
			if($res->num_rows > 0) {
				$response .= '<li class = "list-group-item"><span class = "text-danger"><span class = "glyphicon glyphicon-remove-sign"></span> <strong>BOOK NUMBER</strong> already exist.</span></li>';
				$errorFlag = true;
			}
			*/

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
			if($res->num_rows > 0) {
				$row = $res->fetch_assoc();
				$classId = $row['id'];
				
			}
			else{
				$query = "INSERT INTO tbl_classes SET class = '$class'";
				$res = $this->con->query($query);
				$classId = $this->con->insert_id;
				$response .= '<li class = "list-group-item"><span class = "text-success"><span class = "glyphicon glyphicon-info-sign"></span> A new <strong>CLASS</strong> has been created.</span></li>';
			}

			# number of copies
			if($copy < 1){
				$response .= '<li class = "list-group-item"><span class = "text-danger"><span class = "glyphicon glyphicon-remove-sign"></span> Number of <strong>COPIES</strong> should be atleast 1.</span></li>';
				$errorFlag = true;
			}

			# check there is existing copy
			/*
			$query = "SELECT copy FROM tbl_books WHERE tbl_books.class = (SELECT id FROM tbl_classes WHERE tbl_classes.class LIKE '$class') ";
			$res = $this->con->query($query) or die($this->con->error);
			while($row = $res->fetch_assoc()){
				if($row['copy'] == $copy){
					$errorFlag = 'true';
					$response .= '<li class = "list-group-item"><span class = "text-danger"><span class = "glyphicon glyphicon-remove-sign"></span> <strong>COPY # $copy</strong> for this book already exist.</span></li>';
					break;
				}
			}
			*/

			# remarks
			$query = "SELECT id FROM tbl_remarks WHERE remarks LIKE '$remarks'";
			$res = $this->con->query($query);
			$row = $res->fetch_assoc();
			$remarksId = $row['id'];
			
			# if there are no input errors detected, then the data will be inserted to book table
			if(!$errorFlag){
				# get book id basing from book number
				$q = "SELECT id FROM tbl_books WHERE book_number = $bookNumber";
				$res = $this->con->query($q);
				$row = $res->fetch_assoc();
				$bookId = $row['id'];

				$query = "UPDATE tbl_books SET book_number = $bookNumber, isbn = '$isbn', title = '$title', author = $authorId, publisher = $publisherId,
				short_text = '$desc', pages = '$pages', book_year = '$year', date_received = '$dateReceived', 
				edition = '$edition', cost_price = '$cost', source_of_fund = '$sourceId', class = '$classId', qty = '$qty', 
				availability = '$qty', remarks = '$remarksId', copy = '$copy', tracing = '$tracing', special_features = '$sf'  
				WHERE id = $bookId";

				# UPDATE ALL DATA ENTRY TO DATABASE
				$this->con->query($query) or die($this->con->error);
				$response .= '<li class = "list-group-item list-group-item-success"><strong><span class = "glyphicon glyphicon-ok-sign"></span> BOOK RECORD HAS BEEN MODIFIED!</strong></li>';
			}
			else{
				$response .= '<li class = "list-group-item list-group-item-danger"><strong><span class = "glyphicon glyphicon-remove-sign"></span> There were errors encountered during the processing of your entry, please correct the issues above and try again.</strong></li>';
			}
			
			$response .= '</ul>';
			return $response;
		}
	}
?>