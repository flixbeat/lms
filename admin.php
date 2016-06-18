<?php
	$controller = null;
	// THIS CONDITION WILL BE EXECUTED ONCE USER HAS CLICKED AN ACTION IN ADMIN PAGE
	if(isset($_GET['action'])){
		if($_GET['action']=='createBook'){
			require_once 'controllers/ControllerAdminCreateBook.php';
			$controller = new ControllerAdminCreateBook();
		}
		else if($_GET['action']=='editBook'){
			require_once 'controllers/ControllerAdminEditBook.php';
			$controller = new ControllerAdminEditBook();
		}
	}
	# THIS CONDITION WILL ONLY BE EXECUTED BY AJAX CALL
	else if(isset($_POST['ajax'])){
		require_once 'controllers/ControllerAdminAjax.php';
		$controller = new ControllerAdminAjax();
	}
	# THIS CONDITION WILL ONLY BE EXECUTED ON CREATE BOOK FORM SUBMIT
	else if(isset($_POST['btnCreateBook'])){
		require_once 'controllers/ControllerAdminCreateBook.php';
		$controller = new ControllerAdminCreateBook();
	}
	# ON EDIT FORM SUBMIT
	else if(isset($_POST['btnEditBook'])){
		require_once 'controllers/ControllerAdminEditBook.php';
		$controller = new ControllerAdminEditBook();
	}
	// THIS CONDITION IS EXECUTED ON INITIAL ADMIN PAGE LOAD
	else{
		require_once 'controllers/ControllerAdmin.php';
		$controller = new ControllerAdmin();
	}
	$controller->invoke();
?>