<div class = "container">
	<form class = "form" action = "admin.php" method = "get">
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<strong>Enter the book number you want to edit.</strong>
			</div>
			<div class = "panel-body">
				<div class = "form-group">
					<label>Book Number</label>
					<input type = "number" name = "bookNumber" class = "form-control" required>
				</div>
				<div class = "form-group">
					<button class = "btn btn-primary">Next</button>
				</div>
				<div class = "panel panel-info">
					<div class = "panel-heading">
						<strong>Details </strong><small>(Type a book number above and its info will display below.)</small>
					</div>
					<div class = "panel-body">
						<div class = "form-group">
							<label>Title</label>
							<input type = "text" class = "form-control" id = "title" disabled>
							<label>ISBN</label>
							<input type = "text" class = "form-control" id = "isbn" disabled>
							<label>Author</label>
							<input type = "text" class = "form-control" id = "author" disabled>
							<label>Edition</label>
							<input type = "text" class = "form-control" id = "edition" disabled>
						</div>
					</div>
				</div>
			</div>
		</div>
		<input type = "hidden" name = "action" value = "editBook">
		<input type = "hidden" name = "bookId" id = "bookId">
	</form>
</div>
<script>
	$("input[name='bookNumber']").keyup(function(){
		$.post('admin.php',
			{
				ajax:true,
				action:'editBook',
				bookNumber:$(this).val()
			},
			function(data){
				var arr = data.split("|");
				$('#title').val(arr[0]);
				$('#isbn').val(arr[1]);
				$('#author').val(arr[2]);
				$('#edition').val(arr[3]);
				$('#bookId').val(arr[4]);
		});
	});
</script>