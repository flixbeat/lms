<div class = "container">
	<h3>Activate / Deactivate Books</h3>
	<hr>
	<form method = "post" action = "activate_book.php">
		<div class = "form-group">
			<div class = "input-group">
				<input list = "class_datalist" class = "form-control" name = "class" placeholder = "Class">
				<datalist id = "class_datalist">
					<?=$data['classDataList']?>
				</datalist>
				<div class="input-group-addon"><span class = "glyphicon glyphicon-search"></span> Search</div>
			</div>
		</div>
	</form>
	<table class = "table">
		<tr>
			<th>Access Number</th>		
			<th>Class</th>		
			<th>Title</th>
			<th>ISBN</th>
			<th>Author</th>	
			<th>Publisher</th>
			<th>Edition</th>
			<th>Copy #</th>
			<th>Remarks</th>
			<th>Status</th>
		</tr>
		<?php if(isset($data['searchResult'])):?>
			<?php while($row = $data['searchResult']->fetch_assoc()):?>
				<tr>
					<td><?=$row['book_number']?></td>
					<td><?=$row['class']?></td>
					<td><?=$row['title']?></td>
					<td><?=$row['isbn']?></td>
					<td>
						<?php 
							if( substr_count($row['author'], '~' ) > 2){
								$authorR  = explode('~', $row['author']);
								echo $authorR[0] . ", " . $authorR[1] . ", et. al.";
							}
							else
								echo $row['author'];
						?>

					</td>
					<td><?=$row['publisher']?></td>
					<td><?=$row['edition']?></td>
					<td><?=$row['copy']?></td>
					<td><?=$row['remarks']?></td>
					<td>
						<?php if($row['status'] == 'A'):?>
							<input type = "checkbox" value = "<?=$row['bookId']?>" class = "chkActive" checked>
						<?php endif;?>
						<?php if($row['status'] == 'U'):?>
							<input type = "checkbox" value = "<?=$row['bookId']?>" class = "chkActive" >
						<?php endif;?>
					</td>
				</tr>
			<?php endwhile;?>
		<?php endif;?>
	</table>

</div>
<script type="text/javascript">
	var isChecked;
	var bookId;
	var status;

	$('.chkActive').click(function(){
		isChecked = $(this).is(':checked');
		bookId = $(this).val();
		status = null;

		if(isChecked){
			status = 'A';
			doAjaxClear();
		}
		else{
			status = 'U';
			popup();
		}
		
		/*
		$.post('admin.php',
			{
				ajax: true,
				action: 'setActive',
				bookId: bookId,
				status: status
			},
			function(data){
				
			}
		);
*/
	});

	function popup(){
		window.open('views/popup_reason_for_deactivation.php','Reason for Deactivation',"width=310,height=210,scrollable=yes");
	}

	function doAjax(reason){
		$.post('admin.php',
			{
				ajax: true,
				action: 'setActive',
				bookId: bookId,
				status: status,
				reason: reason
			},
			function(data){
				
			}
		);
	}

	function doAjaxClear(){
		$.post('admin.php',
			{
				ajax: true,
				action: 'setActive',
				bookId: bookId,
				status: null,
				reason: ''
			},
			function(data){
				
			}
		);	
	}

</script>