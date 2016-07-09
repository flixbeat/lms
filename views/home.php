<div class = "container-fluid">
	<div class = "container">
		<div>
			<h1 class = "text-center text-primary">Library Search</h1>
		</div>
		<form method = "post" action = "index.php">
			<div class = "form-group">
				<div class = "input-group">
					<input type = "text" class = "form-control" name = "keyword" placeholder = "Title,Author,Publisher,Access Number,etc...">
					<div class="input-group-addon"><span class = "glyphicon glyphicon-search"></span> Search</div>
				</div>
			</div>
		</form>
	</div>
</div>
<style type="text/css">
	.input-group-addon{
		cursor: pointer;
	}
</style>
<script type="text/javascript">
	$('.input-group-addon').click(function(){
		$('form').submit();
	});
</script>