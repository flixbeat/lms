<?php
	require_once 'ModelAdmin.php';
	class ModelMasterList extends ModelAdmin{

		public function __construct(){
			parent::__construct();
		}

		public function search(
			$class = null, 
			$dateFrom = null, 
			$dateTo = null, 
			$author = null,
			$publisher = null,
			$source = null,
			$remarks = null
			)
		{
			$dateFrom = $this->reformatDate($dateFrom);
			$dateTo = $this->reformatDate($dateTo);

			$q = "SELECT
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
				WHERE (date_received BETWEEN '$dateFrom' AND '$dateTo')";

			if($class != '') $q.=" AND cls.class LIKE '$class'";
			if($author != '') $q.=" AND au.author LIKE '$author'";
			if($publisher != '') $q.=" AND pub.publisher LIKE '$publisher'";
			if($source != '') $q.=" AND sf.source_of_fund LIKE '$source'";
			if($remarks != '') $q.=" AND rm.remarks LIKE '$remarks'";

			$q .= " ORDER BY book_number";

			return $this->con->query($q);
		}

		function getAllBooks(){
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
				availability,
				copy,
				status
				from tbl_books books";

			return $this->con->query($q);
		}

	}
?>