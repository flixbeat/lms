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
		else if($_GET['action']=='logout'){
			session_start();
			session_destroy();
			header('Location: index.php');
		}
		# floyd's
		else if($_GET['action']=='borrowBook'){
			require_once 'controllers/ControllerBorrowBook.php';
			$controller = new ControllerBorrowBook();
		}
		else if($_GET['action']=='studentIn'){
			require_once 'controllers/ControllerStudentTracker.php';
			$controller = new ControllerStudentTracker();
		}
		else if($_GET['action']=='addStudent'){
			require_once 'controllers/ControllerAddStudent.php';
			$controller = new ControllerAddStudent();
		}
		else if($_GET['action']=='editStudent'){
			require_once 'controllers/ControllerEditStudent.php';
			$controller = new ControllerEditStudent();
		}
		else if($_GET['action']=='searchStudent'){
			require_once 'controllers/ControllerSearchStudent.php';
			$controller = new ControllerSearchStudent();
		}
		else if($_GET['action']=='addRule'){
			require_once 'controllers/ControllerAddRule.php';
			$controller = new ControllerAddRule();
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