<?php
	require_once 'Controller.php';
	class ControllerAdmin extends Controller{
		public function invoke(){
			$data = array('title'=>'Dashboard');
			
			$this->loadView('head',$data);
			$this->loadView('navbar',$data);
			$this->loadView('dashboard',$data);	
			$this->loadView('footer',null);	

		}
	}
?>