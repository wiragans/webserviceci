<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_model
{
    public function __construct()
    {
        parent::__construct();
    }
    
	public function getData()
	{
		$url = "https://api2.kmsp-store.com/get_pasien";

		$payload = [
				'id'=>'',
				'filter'=>'all'
				];

		$ch1 = curl_init($url);
		curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch1, CURLOPT_POST, 1);
		curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode($payload));
		curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Authorization: Basic N2Q5NmY2OTc5MDMxOWNmNmM1ZmViMjU4NDllYjQ0ODU6MGFhYmZkYjEwN2EwYTBjYmI0YTVlYTk3MjQyOTZjZGM=', 'Content-Type: application/json', 'clientId: 61fc89692eefa0b1a73f74a837b81a59'));
		$resultCh1 = curl_exec($ch1);
		//echo($resultCh1);
		$decodeResultCh1 = json_decode($resultCh1, true);
		curl_close($ch1);
		$this->session->set_flashdata('datapasien', $resultCh1);
	}
}
?>