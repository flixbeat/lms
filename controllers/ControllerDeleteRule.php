<?php
	require_once 'Controller.php';

	class ControllerDeleteRule extends Controller{

		public $model;
		public function invoke(){
			$title1 = "Administration Management";

			$this->loadModel('ModelEditDeleteRule');
			$this->model = new ModelEditDeleteRule();

			$resRule = $this->model->selRule();

			$data = array('resRule'=>$resRule,'title'=>$title1);
			$this->loadView('head',$data);
			$this->loadView('navbar',null);
			$this->loadView('footer',null);			
			$this->loadView('delete_rule',$data);
			
			if(isset($_GET['btnSub'])){
				$id = $_GET['hidId'];
				$this->model->deleteRule($id);
				echo "<script>alert('Rule has been deleted');
						window.location.replace('rule_delete.php');
					</script>";
			}
		}
	}
?>