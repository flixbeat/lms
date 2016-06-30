<?php
	require_once 'Model.php';
	class ModelHome extends Model{
		public function __construct(){
			$this->connectDB();
		}

		public function searchBook($keyword){
			# floyd's
			$query = "SELECT 
					tbks.id as id,
					tbks.book_number,
					tbks.qty,
					tbks.title,
					(select author from tbl_authors where id = tbks.author) as author,
					(select edition from tbl_editions where id = tbks.edition) as edition,
					(select publisher from tbl_publishers where id = tbks.publisher) as publisher,
					tbks.book_year
					FROM tbl_books tbks INNER JOIN tbl_authors ON tbks.author = tbl_authors.id 
					INNER JOIN tbl_publishers ON tbks.publisher = tbl_publishers.id
					INNER JOIN tbl_editions ON tbks.edition = tbl_editions.id
					WHERE title LIKE '%$keyword%' OR 
					book_number like '%$keyword%' OR 
					book_year like '%$keyword%'OR 
					tbl_authors.author like '%$keyword%'OR 
					tbl_publishers.publisher like '%$keyword%' OR
					tbl_editions.edition like '%$keyword%' OR
					qty like '%$keyword%' ORDER BY tbks.title";
			$res = $this->con->query($query);
			return $res;
		}

		public function getBookDetails($bookId){
			$bookId = $this->sanitizeGET($bookId);
			$q = "SELECT
				book_number, 
				title,
				(select edition from tbl_editions where id = books.edition) as edition,
				(select author from tbl_authors where id = books.author) as author,
				pages,
				(select publisher from tbl_publishers where id = books.publisher) as publisher,
				book_year,
				date_received,
				(select source_of_fund from tbl_source_of_funds where id = books.source_of_fund) as source_of_fund,
				cost_price,
				(select remarks from tbl_remarks where id = books.remarks) as remarks,
				isbn,
				(select class from tbl_classes where id = books.class) as class,
				short_text
				from tbl_books books where id = $bookId";
			
			$res = $this->con->query($q);
			return $res;
		}

	}
?>