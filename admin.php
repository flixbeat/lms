<?php
	$controller = null;
	// THIS CONDITION WILL BE EXECUTED ONCE USER HAS CLICKED AN ACTION IN ADMIN PAGE
	if(isset($_GET['action'])){
		if($_GET['action']=='createBook'){
			require_once 'controllers/ControllerAdminCreateBook.php';
			$controller = new ControllerAdminCreateBook();
		}
	}
	# THIS CONDITION WILL ONLY BE EXECUTED BY AJAX CALL
	else if(isset($_POST['ajax']) && isset($_POST['field']) && isset($_POST['chr'])){
		require_once 'controllers/ControllerAdminAjax.php';
		$controller = new ControllerAdminAjax();
	}
	# THIS CONDITION WILL ONLY BE EXECUTED ON CREATE BOOK FORM SUBMIT
	else if(isset($_POST['btnCreateBook'])){
		require_once 'controllers/ControllerAdminCreateBook.php';
		$controller = new ControllerAdminCreateBook();
	}
	// THIS CONDITION IS EXECUTED ON INITIAL ADMIN PAGE LOAD
	else{
		require_once 'controllers/ControllerAdmin.php';
		$controller = new ControllerAdmin();
	}
	$controller->invoke();
?>