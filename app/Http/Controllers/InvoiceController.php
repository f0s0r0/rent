<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Payment;

class InvoiceController extends Controller
{
    
    public function invoices(Request $request)
    {
    	
    	$total = DB::table('payments')
    					->get()
    					->sum('amount_paid');
    	$invoice = DB::table('payments')
    					->join('users','users.id','=','payments.user_id')
    					->join('rooms','rooms.id','=','payments.room_id')
    					->select(
    							'users.firstName',
    							'users.middleName',
    							'users.lastName',
    							'rooms.room_no',
    							'rooms.floor',
    							'rooms.room_type',
    							'rooms.amount',
    							'payments.amount_paid',
    							'payments.created_at')
    					->where('users.room_status',"booked")
    					->where('payments.pay_status',"paid")
    					->get();
    					    /*$bal1 = 'amount';
					    	$bal2 = 'amount_paid';
					    	$bal3 = $bal1 - $bal2;*/
    					//$diff = getDiff('amount','amount_paid');
    	return view('admin.invoice')->with(['pay'=>$invoice])
    								//->with(['bal'=>$bal3])
    								->with(['ttl'=>$total]);
    }
}
