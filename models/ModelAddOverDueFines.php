<?php
	require_once 'ModelAdmin.php';

	class ModelAddOverDueFines extends ModelAdmin{

		public $avl;
		public $checkRet;
		public $id;
		public $dueChk;
		public $sName;
		public $secId;
		public $grdId;
		public $sId;

		public function __construct(){
			parent::__construct();
		}

		public function addOverDueFine($brwId,$stId,$dDate,$rDate,$amt){
			$sy = $this->getCurrentSchoolYearId();

			$qry = "INSERT INTO tbl_overdue_fines SET student_id = $stId, borrow_id = $brwId, due_date = '$dDate', date_return =  '$rDate', amount = $amt, school_year_id = $sy";
			$this->con->query($qry);

		}

		public function updateBorrowRecord($brwId){
			$qry = "UPDATE tbl_borrowing_logbook SET over_due_status = 1 WHERE id = $brwId";
			$this->con->query($qry);
		}

			
	}
?>