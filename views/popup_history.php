<div class="continer">
	<div class = "col-sm-8">
		<br>
		<input type="hidden" value="<?php echo $data['id']?>" id = "hidId">
		
		<label>Filter History By Date</label><hr>
		<label>Date of Borrowing</label>
		<input type="date" class="form-control" id = "date1">
		<label>to</label>
		<input type="date" class="form-control" id = "date2"><br>
		<div class="pull-right">
			<button class="btn btn-primary" id = "btnFilter" data-toggle = "modal" data-target = "#manage-student-modal">Filter</button>
		</div>
		<div class="pull-left">
			<button class="btn btn-danger" id = "btnFilter" onclick = 'window.close()'>Close</button>
		</div>
	</div>
</div>
<div id="modalDisplay">
	<div class = "modal fade" id = "manage-student-modal" tabindex = "-1" role = "dialog" aria-labelledby = "book-br" aria-hidden = "true">
		<div class = "modal-dialog modal-lg">
			<div class = "modal-content">
				<div class = "modal-header">
					<button type = "button" class = "close" data-dismiss = "modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class = "modal-title" id = "manage-book">Student Borrowing Records</h4>
					<br>
					<p><label>Student Number:</label> <?=$data['sNum']?></p>
				</div>
				<div class = "modal-body" id = "divRes">

				</div>
				<div class = "modal-footer">
					<div class="pull-left">
						<button class="btn btn-info" onclick="print('#divRes')"><span class="glyphicon glyphicon-print"></span> Print</button>
					</div>
					<div class="pull-right">
						<button class="btn btn-danger" data-dismiss = "modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function (){
		$("#btnFilter").click(function(){
			$.ajax({
				type: 'post',
				url: 'admin.php',

				data:{

					ajax: true,
					action: 'selHistory',
					sId:$('#hidId').val(),
					d1:$('#date1').val(),
					d2:$('#date2').val()
										
				},
				success: function(data){
					$('#divRes').html(data);
				}
			});
		});
	});

		function print(elementId){

			var data = $(elementId).html();
			
			var mywindow = window.open('', 'my div', 'height=640,width=800');
	        mywindow.document.write('<html><head><title>Student ID: <?=$data["sNum"]?> library transactions?></title>');
	        mywindow.document.write('<link rel = "stylesheet" href = "css/tabular.css"/>');
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