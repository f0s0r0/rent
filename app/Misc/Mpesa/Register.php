<?php

namespace App\Misc\Mpesa;
use App\Misc\Mpesa\Traits\ValidatesEndpoints;

class Register extends ValidatesEndpoints
{
	protected $default_endpoints = [
		'live' => 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl',
	    'sandbox' => 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl'];
	private $token = null;
	private $confirmation_url = null;
	private $validation_url = null;
	private $short_code = null;
	private $response_type = 'cancelled';


	

	public function register(string $env)
	{
		//$url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
		$this->ValidatesEndpoints($env);

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $this->endpoint);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json',"Authorization:Bearer {$this->token}")); //setting custom header
  
  
  $curl_post_data = array(
    //Fill in the request parameters with valid values
    'ShortCode' => $this->short_code,
    'ResponseType' => $this->response_type,
    'ConfirmationURL' => $this->confirmation_url,
    'ValidationURL' => $this->validation_url
  );
  
  $data_string = json_encode($curl_post_data);
  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  
  /*$curl_response = curl_exec($curl);
  print_r($curl_response);
  
  echo $curl_response;*/
  return curl_exec($curl);
	}
	public function setEndpoint(string $endpoint)
	{
		$this->endpoint = $endpoint;
		return $this;
	}
	public function setConfirmationUrl($confirmation_url)
	{
		$this->confirmation_url = $confirmation_url;
		return $this;
	}
	public function setToken($token)
	{
		$this->token=$token;
		return $this;
	}
	public function setValidationUrl($validation_url)
	{
		$this->validation_url=$validation_url;
		return $this;
	}
	public function setResponseType(string $response_type)
	{
		$this->response_type = $response_type;
		return $this;
	}
	public function setShortCode($short_code)
	{
		$this->short_code = $short_code;
		return $this;
	}
}

?>