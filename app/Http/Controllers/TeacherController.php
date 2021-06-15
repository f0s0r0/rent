<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Exam;
use App\Assignment;
use App\Enroll;
use DB;
use Auth;
use Carbon\Carbon;
class TeacherController extends Controller
{
    public function teacher()
    {
        if(\Auth::check()){
        $teacherid = (Auth()->user()->id);
        $stayed = DB::table('users')
                            ->where('id',$teacherid)
                            ->get();
                            foreach($stayed as $stay)
                                $joindate = $stay->created_at;
                            $to = Carbon::createFromFormat('Y-m-d H:s:i', $joindate);
                            $date = Carbon::now();
                            $formatedDate = $date->format('Y-m-d H:i:s');
                            $diff_in_days = $to->diffInMonths($formatedDate); 
     return view('teacher.tenant')->with('sty',$diff_in_days);
      }
    else{
        return redirect('login');
    }
     
    }

    public function examf1(Request $request)
    {
        if(\Auth::check()){
            $teacherid = (Auth()->user()->id);
            $examquery=DB::table('courses')
                            ->where('teacher_id',$teacherid)
                            ->get();
        return view('teacher.exam')->with('ques', $examquery);
         }
    else{
        return redirect('login');
    }
    }

    public function assigno()
    {
        if(\Auth::check()){
            $teacherid = (Auth()->user()->id);
            $assignmentqiery=DB::table('courses')
                            ->where('teacher_id',$teacherid)
                            ->get();
        return view('teacher.assignment')->with('ques', $assignmentqiery);
         }
    else{
        return redirect('login');
    }
    
    }

    public function availablexam(Request $request)
    {
        if(\Auth::check()){
        $teacherid = (Auth()->user()->id);
        $allexams=DB::table('exams')
                        ->where('examteacher_id',$teacherid)
                        ->orderBy('id','DESC')
                        ->get();
        return view('teacher.availablexam')->with('exdata',$allexams);
             }
    else{
        return redirect('login');
    }
    }

    public function availableassign(Request $request)
    {
        if(\Auth::check()){
        $teacherid = (Auth()->user()->id);
        $allassign=DB::table('assignments')
                        ->where('assignteacher_id',$teacherid)
                        ->orderBy('id','DESC')
                        ->get();
        return view('teacher.availableassign')->with('assigndata',$allassign);
             }
    else{
        return redirect('login');
    }
    }

    public function newassigno(Request $request)
    {
        $addassigno = new Assignment;
        $addassigno->assignteacher_id=$request->teacherid;
        $addassigno->assign_title=$request->assigntitle;
        $addassigno->subject=$request->subject;
        $addassigno->form=$request->form;

        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $originalname=$file->getClientOriginalName();
            $filename=$originalname;
            $file->move('public/uploads/assignments/',$filename);
            $addassigno->assign_paper=$filename;
        }else{
            return $request;
            $addassigno->assign_paper='';
        }
        $addassigno->save();
        return Redirect()->back();
    }

    public function newexam(Request $request)
    {
        $addexam = new Exam;
        $addexam->examteacher_id=$request->teacherid;
        $addexam->exam_title=$request->examtitle;
        $addexam->subject=$request->subject;
        $addexam->form=$request->form;

        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $originalname=$file->getClientOriginalName();
            $filename=$originalname;
            $file->move('public/uploads/exams/',$filename);
            $addexam->exam_paper=$filename;
        }else{
            return $request;
            $addexam->exam_paper='';
        }
        $addexam->save();
        return Redirect()->back();
    }

    public function updatexam($id){
        $examupdate=DB::table('exams')->where('id',$id)->first();
        return view('teacher.update-exam')->with('uexam',$examupdate);
    }

    public function updatedexam(Request $request, $id)
    {
        $afterupdate=Exam::find($id);
        $afterupdate->exam_title=$request->examtitle;
        $afterupdate->subject=$request->subject;
        $afterupdate->form=$request->form;

        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $originalname=$file->getClientOriginalName();
            $filename=$originalname;
            $file->move('public/uploads/exams/',$filename);
            $afterupdate->exam_paper=$filename;
        }else{
            return $request;
            $afterupdate->exam_paper='';
        }
        $afterupdate->save();
        return Redirect()->back();
    }

    public function Deletexam($id)
    {
        $deletexam=Exam::find($id)->delete();
        return Redirect()->back();
    }

    public function updateassign($id){
        $assignupdate=DB::table('assignments')->where('id',$id)->first();
        return view('teacher.update-assignment')->with('uassign',$assignupdate);
    }

    public function updatedassign(Request $request, $id)
    {
        $afterupdate=Assignment::find($id);
        $afterupdate->assign_title=$request->assigntitle;
        $afterupdate->subject=$request->subject;
        $afterupdate->form=$request->form;

        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $originalname=$file->getClientOriginalName();
            $filename=$originalname;
            $file->move('public/uploads/assignments/',$filename);
            $afterupdate->assign_paper=$filename;
        }else{
            return $request;
            $afterupdate->assign_paper='';
        }
        $afterupdate->save();
        return Redirect()->back();
    }

    public function Deleteassign($id)
    {
        $deleteassign=Assignment::find($id)->delete();
        return Redirect()->back();
    }

    public function new_course(Request $request)
    {
        $addcourse=new Course;
        $addcourse->teacher_id=$request->teacherid;
        $addcourse->courseName=$request->coursename;
        $addcourse->courseCode=$request->coursecode;
        $addcourse->form=$request->form;
        $addcourse->Save();
        return Redirect()->back();
    }

    public function addcourse()
      {
          return view('teacher.addcourse');
      }

      public function enroll(Request $request)
    {   
        if(\Auth::check()){
        $teacherid = (Auth()->user()->id);
        $ts=DB::table('courses')
                        ->where('teacher_id',$teacherid)
                        ->get();
        $enrollstudent=DB::table('users')
                        ->where('userType','student')
                        ->get();
        return view('teacher.enroll')
                        ->with('rollstudent',$enrollstudent)
                        ->with('tcourses',$ts);
                                }
    else{
        return redirect('login');
    }
    }

    public function studentenroll(Request $request)
    {
        $inputs = $request->all();
        $months = $inputs['student'];
        
        foreach ($months as $mn)
        {
            $teachers = new Enroll(); 
            $teachers->subject=$request->subject;
            $teachers->stuname = $mn;
            $teachers->save();
            return Redirect()->back();
        }
    }
    public function profile(Request $request)
    {
     
        $teacherid = (Auth()->user()->id);
        $ts=DB::table('users')
                        ->where('id',$teacherid)
                        ->get();

        return view('teacher.profile')->with('userdata',$ts);
    }
    public function updateuser(Request $request, $id)
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
        return Redirect()->back();
    }
    
}
