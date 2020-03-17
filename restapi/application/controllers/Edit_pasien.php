<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Edit_pasien extends REST_Controller
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

	public function index_get()
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

	public function index_put($id)
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

			$namapasien = $this->put('nama_lengkap');
			$ruang_pasien = $this->put('ruang_pasien');
			$alamat = $this->put('alamat');
			$umur = $this->put('umur');
			$golongan_darah = $this->put('golongan_darah');
			$jenis_kelamin = $this->put('jenis_kelamin');
			$keluhan = $this->put('keluhan');

			if($getIdPasien == '')
			{
			    header('Content-Type: application/json; charset=UTF-8');
				$mantap = array(
						'statusCode'=>200,
						'status'=>false,
						'Code'=>'01',
						'message'=>'ID Pasien Kosong'
						);
				$this->response($mantap, 200);
				return false;
			}

			if(empty($namapasien) || empty($ruang_pasien) || empty($alamat) || empty($umur) || empty($golongan_darah) || empty($jenis_kelamin) || empty($keluhan))
			{
			    if($umur == 0 || $umur < 0)
    		    {
    		        header('Content-Type: application/json; charset=UTF-8');
        			$mantap = array(
        						'statusCode'=>200,
        						'status'=>false,
        						'Code'=>'01',
        						'message'=>'Umur tidak boleh 0 atau kurang dari 0!'
        						);
        			$this->response($mantap, 200);
        			return false;
    		    }
			    
			    header('Content-Type: application/json; charset=UTF-8');
				$mantap = array(
						'statusCode'=>200,
						'status'=>false,
						'Code'=>'01',
						'message'=>'Data ada yang kosong'
						);
				$this->response($mantap, 200);
				return false;
			}

			if(!empty($namapasien) && !empty($ruang_pasien) && !empty($alamat) && !empty($umur) && !empty($golongan_darah) && !empty($jenis_kelamin) && !empty($keluhan))
			{
			    if($umur == 0 || $umur < 0)
    		    {
    		        header('Content-Type: application/json; charset=UTF-8');
        			$mantap = array(
        						'statusCode'=>200,
        						'status'=>false,
        						'Code'=>'01',
        						'message'=>'Umur tidak boleh 0 atau kurang dari 0!'
        						);
        			$this->response($mantap, 200);
        			return false;
    		    }
			    
				$array_jeniskelamin = array("1", "2", "3");
				if(!in_array($jenis_kelamin, $array_jeniskelamin))
				{
				    header('Content-Type: application/json; charset=UTF-8');
					$mantap = array(
							'statusCode'=>200,
							'status'=>false,
							'Code'=>'01',
							'message'=>'Invalid Jenis Kelamin Parameter'
							);
					$this->response($mantap, 200);
					return false;
				}

				else
				{
					$a = "SELECT * FROM data_pasien WHERE id=? ORDER BY id DESC LIMIT 1";
					$do1 = $this->db->query($a, array($getIdPasien));

					if($do1->num_rows() <= 0)
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

					$query = "UPDATE data_pasien SET namalengkap=?, ruangpasien=?, alamat=?, umur=?, golongandarah=?, jeniskelamin=?, keluhan=? WHERE id=?";
					$do = $this->db->query($query, array($namapasien, $ruang_pasien, $alamat, $umur, $golongan_darah, $jenis_kelamin, $keluhan, $getIdPasien));

					if($do)
					{
					    header('Content-Type: application/json; charset=UTF-8');
						$mantap = array(
							'statusCode'=>200,
							'status'=>true,
							'Code'=>'00',
							'message'=>'Edit data pasien sukses'
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
							'message'=>'Edit data pasien gagal'
							);
						$this->response($mantap, 200);
						return false;
					}
				}
			}
		}
	}
}