<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Hapus_pasien extends REST_Controller
{
	public function __construct ($config = 'rest')
	{
		parent::__construct($config);
		$this->load->database();
		$this->load->helper('url');
		$this->id_pasien = '';
	}

	public function authenticate()
	{
		if(empty($this->input->server('PHP_AUTH_USER')) || empty($this->input->server('PHP_AUTH_PW')))
   		{
	       header('WWW-Authenticate: Basic realm="KMSPRealm"');
	       header('Content-Type: application/json; charset=UTF-8');
    	   $mantap = array(
					'statusCode'=>401,
					'status'=>false,
					'Code'=>'01',
					'message'=>'Authentication token is required and has failed or has not yet been provided'
					);
			$this->response($mantap, 401);
			return true;
	    }

	    $username = $this->input->server('PHP_AUTH_USER');
	    $password = $this->input->server('PHP_AUTH_PW');

    	if($username != "7d96f69790319cf6c5feb25849eb4485" || $password != "0aabfdb107a0a0cbb4a5ea9724296cdc")
    	{
	        header('WWW-Authenticate: Basic realm="KMSPRealm"');
	        header('Content-Type: application/json; charset=UTF-8');
    		$mantap = array(
					'statusCode'=>401,
					'status'=>false,
					'Code'=>'01',
					'message'=>'Authentication token is required and has failed or has not yet been provided'
					);
			$this->response($mantap, 401);
    		return true;
    	}
	}

	public function index_get($id)
	{
		if($this->authenticate() == true)
		{
	       header('WWW-Authenticate: Basic realm="KMSPRealm"');
	       header('Content-Type: application/json; charset=UTF-8');
    	   $mantap = array(
					'statusCode'=>401,
					'status'=>false,
					'Code'=>'01',
					'message'=>'Authentication token is required and has failed or has not yet been provided'
					);
			$this->response($mantap, 401);
			return false;
		}

		if($this->authenticate() == false)
		{
			$this->id_pasien = $id;
			$getIdPasien = $this->id_pasien;

			$a = "SELECT * FROM data_pasien WHERE id=? ORDER BY id DESC LIMIT 1";
			$do = $this->db->query($a, array($getIdPasien));

			if($do->num_rows() <= 0)
			{
			    header('Content-Type: application/json; charset=UTF-8');
				$mantap = array(
						'statusCode'=>200,
						'status'=>false,
						'Code'=>'01',
						'message'=>'ID tidak dapat ditemukan'
						);
				$this->response($mantap, 200);
				return false;
			}

			$query = "DELETE FROM data_pasien WHERE id=?";
			$do2 = $this->db->query($query, array($getIdPasien));

			if($do2)
			{
			    header('Content-Type: application/json; charset=UTF-8');
				$mantap = array(
						'statusCode'=>200,
						'status'=>true,
						'Code'=>'00',
						'message'=>'Sukses menghapus data pasien'
						);
				$this->response($mantap, 200);
				return false;
			}

			else
			{
			    header('Content-Type: application/json; charset=UTF-8');
				$mantap = array(
						'statusCode'=>200,
						'status'=>false,
						'Code'=>'01',
						'message'=>'Terjadi masalah saat menghapus data pasien'
						);
				$this->response($mantap, 200);
				return false;
			}
		}
	}
}