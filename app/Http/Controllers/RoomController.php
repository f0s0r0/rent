<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Room;
use App\Report;
use App\Payment;
use PDF;
class RoomController extends Controller
{
    public function newroom(Request $request)
    {
        $rm=DB::table('rooms')
                        ->get();
        return view('admin.addroom')->with('rmno',$rm);
    }
    public function addroom(Request $request)
    {
        $addrm = new Room;
        $addrm->room_no=$request->roomno;
        $addrm->floor=$request->floor;
        $addrm->room_type=$request->roomtype;
        $addrm->amount=$request->amount;
        $addrm->save();
        $notification = array(
            'message' => 'Room Added Successfully.', 
            'alert-type' => 'info'
        );
        return Redirect()->back()->with($notification);
    }
    public function allrooms()
    {
        $avrms=DB::table('rooms')
                        ->get();
        return view('admin.allrooms')->with('allrms',$avrms);
    }
    public function updateroom($id)
    {
        $roomupdate=DB::table('rooms')->where('id',$id)->first();
        return view('admin.update-room')->with('uroom',$roomupdate);
    }

    public function updatedroom(Request $request, $id)
    {
        $userupdate=Room::find($id);
        $userupdate->room_no=$request->roomnumber;
        $userupdate->floor=$request->floor;
        $userupdate->room_type=$request->role;
        $userupdate->amount=$request->amountpaid;
        $userupdate->save();
        $notification = array(
            'message' => 'room updated Successfully.', 
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function vacant()
    {
        $vacantrms = DB::table('rooms')
                            ->join('users','users.room_id','=','rooms.id')
                            ->select(
                                'rooms.room_no',
                                'rooms.floor',
                                'rooms.room_type',
                                'rooms.amount')
                            ->where('users.room_status',NULL)
                            ->get();
        return view('admin.vacant')->with('vrms',$vacantrms);
    }
    public function occupied()
    {
        $oc=DB::table('users')
                    ->where('room_status',"booked")
                    ->get();
        return view('admin.occupied')->with('occupied',$oc);
    }
    public function Deleteroom($id)
    {
        $deleteuser=Room::find($id)->delete();
        $notification = array(
            'message' => 'room deleted Successfully.', 
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function viewroom()
    {
        return view('teacher.viewroom');
    }
    public function paynow()
    {
        if(\Auth::check()){
        $userid = (Auth()->user()->id);
        $roomtopay = DB::table('users')
                            ->join('rooms','rooms.id', '=','users.room_id')
                            ->select(
                                'rooms.amount',
                                'rooms.id as roomid',
                                'users.phoneNumber',
                                'users.room',
                                'users.id'
                                    )
                            ->where('users.id',$userid)
                            ->get();
        return view('teacher.paynow')->with('userm',$roomtopay);
                }
    else{
        return redirect('login');
    }

    }
    public function payhistory()
    {
        if(\Auth::check()){
        $userid = (Auth()->user()->id);
        $total = DB::table('payments')
                        ->where('user_id',$userid)
                        ->get()
                        ->sum('amount_paid');
        $paidroom = DB::table('users')
                        ->join('payments','payments.user_id', '=', 'users.id')
                        ->join('rooms','rooms.id','=','users.room_id')
                        ->select(
                                'users.firstName',
                                'users.lastName',
                                'users.room',
                                'rooms.amount',
                                'rooms.room_no',
                                'payments.amount_paid',
                                'payments.created_at'
                                )
                        ->where('users.id',$userid)
                        ->get();
        return view('teacher.payhistory')->with(['pay'=>$paidroom])
                                         ->with(['ttl'=>$total]);
                        }
    else{
        return redirect('login');
    }
    }
    public function reportroom()
    {
        if(\Auth::check()){
        $userid = (Auth()->user()->id);
        $roomno = DB::table('users')
                        ->where('id',$userid)
                        ->get();
                        foreach($roomno as $rmno)
                            $roomnumber = $rmno->room;
        return view('teacher.reportroom')->with('rumnumber',$roomnumber);
                    }
    else{
        return redirect('login');
    }
    }
    public function report_room(Request $request)
    {
        $addr = new Report;
        $addr->subject = $request->subject;
        $addr->room_no = $request->roomno;
        $addr->message = $request->message;
        $addr->save();
        $notification = array(
            'message' => 'Complain filed Successfully.', 
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function pay_ments(Request $request)
    {
        $amt = $request->amountpay;
        if($amt <= 0)
        {
          $notification = array(
            'message' => 'Payments must be more than zero.', 
            'alert-type' => 'success'
        );  
        }
        else{
        $pay = new Payment;
        $pay->user_id = $request->userid;
        $pay->room_id = $request->roomid;
        $pay->phone_number = $request->pnumber;
        $pay->amount_paid = $request->amountpay;
        $pay->pay_status = "paid";
        $pay->save();
        $notification = array(
            'message' => 'Payments done Successfully! Thank you.', 
            'alert-type' => 'success'
        );
        }
        return Redirect()->back()->with($notification);

    }
    public function tenantinvoice()
    {
        /*$orders = (Auth()->user()->id);
        $data = [
            'orders' => $orders,
        ];
        $pdf = PDF::loadView('teacher.tenant-invoice',$data);
        return $pdf->download('osoro.pdf');*/
        return view('teacher.tenant-invoice');
    }
    public function dinvoice()
    {
        $orders = (Auth()->user()->id);
        $data = [
            'orders' => $orders,
        ];
        $pdf = PDF::loadView('teacher.tenant-invoice',$data);
        return $pdf->download('monthly-invoice.pdf');
        //return view('teacher.dinvoice');
    }
}
