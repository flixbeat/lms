<?php
	require_once 'ModelAdmin.php';
	class ModelActivateBook extends ModelAdmin{

		public function __construct(){
			parent::__construct();
		}

		function getClassDatalist(){
			$q = "SELECT class FROM tbl_classes ORDER BY class";
			$res = $this->con->query($q);
			$options = '';
			while($row = $res->fetch_assoc()){
				$options .= '<option value = "'.$row['class'].'">';
			}
			return $options;
		}

		function searchBookByClass($class){
			$q = "SELECT
				books.id as bookId,
				book_number, 
				title,
				(select edition from tbl_editions where id = books.edition) as edition,
				au.author,
				pages,
				pub.publisher,
				book_year,
				date_received,
				sf.source_of_fund,
				cost_price,
				rm.remarks,
				isbn,
				cls.class,
				copy,
				status
				from tbl_books books 
				INNER JOIN tbl_classes cls ON books.class = cls.id 
				INNER JOIN tbl_authors au ON books.author = au.id 
				INNER JOIN tbl_publishers pub ON books.publisher = pub.id
				INNER JOIN tbl_source_of_funds sf ON books.source_of_fund = sf.id 
				INNER JOIN tbl_remarks rm ON books.remarks = rm.id
				WHERE cls.class LIKE '$class' ";

			return $this->con->query($q);
		}

		function setActive($status,$bookId){
			$q = "UPDATE tbl_books SET status = '$status' WHERE id = $bookId";
			$this->con->query($q);
		}
	}
?>