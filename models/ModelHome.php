<?php
	require_once 'ModelAdmin.php';
	class ModelHome extends ModelAdmin{
		public function __construct(){
			$this->connectDB();
		}

		public function searchBook($keyword){
			# floyd's
			$query = "SELECT
				books.id,
				book_number, 
				title,
				(select edition from tbl_editions where id = books.edition) as edition,
				au.author as author,
				pages,
				pub.publisher as publisher,
				book_year,
				date_received,
				sf.source_of_fund,
				cost_price,
				rm.remarks,
				isbn,
				cls.class as class,
				copy,
				status
				from tbl_books books 
				INNER JOIN tbl_classes cls ON books.class = cls.id 
				INNER JOIN tbl_authors au ON books.author = au.id 
				INNER JOIN tbl_publishers pub ON books.publisher = pub.id
				INNER JOIN tbl_source_of_funds sf ON books.source_of_fund = sf.id 
				INNER JOIN tbl_remarks rm ON books.remarks = rm.id
				WHERE (books.title LIKE '%$keyword%' 
				OR books.author LIKE '%$keyword%' 
				OR pub.publisher LIKE '%$keyword%'
				OR books.book_year LIKE '%$keyword%'
				OR books.book_number LIKE '%$keyword%'
				OR books.isbn LIKE '%$keyword%'
				OR books.edition LIKE '%$keyword%'
				OR cls.class LIKE '%$keyword%') AND books.status LIKE 'A'
				GROUP BY books.title ORDER BY books.title
				";
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