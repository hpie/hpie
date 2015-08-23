<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->database();

        $this->load->helper('url');
		/* ------------------ */

        $this->load->library('grocery_CRUD');

    }

    public function index()
    {
        echo "<h1>Welcome to the world of Codeigniter</h1>";//Just an example to ensure that we get into the function
        die();
    }

    public function centers()
	    {
	        $crud = new grocery_CRUD();

			$crud->set_subject('Center');
	        $crud->set_table('hpie_center');

			// Change Field Dosplay Value
			//$crud->display_as('contact_fname','First Name');
			//$crud->display_as('contact_mname','Middle Name');
			//$crud->display_as('contact_lname','Last Name');
			$crud->display_as('center_address_line1','Address 1');
			$crud->display_as('center_address_line2','Address 2');
			$crud->display_as('center_block','Block');
			$crud->display_as('center_atc_status','ATC Status');
			$crud->display_as('center_certificate_status','Certificate Status');
			$crud->display_as('center_kit_status','ATC Kit Status');
			$crud->display_as('center_doc_status','ATC Documents Status');
			$crud->display_as('center_grade','ATC Grade');
			$crud->display_as('center_atc_approval_dt','ATC Approval Date');

			// Limit Crud Feilds
			$crud->add_fields('center_code','center_name','center_address_line1','center_address_line2',
							'center_block', 'center_atc_status', 'center_certificate_status', 'center_kit_status', 'center_doc_status', 'center_grade', 'center_atc_approval_dt',
							'city','state',	'pincode','contact_no','email_id','website','status');

			$crud->edit_fields('center_name','center_address_line1','center_address_line2',
								'center_block', 'center_atc_status', 'center_certificate_status', 'center_kit_status', 'center_doc_status', 'center_grade', 'center_atc_approval_dt',
								'city','state',	'pincode','contact_no','email_id','website','status');

			// Mandatory Fields
			$crud->required_fields('center_code','center_name',
			'center_block', 'center_atc_status', 'center_certificate_status', 'center_kit_status', 'center_doc_status', 'center_grade', 'center_atc_approval_dt',
			'city','state','pincode','contact_no','email_id','status');


			// custom drop downs
			$crud->field_type('center_atc_status','dropdown',
            array('A' => 'Approved', 'D' => 'Deleted', 'HC' => 'Hold & Canceled', 'PDR' => 'Pending ATC Certificate', 'PDR' => 'Pending DD Review', 'PFR' => 'Pending Faculty Review', 'R' => 'Requested' ));

            $crud->field_type('center_certificate_status','dropdown',
            array('D' => 'Dispatched', 'G' => 'Given', 'P' => 'Pending', 'R' => 'Requested' ));

            $crud->field_type('center_kit_status','dropdown',
            array('D' => 'Dispatched', 'G' => 'Given', 'P' => 'Pending', 'R' => 'Requested' ));

            $crud->field_type('center_doc_status','dropdown',
            array('C' => 'Complete', 'I' => 'Incompete', 'P' => 'Pending' ));

            $crud->field_type('center_grade','dropdown',
            array('A' => 'A Grade', 'B' => 'B Grade', 'C' => 'C Grade', 'D' => 'D Grade', 'E' => 'E Grade', 'F' => 'F Grade' ));

			$crud->field_type('status','dropdown',
            array('A' => 'Active', 'D' => 'Deleted', 'I' => 'InActive','W' => 'Withdrawn'));

			// Custom Action
			//$crud->add_action('Contacts', '', 'main/centercContacts','ui-icon-plus','');
			$output = $crud->render();

			$this->_crud_output($output);
	        //echo "<pre>";
	        //print_r($output);
	        //echo "</pre>";
	        //die();
    }

    public function centerAssets()
		    {
		        $crud = new grocery_CRUD();

				$crud->set_subject('Arrest');
		        $crud->set_table('hpie_center_assets');

				// Change Field Dosplay Value
				//$crud->display_as('contact_fname','First Name');
				//$crud->display_as('contact_mname','Middle Name');
				//$crud->display_as('contact_lname','Last Name');
				//$crud->display_as('student_fathername','Father Name');
				//$crud->display_as('student_mothername','Mother Name');

				// Limit Crud Feilds
				$crud->add_fields('center_code','asset_name','asset_make','asset_model',
								'asset_serial_code', 'asset_count','status');

				$crud->edit_fields('asset_name','asset_make','asset_model',
								'asset_serial_code', 'asset_count','status');

				// Mandatory Fields
				$crud->required_fields('center_code','asset_name','asset_count','status');

				//Join Fields
				$crud->set_relation('center_code','hpie_center','center_name',array('status' => 'A'), 'center_name ASC');


				// custom drop downs
				$crud->field_type('status','dropdown',
	            array('A' => 'Active', 'D' => 'Deleted', 'I' => 'InActive','W' => 'Withdrawn'));

				// Custom Action
				//$crud->add_action('Contacts', '', 'main/centercContacts','ui-icon-plus','');
				$output = $crud->render();

				$this->_crud_output($output);
		        //echo "<pre>";
		        //print_r($output);
		        //echo "</pre>";
		        //die();
    }

	public function centerContacts()
		{
			$crud = new grocery_CRUD();

			$crud->set_subject('Center Contact');
			$crud->set_table('hpie_center_contact');

			// Change Field Dosplay Value
			$crud->display_as('contact_fname','First Name');
			$crud->display_as('contact_mname','Middle Name');
			$crud->display_as('contact_lname','Last Name');
			//$crud->display_as('student_fathername','Father Name');
			//$crud->display_as('student_mothername','Mother Name');

			// Limit Crud Feilds
			$crud->add_fields('center_code', 'contact_fname', 'contact_mname', 'contact_lname', 'contact_phone', 'contact_mobile', 'contact_office', 'email_id', 'status');

			$crud->edit_fields('contact_fname', 'contact_mname', 'contact_lname', 'contact_phone', 'contact_mobile', 'contact_office', 'email_id', 'status');

			// Mandatory Fields
			$crud->required_fields('center_code','contact_fname','contact_mobile','email_id','status');

			//Join Fields
			$crud->set_relation('center_code','hpie_center','center_name',array('status' => 'A'), 'center_name ASC');

			$crud->field_type('status','dropdown',
			array('A' => 'Active', 'D' => 'Deleted', 'I' => 'InActive','W' => 'Withdrawn'));

			$output = $crud->render();

			$this->_crud_output($output);
			//echo "<pre>";
			//print_r($output);
			//echo "</pre>";
			//die();
	    }

		public function centerFacility()
		{
			$crud = new grocery_CRUD();

			$crud->set_subject('Center Facility');
			$crud->set_table('hpie_center_facility');

			// Change Field Dosplay Value
			//$crud->display_as('student_fname','First Name');
			//$crud->display_as('student_mname','Middle Name');
			//$crud->display_as('student_lname','Last Name');
			$crud->display_as('facility_classes','No of Rest Classes');
			$crud->display_as('facility_labs','No of Rest Labs');
			$crud->display_as('facility_restrooms','No of Rest Rooms');

			// Limit Crud Feilds
			$crud->add_fields('center_code', 'facility_name', 'facility_area', 'facility_classes', 'facility_labs', 'facility_restrooms', 'facility_library', 'status');

			$crud->edit_fields('facility_name', 'facility_area', 'facility_classes', 'facility_labs', 'facility_restrooms', 'facility_library', 'status');

			// Mandatory Fields
			$crud->required_fields('center_code','facility_name','facility_classes','facility_labs','status');

			//Join Fields
			$crud->set_relation('center_code','hpie_center','center_name',array('status' => 'A'), 'center_name ASC');

			$crud->field_type('status','dropdown',
			array('A' => 'Active', 'D' => 'Deleted', 'I' => 'InActive','W' => 'Withdrawn'));

			$output = $crud->render();

			$this->_crud_output($output);
			//echo "<pre>";
			//print_r($output);
			//echo "</pre>";
			//die();
	    }

	    public function centerFaculty()
		{
			$crud = new grocery_CRUD();

			$crud->set_subject('Center Faculty');
			$crud->set_table('hpie_center_faculty');

			// Change Field Dosplay Value
			$crud->display_as('faculty_fname','First Name');
			$crud->display_as('faculty_mname','Middle Name');
			$crud->display_as('faculty_lname','Last Name');
			//$crud->display_as('student_fathername','Father Name');
			//$crud->display_as('student_mothername','Mother Name');

			// Limit Crud Feilds
			$crud->add_fields('center_code', 'faculty_fname', 'faculty_mname', 'faculty_lname', 'faculty_qualification', 'faculty_phone', 'faculty_mobile', 'contact_office', 'email_id', 'status');

			$crud->edit_fields('faculty_fname', 'faculty_mname', 'faculty_lname', 'faculty_qualification', 'faculty_phone', 'faculty_mobile', 'contact_office', 'email_id', 'status');

			// Mandatory Fields
			$crud->required_fields('center_code','faculty_fname','faculty_qualification','faculty_mobile','status');

			//Join Fields
			$crud->set_relation('center_code','hpie_center','center_name',array('status' => 'A'), 'center_name ASC');

			$crud->field_type('status','dropdown',
			array('A' => 'Active', 'D' => 'Deleted', 'I' => 'InActive','W' => 'Withdrawn'));

			$output = $crud->render();

			$this->_crud_output($output);
			//echo "<pre>";
			//print_r($output);
			//echo "</pre>";
			//die();
	    }

	    public function centerTransact()
		{
			$crud = new grocery_CRUD();

			$crud->set_subject('Center Details');
			$crud->set_table('hpie_center_transact');

			// Change Field Dosplay Value
			$crud->display_as('transact_account_no','Account Number');
			$crud->display_as('transact_account_bank','Account Bank');
			$crud->display_as('transact_account_branch','Bank Branch');
			$crud->display_as('transact_account_ifsc','Branch IFSC');
			$crud->display_as('transact_account_pan','PAN Number');
			$crud->display_as('transact_account_st_no','Sales Tax Number');

			// Limit Crud Feilds
			$crud->add_fields('center_code', 'transact_account_no', 'transact_account_bank', 'transact_account_branch', 'transact_account_ifsc', 'transact_account_pan', 'transact_account_st_no', 'status');

			$crud->edit_fields('transact_account_no', 'transact_account_bank', 'transact_account_branch', 'transact_account_ifsc', 'transact_account_pan', 'transact_account_st_no', 'status');

			// Mandatory Fields
			$crud->required_fields('center_code','transact_account_no','transact_account_bank','transact_account_branch','transact_account_ifsc','transact_account_pan','status');

			//Join Fields
			$crud->set_relation('center_code','hpie_center','center_name',array('status' => 'A'), 'center_name ASC');

			$crud->field_type('status','dropdown',
			array('A' => 'Active', 'D' => 'Deleted', 'I' => 'InActive','W' => 'Withdrawn'));

			$output = $crud->render();

			$this->_crud_output($output);
			//echo "<pre>";
			//print_r($output);
			//echo "</pre>";
			//die();
	    }



    public function courses()
	{
		$crud = new grocery_CRUD();

		$crud->set_subject('Course');
		$crud->set_table('hpie_course');

		// Change Field Dosplay Value
		//$crud->display_as('student_fname','First Name');
		//$crud->display_as('student_mname','Middle Name');
		//$crud->display_as('student_lname','Last Name');
		//$crud->display_as('student_fathername','Father Name');
		//$crud->display_as('student_mothername','Mother Name');

		// Limit Crud Feilds
		$crud->add_fields('course_code','course_name','course_duration','course_details','status');

		$crud->edit_fields('course_name','course_duration','course_details','status');

		// Mandatory Fields
		$crud->required_fields('course_code','course_name','course_duration','status');

		$crud->field_type('course_duration','dropdown',
		array('7-Day' => '7-Day', '15-Day' => '15-Day', '45-Day' => '45-Day', '1-Month' => '1-Month', '2-Month' => '2-Month', '3-Month' => '3-Month', '4-Month' => '4-Month', '5-Month' => '5-Month', '6-Month' => '6-Month',
		 '7-Month' => '7-Month', '8-Month' => '8-Month', '9-Month' => '9-Month', '10-Month' => '10-Month', '11-Month' => '11-Month', '18-Month' => '18-Month', '1-Year' => '1-Year', '2-Year' => '2-Year'));

		$crud->field_type('status','dropdown',
		array('A' => 'Active', 'D' => 'Deleted', 'I' => 'InActive','W' => 'Withdrawn'));

		$output = $crud->render();

		$this->_crud_output($output);
		//echo "<pre>";
		//print_r($output);
		//echo "</pre>";
		//die();
    }


	public function students()
	{
		$crud = new grocery_CRUD();

		$crud->set_subject('Student');
		$crud->set_table('hpie_student');

		// Change Field Dosplay Value
		$crud->display_as('student_fname','First Name');
		$crud->display_as('student_mname','Middle Name');
		$crud->display_as('student_lname','Last Name');
		$crud->display_as('student_fathername','Father Name');
		$crud->display_as('student_mothername','Mother Name');

		// Limit Crud Feilds
		$crud->add_fields('student_code','student_fname','student_mname','student_lname','student_fathername','student_mothername',
		'student_gender','student_dob','student_address_line1','student_address_line2','city','state','pincode','contact_no','email_id','status');

		$crud->edit_fields('student_fname','student_mname','student_lname','student_fathername','student_mothername',
		'student_gender','student_dob','student_address_line1','student_address_line2','city','state','pincode','contact_no','email_id','status');

		// Mandatory Fields
		$crud->required_fields('student_code','student_fname','student_lname','student_fathername','student_mothername','student_dob','student_gender','status');

		$crud->field_type('student_gender','dropdown',
		array('Male' => 'M', 'Female' => 'F'));

		$crud->field_type('status','dropdown',
		array('A' => 'Active', 'D' => 'Deleted', 'I' => 'InActive','W' => 'Withdrawn'));

		$output = $crud->render();

		$this->_crud_output($output);
		//echo "<pre>";
		//print_r($output);
		//echo "</pre>";
		//die();
    }


	public function enrollments()
	{
		$crud = new grocery_CRUD();

		$crud->set_subject('Enrollments');
		$crud->set_table('hpie_student_course');

		// Change Field Dosplay Value
		$crud->display_as('sc_start_dt','Course Start Date');
		$crud->display_as('sc_fee','Course Fee');
		$crud->display_as('sc_books_status','Course Books Status');
		$crud->display_as('sc_completed_dt','Course End Date');
		$crud->display_as('sc_exam_dt','Course Exam Date');
		$crud->display_as('sc_status','Course Status');
		$crud->display_as('sc_certificate_status','Certificate Status');
		$crud->display_as('sc_certificate_no','Certificate No');

		// Limit Crud Feilds
		$crud->add_fields('student_code','course_code','center_code','sc_start_dt','sc_fee','sc_books_status','status');

		$crud->edit_fields('sc_start_dt','sc_fee','sc_books_status','sc_completed_dt','sc_exam_dt','sc_status','sc_certificate_status','sc_certificate_no','status');

		// Mandatory Fields
		$crud->required_fields('center_code','course_code','student_code','sc_start_dt','sc_status','status');


		// Set Joins and Relations
		$crud->set_relation('student_code','hpie_student','{student_code}-{student_fname} {student_lname}',null,'student_fname ASC');
		$crud->set_relation('course_code','hpie_course','course_name',array('status' => 'A'), 'course_name ASC');
		$crud->set_relation('center_code','hpie_center','center_name',array('status' => 'A'), 'center_name ASC');

		$crud->field_type('sc_books_status','dropdown',
		 		array('P' => 'Pending', 'R' => 'Requested', 'A' => 'Awarded'));
		$crud->field_type('sc_status','dropdown',
		 		array('A' => 'Admitted', 'D' => 'Dropped Out', 'F' => 'Failed', 'P' => 'Passed'));
		$crud->field_type('sc_certificate_status','dropdown',
		 		array('A' => 'Awarded', 'P' => 'Pending', 'R' => 'Requested'));
		$crud->field_type('status','dropdown',
		array('A' => 'Active', 'D' => 'Deleted', 'I' => 'InActive','W' => 'Withdrawn'));

		$output = $crud->render();

		$this->_crud_output($output);
		//echo "<pre>";
		//print_r($output);
		//echo "</pre>";
		//die();
    }


    function _crud_output($output = null)
	{
	        $this->load->view('crud_template.php',$output);
    }

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */