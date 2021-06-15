<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Misc\Mpesa\TokenGenerator;
use App\Misc\Mpesa\Register;

class MpesaController extends Controller
{
    public function index()
    {
    	try
    	{
    		$env = 'sandbox';
	    	$token = (new TokenGenerator())->generateToken($env);
	    	$config = config("misc.mpesa.c2b.{$env}");
	    	$confirmation_url = route('api.mpesa.c2b.validate',$config['confirmation_key']);
	    	$validation_url = route('api.mpesa.c2b.validate',$config['validation_key']);
	    	$short_code = $config['short_code'];

	    	$response = (new Register())->setShortCode($short_code)
	    		->setValidationUrl($validation_url)
	    		->setConfirmationUrl($confirmation_url)
	    		->setToken($token)
	    		->register($env);

    	}catch(Exception $e)
    	{
    		return $e->getMessage();
    	}
    	return $response;
    }
}
