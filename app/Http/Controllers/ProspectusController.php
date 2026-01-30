<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProspectusController extends Controller
{

    // initialization  of the page
    public function index()
    {
        $visible=md5('visible');
        $course = DB::table('tbl_course')->where('online_status',1)->where('status',$visible)->get();
        //session(['amount' => $course[0]->prospectus_rate]);
        return view('index', ['data' => $course]);
    }

    // storing the data of the user 
    public function store(Request $request)
    {
        echo $request->prospectus_otp;
        if ($request->prospectus_otp == session('otp')) {
            try {
                $data = $request->except(['_token', 'prospectus_otp']);
                $data['prospectus_program_type'] = $request->prospectus_program_type;
                $prospectus = DB::table('tbl_prospectus')->insertGetId($data);
                session(['student_id' => $prospectus]);
                return redirect()->route('prospectus.confirmation');
            } catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('error', 'Please Enter Correct otp');
        }
    }
    

    // for showing the course it's call throw the ajax
    public function course($id)
    {
        $visible = md5('visible');
        $course = DB::table('tbl_course')
                    ->where('course_id', $id)
                    ->where('online_status', 1)
                    ->where('status', $visible)
                    ->first(); 
    
        // Check if course data exists
        if ($course) {
            // Store the prospectus_rate in session
            session(['prospectus_money' => $course->prospectus_rate]);
    
            // Return the required data in a JSON format
            return response()->json([
                'prospectus_rate' => $course->prospectus_rate,
                'program_type' => $course->program_type,
                'duration' => $course->duration
            ]);
        } else {
            return response()->json(['error' => 'Course not found'], 404);
        }
    }
    

    public function confirmation()
    {
        
        // set  the student data into the session
        $student = DB::table('tbl_prospectus')->find(session('student_id'));
        session(['name' => $student->prospectus_applicant_name, 'email' => $student->prospectus_emailid, 'phone' => $student->mobile, 'txn_id' => rand(10000000000, 99999999999)]);
        return view('confirmation', ['data' => $student, 'txn_id' => session('txn_id')]);
    }

    public function send_otp($mobile_number)
    {
        $otp = rand(100000, 999999);
        session(['otp' => $otp, 'phone' => $mobile_number]);
        $mobileNumber = $mobile_number;
        $message = "Your OTP is " . $otp . ". Please do not share this OTP to anyone. Regards, Sona Devi University, Ghatsila";
      
        $senderId = "SDUGTS";
        $serverUrl = "msg.msgclub.net";
        $authKey = "e483e899e620eef37de9aab6613393";
    
        $routeId = "1";
        $route = "default";
        $getData = 'mobileNos=' . $mobileNumber . '&message=' . urlencode($message) . '&senderId=' . $senderId . '&routeId=' . $routeId;
        //API URL			
        $url = "http://" . $serverUrl . "/rest/services/sendSMS/sendGroupSms?AUTH_KEY=" . $authKey . "&" . $getData;
        // init the resource			
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0
        ));
        //get response			
        $output = curl_exec($ch);
        //Print error if any		
        if (curl_errno($ch)) {
            echo 'error:' . curl_error($ch);
        }
        curl_close($ch);
        // sending the email otp into the email
        // Mail::to($email)->send(new \App\Mail\mymail());
        return $output;
    }

    function already()
    {
        return view('already_prospectus');
    }
    function prospectus_check($prospectus_number)
    {
        dd($prospectus_number);
    }
}
