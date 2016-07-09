<div class = "container">
	<h3>Generate Author Card</h3>
	<hr>
	<form class = "form" action = "author_card_report.php" method = "post">
		<div class = "form-group">
			<div class = "input-group">
				<input type = "text" class = "form-control" name = "keyword" placeholder = "Search for a book"
					value = "<?= isset($_POST['keyword']) ? $_POST['keyword']:null ?>">
				<div class="input-group-addon"><span class = "glyphicon glyphicon-search"></span> Search</div>
				<input type = "hidden" name = "bookSearch" />
			</div>
		</div>
	</form>

	<table class ="table table-hover">
	<tr>
		<th>Title</th>
		<th>Author</th>	
		<th>Book Number</th>		
		<th>Available</th>
		<th>Edition</th>
		<th>Publisher</th>
		<th>Year</th>	
		<th>Action</th>	
	</tr>
	<?php
		if(isset($data['books'])){
			while($row = $data['books']->fetch_assoc()){
				echo'<tr><td>'.'<a href = "index.php?bookId='.$row['id'].'">'. $row['title'].'</a></td>';
				echo'<td>'. $row['author'].'</td>';
				echo'<td>'. $row['book_number'].'</td>';
				echo'<td>'. $row['qty'].'</td>';
				echo'<td>'. $row['edition'].'</td>';
				echo'<td>'. $row['publisher'].'</td>';
				echo'<td>'. $row['book_year'].'</td>';
				echo'<td><button 
					class = "btn btn-sm btn-default" 
					value = "'. $row['id'].'" 
					onclick = "printAuthorCard('.$row['id'].')"
					data-toggle = "modal" data-target = "#print-prev-modal"
					>
						Print Author Card
					</button></td></tr>';
			}	
		}
		
	?>
	</table>

	<!--print preview modal-->
	<div class = "modal fade" id = "print-prev-modal" tabindex = "-1" role = "dialog" aria-labelledby = "print-prev" aria-hidden = "true">
		<div class = "modal-dialog">
			<div class = "modal-content">
				<div class = "modal-header">
					<button type = "button" class = "close" data-dismiss = "modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class = "modal-title" id = "print-preview">Print Preview</h4>
				</div>
				<div class = "modal-body">
					<div id = "print-preview-container">

					</div>
				</div>
				<div class = "modal-footer">
					<button class= "btn btn-primary" onclick="print('.modal-body')"><span class="glyphicon glyphicon-print"></span> Print</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function printAuthorCard(bookId){
		
		$.post('admin.php',
			{
				ajax: true,
				action: 'printAuthorCard',
				bookId: bookId
			},
			function(data){
				$('#print-preview-container').html(data);
			}
		);
	}

	function print(elementId){
		var data = $(elementId).html();
		
		var mywindow = window.open('', 'my div', 'height=640,width=800');
        mywindow.document.write('<html><head><title>Author Card</title>');
        mywindow.document.write('<link rel="stylesheet" href="css/author-card.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        //mywindow.close();

        return true;
	}
</script>
<style>
	#print-preview-container{
		font-family: 'times';
		font-size: 19px;
		padding: 20px;
		border: 1px solid #d3d3d3;
		box-shadow: -7px 7px 7px gray;
		width: 5in;
		height: 3in;
		margin: auto;
	}
	#author-card-body{
		margin-left: 30px;
	}
	#title{
		text-indent: 60px;
	}
	#pages, #isbn, #tracing{
		margin-left: 60px;
	}
</style>