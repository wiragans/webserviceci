<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Get_pasien extends REST_Controller
{
	function __construct ($config = 'rest')
	{
		parent::__construct($config);
		$this->load->database();
	}

	function index_get()
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

	function index_post()
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
			return false;
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
    		return false;
    	}

		$idpasien = $this->post('id');
		$filter = $this->post('filter');

		if($filter == 'byid')
		{
			if($idpasien == '')
			{
				header('Content-Type: application/json; charset=UTF-8');
				$mantap = array(
					'statusCode'=>200,
					'status'=>false,
					'Code'=>'01',
					'message'=>'ID Kosong'
					);
				$this->response($mantap, 200);
				return false;
			}

			else
			{
				$query = "SELECT * FROM data_pasien WHERE id = ? ORDER BY id DESC";
				$do = $this->db->query($query, array($idpasien));
				$result = $do->result_array();

				$array_data = array();
				foreach($result as $row1)
				{
					$getId = (int)$row1['id'];
					$namalengkap = $row1['namalengkap'];
					$ruangpasien = $row1['ruangpasien'];
					$alamat = $row1['alamat'];
					$umur = $row1['umur'];
					$golongan_darah = $row1['golongandarah'];
					$jeniskelamin = $row1['jeniskelamin'];
					$keluhan = $row1['keluhan'];

					$array_data2 = array(
							'id'=>$getId,
							'nama_lengkap'=>$namalengkap,
							'ruang_pasien'=>$ruangpasien,
							'alamat'=>$alamat,
							'umur'=>(int)$umur,
							'golongan_darah'=>$golongan_darah,
							'jenis_kelamin'=>(int)$jeniskelamin,
							'keluhan'=>$keluhan
							);
					array_push($array_data, $array_data2);
				}

				header('Content-Type: application/json; charset=UTF-8');
				$mantap = array(
					'statusCode'=>200,
					'status'=>true,
					'Code'=>'00',
					'message'=>'SUCCESS',
					'data'=>$array_data
					);
				$this->response($mantap, 200);
				return false;
			}
		}

		else if($filter == 'all')
		{
				$query = "SELECT * FROM data_pasien ORDER BY id DESC";
				$do = $this->db->query($query);
				$result = $do->result_array();

				$array_data = array();
				foreach($result as $row1)
				{
					$getId = (int)$row1['id'];
					$namalengkap = $row1['namalengkap'];
					$ruangpasien = $row1['ruangpasien'];
					$alamat = $row1['alamat'];
					$umur = (int)$row1['umur'];
					$golongan_darah = $row1['golongandarah'];
					$jeniskelamin = (int)$row1['jeniskelamin'];
					$keluhan = $row1['keluhan'];

					$array_data2 = array(
							'id'=>$getId,
							'nama_lengkap'=>$namalengkap,
							'ruang_pasien'=>$ruangpasien,
							'alamat'=>$alamat,
							'umur'=>$umur,
							'golongan_darah'=>$golongan_darah,
							'jenis_kelamin'=>$jeniskelamin,
							'keluhan'=>$keluhan
							);
					array_push($array_data, $array_data2);
				}

				header('Content-Type: application/json; charset=UTF-8');
				$mantap = array(
					'statusCode'=>200,
					'status'=>true,
					'Code'=>'00',
					'message'=>'SUCCESS',
					'data'=>$array_data
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
					'message'=>'Filter Invalid'
					);
			$this->response($mantap, 200);
			return false;
		}
	}
}
?>