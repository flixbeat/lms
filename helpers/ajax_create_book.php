<?php
	# THIS FILE IS USED BY AJAX CALL WHICH RETURNS 'HTML RESPONSE' OR SUCH, THIS FILE AIMS TO PROVIDE SHORTER LINES OF
	# CODE BY CALLING A FUNCTION INSTEAD OF WRITING THEM ALL IN THE CONTROLLER.
	
	# @param book - object
	# @param char - character entry
	function getISBNDataList($book,$char){
		echo '<datalist id = "isbn">';
		foreach($book->getISBNs($char) as $val){
			echo '<option value = "'.$val.'">';
		}	
		echo '</datalist>';
	}

	function getTitleDataList($book,$char){
		echo '<datalist id = "title">';
		foreach($book->getTitles($char) as $val){
			echo '<option value = "'.$val.'">';
		}	
		echo '</datalist>';
	}

	function getAuthorDataList($book,$char){
		echo '<datalist id = "author">';
		foreach($book->getAuthors($char) as $val){
			echo '<option value = "'.$val.'">';
		}
		echo '</datalist>';
	}

	function getPublisherDataList($book,$char){
		echo '<datalist id = "publisher">';
		foreach($book->getPublishers($char) as $val){
			echo '<option value = "'.$val.'">';
		}	
		echo '</datalist>';
	}

	function getSourceOfDataList($book,$char){
		echo '<datalist id = "source">';
		foreach($book->getSourceOfFunds($char) as $val){
			echo '<option value = "'.$val.'">';
		}
		echo '</datalist>';
	}

	function getClassDataList($book,$char){
		echo '<datalist id = "class">';
		foreach($book->getClasses($char) as $val){
			echo '<option value = "'.$val.'">';
		}
		echo '</datalist>';
	}
?>