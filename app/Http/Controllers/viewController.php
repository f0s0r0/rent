<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\User;
use App\Room;
use DB;
use Auth;
class viewController extends Controller
{
    public function admin()
    {
        $totaltenant = User::where('userType', '=', 'tenant')
                                    -> count();
        $totalrooms = Room::count();
        $totalbooked = User::where('room_status', '=', 'booked')
                                    ->count();
        return view('admin.admin')
                                ->with(['totalt'=>$totaltenant])
                                ->with(['totalr'=>$totalrooms])
                                ->with(['totalb'=>$totalbooked]);
    }
    public function viewprofile()
    {
        $teacherid = (Auth()->user()->id);
        $ts=DB::table('users')
                        ->where('id',$teacherid)
                        ->get();

        return view('admin.profile')->with('userdata',$ts);
        
    }

    public function student()
    {
        return view('teacher.student');
    }
    public function adduser()
    {
        $rm=DB::table('users')
                        ->join('rooms','rooms.id','=', 'users.room_id')
                        ->select('rooms.room_no')
                        ->where('users.room_status','not')
                        ->where('users.user_status','inactive')
                        ->get();
        return view('admin.adduser')->with('rmno',$rm);
    }

    public function allusers()
    {
        $allus=DB::table('users')
                        ->orderBy('id','ASC')
                        ->get();
        return view('admin.alltenants')->with('userdata',$allus);
    }

    public function allteachers()
    {
        $allus=DB::table('users')
                        ->where('userType',"teacher")
                        ->get();
        return view('admin.allteachers')->with('userdata',$allus);
    }

    public function addstudent()
    {
        return view('admin.addstudent');
    }

    public function allf1student()
    {
        return view('admin.allf1student');
    }

    public function allf2student()
    {
        return view('admin.allf2student');
    }

    public function allf3student()
    {
        return view('admin.allf3student');
    }

    public function allf4student()
    {
        return view('admin.allf4student');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }


    public function new_user(Request $request)
    {
       $rmno = $request->input('roomno');
         $allrooms = DB::table('rooms')
                        ->where('room_no',$rmno)
                        ->get(['id']); 
                        foreach($allrooms as $new)
                         $new1 = $new->id;   
       
        $adduser=new User;
        $adduser->room_id=$new1;
        $adduser->firstName=$request->fname;
        $adduser->middleName=$request->mname;
        $adduser->lastName=$request->lname;
        $adduser->phoneNumber=$request->pnumber;
        $adduser->idNumber=$request->idnumber;
        $adduser->userType=$request->role;
        $adduser->email=$request->email;
        $adduser->password=bcrypt(request('password'));
        $adduser->room=$request->roomno;
        $adduser->room_status='booked';
        $adduser->user_status='active';
        $adduser->where('room',$rmno);
        $adduser->Save();

        $data = array(
            'fname' =>$request->fname,
            'mname' =>$request->mname,
            'role' =>$request->role,
            'roomno' =>$request->roomno,
            'email' =>$request->email,
            'pnumber' =>$request->pnumber,
            'password' =>$request->password
        );
        Mail::to($data['email'])->send(new SendMail($data));
    
        $notification = array(
            'message' => 'User Added Successfully.', 
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);


    }
    public function adminf1exams()
    {
        return view('admin.adminf1exams');
    }
    public function adminf2exams()
    {
        return view('admin.adminf2exams');
    }
    public function adminf3exams()
    {
        return view('admin.adminf3exams');
    }
    public function adminf4exams()
    {
        return view('admin.adminf4exams');
    }

    public function adminf1asign()
    {
        return view('admin.adminf1asign');
    }
    public function adminf2asign()
    {
        return view('admin.adminf2asign');
    }
    public function adminf3asign()
    {
        return view('admin.adminf3asign');
    }
    public function adminf4asign()
    {
        return view('admin.adminf4asign');
    }
    
    public function updateuser($id)
    {
        $userupdate=DB::table('users')->where('id',$id)->first();
        return view('admin.update-user')->with('u_user',$userupdate);
    }
    public function updateduser(Request $request, $id)
    {
        $userupdate=User::find($id);
        $userupdate->firstName=$request->fname;
        $userupdate->middleName=$request->mname;
        $userupdate->lastName=$request->lname;
        $userupdate->phoneNumber=$request->pnumber;
        $userupdate->idNumber=$request->idnumber;
        $userupdate->userType=$request->role;
        $userupdate->email=$request->email;
        $userupdate->password=bcrypt(request('password'));
        $userupdate->user_status=$request->status;          
        $userupdate->save();
        $notification = array(
            'message' => 'user updated Successfully.', 
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function Deleteuser($id)
    {
        $deleteuser=User::find($id);//->delete();
        $deleteuser->room_status = 'not';
        $deleteuser->user_status = 'inactive';
        $deleteuser->save();
        $notification = array(
            'message' => 'Tenant Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function updateadmin(Request $request, $id)
    {
       
        $userupdate=User::find($id);
        $userupdate->firstName=$request->fname;
        $userupdate->middleName=$request->mname;
        $userupdate->lastName=$request->lname;
        $userupdate->phoneNumber=$request->pnumber;
        $userupdate->idNumber=$request->idnumber;
        $userupdate->email=$request->email;
        $userupdate->password=bcrypt(request('password'));   
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $originalname=$file->getClientOriginalName();
            $filename=$originalname;
            $file->move('public/uploads/profiles/',$filename);
            $userupdate->profile_photo=$filename;
        }else{
            return $request;
            $userupdate->profile_photo='';
        }     
        $userupdate->save();
        $notification = array(
            'message' => 'Profile Changed Successfully.', 
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

}
