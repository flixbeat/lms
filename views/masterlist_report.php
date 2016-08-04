<div class = "container">
	<button class="btn btn-info pull-right" onclick="location.href = 'admin.php'"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
	<h3>Generate Master List Report</h3>
	<hr/>
	<form action = "masterlist_report.php" method = "post">
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<strong>Filter</strong>
			</div>
			<div class = "panel-body">
				<div class = "row">
					<div class = "col-sm-6">
						<div class = "form-group">
							<label>Class</label> <input list = "class_datalist" name = "class" class = "form-control" value = "<?= isset($_POST['class']) ? $_POST['class']:null ?>">
							<datalist id = "class_datalist">
								<?=$data['classDataList']?>
							</datalist>
						</div>
						<div class = "row">
							<div class = "col-sm-6">
								<div class = "form-group">
									<label>Author</label> <input list = "author_datalist" name = "author" class = "form-control" value = "<?= isset($_POST['author']) ? $_POST['author']:null ?>">
									<datalist id = "author_datalist">
										<?=$data['authorDataList']?>
									</datalist>
								</div>
							</div>
							<div class = "col-sm-6">
								<div class = "form-group">
									<label>Publisher</label> <input list = "publisher_datalist" name = "publisher" class = "form-control" value = "<?= isset($_POST['publisher']) ? $_POST['publisher']:null ?>">
									<datalist id = "publisher_datalist">
										<?=$data['publisherDataList']?>
									</datalist>
								</div>
							</div>
						</div>
					</div>
					<div class = "col-sm-6">
						<div class = "row">
							<div class = "col-sm-6">
								<div class = "form-group">
									<label><small>(Date Received)</small> From</label> <input type = "text" value = "01/01/1970" name = "dateFrom" id = "fromDatePicker" class = "form-control" required />
								</div>
								<div class = "form-group">
									<label>Source of Fund</label> <input list = "source_of_fund_datalist" class = "form-control" name = "source_of_fund" value = "<?= isset($_POST['source_of_fund']) ? $_POST['source_of_fund']:null ?>"/>
									<datalist id = "source_of_fund_datalist">
										<?=$data['sourceOfFundDataList']?>
									</datalist>
								</div>
							</div>
							<div class = "col-sm-6">
								<div class = "form-group">
									<label><small>(Date Received)</small> To</label> <input type = "text" value = "<?=date('m/d/Y')?>" name = "dateTo" id = "toDatePicker" class = "form-control" required />
								</div>
								<div class = "form-group">
									<label>Remarks</label> <input list = "remarks_datalist" class = "form-control" name = "remarks" value = "<?= isset($_POST['remarks']) ? $_POST['remarks']:null ?>"/>
									<datalist id = "remarks_datalist">
										<?=$data['remarksDataList']?>
									</datalist>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
			<div class = "panel-footer clearfix">
				<button class = "btn btn-primary pull-right">Search</button>
			</div>
		</div>
	</form>
	<ul class = "list-group">
		<li class="list-group-item"><button class = "btn btn-primary" onclick="print('#searchResult')"><span class="glyphicon glyphicon-print"></span> Print Result</button></li>
		<li class="list-group-item">
			<div id = "searchResult">
				<table class = "table">
					<tr>
						<th>Access Number</th>		
						<th>Class</th>		
						<th>Title</th>
						<th>ISBN</th>
						<th>Author</th>	
						<th>Publisher</th>
						<th>Edition</th>
						<th>Year</th>
						<th>Date Received</th>
						<th>Cost Price</th>
						<th>Source of Fund</th>
						<th>Pages</th>
						<th>Copy #</th>
						<th>Remarks</th>
						<th>Status</th>
					</tr>
					<?php while($row = $data['searchResult']->fetch_assoc()):?>
						<tr>
							<td><?=$row['book_number']?></td>
							<td><?=$row['class']?></td>
							<td><?=$row['title']?></td>
							<td><?=$row['isbn']?></td>
							<td><?=$row['author']?></td>
							<td><?=$row['publisher']?></td>
							<td><?=$row['edition']?></td>
							<td><?=$row['book_year']?></td>
							<td><?=$row['date_received']?></td>
							<td><?=$row['cost_price']?></td>
							<td><?=$row['source_of_fund']?></td>
							<td><?=$row['pages']?></td>
							<td><?=$row['copy']?></td>
							<td><?=$row['remarks']?></td>
							<td><?=$row['status']?></td>
						</tr>
					<?php endwhile;?>
				</table>
			</div>
		</li>
	</ul>
	
	
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$( "#fromDatePicker" ).datepicker();
		$( "#toDatePicker" ).datepicker();
	});

	function print(elementId){
		var data = $(elementId).html();
		
		var mywindow = window.open('', 'my div', 'height=640,width=800');
        mywindow.document.write('<html><head><title>Author Card</title>');
        mywindow.document.write('<link rel="stylesheet" href="css/tabular.css" type="text/css" />');
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
<style type="text/css">
	#searchResult{
		overflow: auto;
		overflow: scroll;
		overflow-y: hidden;
	}
</style>