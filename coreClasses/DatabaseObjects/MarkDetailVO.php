<?php
class MarkingVO
{
	public $id;
	public $dt_fromDate;
	public $i_forest_id;
	public $dt_toDate;
	public $f_area;
	public $dt_created;
	public $dt_updated;
	public $i_status;
	public $i_user_id;
	public $i_overhead_status;
	public $i_conversion_status;
	public $vc_lotno;
	public $dt_completionDate;
	/**
	 Constructor , used to initialize all  the int type  of  variabless to  0.
	 */
	function  __construct() {
		$this->id=0;
	}
}
?>