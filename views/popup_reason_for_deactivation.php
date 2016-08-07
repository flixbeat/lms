<h3>Enter reason for deactivation<h3>
<textarea id = "reason"></textarea> <br>
<button onclick = "ok()">OK</button>
<script>
	function ok(){
		var reason = document.getElementById('reason').value;
		window.opener.doAjax(reason)
		window.close();
	}
</script>
<style>
	textarea{
		width: 200px;
		height: 100px;
	}
</style>