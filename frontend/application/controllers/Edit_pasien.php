<?php
defined('BASEPATH') or exit('No direct script access allowed');

Class Edit_pasien extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	    $this->load->model('pasien');
		$data = array(
				'title'=>'Edit Pasien',
				'edit_pasien'=>$this->pasien->getData()
				);
		$this->load->view('edit_pasien', $data);
	}
}
?>