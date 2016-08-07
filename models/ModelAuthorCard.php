<?php
	require_once 'ModelAdmin.php';
	class ModelAuthorCard extends ModelAdmin{

		public function __construct(){
			parent::__construct();
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
					(select class from tbl_classes where id = tbks.class) as class,
					tbks.book_year,
					tbks.copy
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

		public function printPreview($bookId){
			$q = "SELECT 
				book_number,
				title,
				(select author from tbl_authors where id = b.author) as author,
				(select publisher from tbl_publishers where id = b.publisher) as publisher,
				(select class from tbl_classes where id = b.class) as class,
				book_year,
				copy,
				isbn,
				pages,
				tracing,
				special_features
				FROM tbl_books as b
				WHERE id = $bookId";

			$res = $this->con->query($q);
			$row = $res->fetch_assoc();

			$html = "";
			$html .= '<div id = "class">'.$row['class']."-C".$row['copy']	.'</div>';
			$html .= '<div id = "author-card-body">';
			if( substr_count($row['author'], '~' ) > 2){
				$authorR  = explode('~', $row['author']);
				$html .= '<div id = "author">'. $authorR[0] . ", " . $authorR[1] . ", et. al." . '</div>';
			}
			else{
				$html .= '<div id = "author">'. $row['author'] . '</div>';	 
			}
			$html .= '<div id = "title">'.$row['title'].' -- '.$row['publisher'].', c'.$row['book_year'].'</div>';
			$html .= '<div id = "pages">'.$row['pages'].' p</div>';
			$html .= '<div id = "sf">'.$row['special_features'].'</div>';
			$html .= '<div id = "isbn">ISBN: '.$row['isbn'].'</div><br><br>';
			$html .= '<div id = "tracing">'.$row['tracing'].'</div>';
			$html .= '</div>';

			return $html;
		}
	}
?>