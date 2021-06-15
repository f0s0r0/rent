<?php

namespace App\Misc\Mpesa\Traits;

class ValidatesEndpoints
{
	private $default_endpoints = [];
	private $endpoint = null;

	public function ValidatesEndpoints(string $env)
	{
		if(!$this->endpoint){
		  	if(!array_key_exists($env, $this->default_endpoints)){
		  		throw new \ErrorException('Endpoint Missing');
		  	}
  		$this->endpoint = $this->default_endpoints[$env];
  		}
	}
}

?>