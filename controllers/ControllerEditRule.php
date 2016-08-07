<?php
	require_once 'Controller.php';

	class ControllerEditRule extends Controller{

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
			
			if(!isset($_GET['btnSub'])){
				$this->loadView('edit_rule',$data);
			}
			else if(isset($_GET['btnSub'])){
				$id = $_GET['hidId'];
				$rule = $_GET['rule'];
				$value = $_GET['val'];

				$this->model->updateRule($id,$rule,$value);
				/*$data['alertM'] = "<div class='alert alert-success'>
				  <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				  <strong>Success!</strong> Rule has been updated.
				</div>";
				echo "<script>alert('Rule has been updated.')
						
					</script>";
				$this->loadView("edit_rule,$data");

				*/

				echo "<script>alert('Rule has been updated.');
						window.location.replace('rule_edit.php');
					</script>";				
			}
		}
	}
?>