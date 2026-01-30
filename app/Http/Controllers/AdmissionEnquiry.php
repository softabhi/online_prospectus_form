<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProspectusController;

class AdmissionEnquiry extends Controller
{
    function otp_generating(Request $request)
    {
        $prospectus =  DB::table('tbl_prospectus')->where(['prospectus_no' => $request->prospectus_number, 'mobile' => $request->phone_number])->exists();
        if ($prospectus) {
            session(['prospectus_no' => $request->prospectus_number, 'mobile' => $request->phone_number]);
            $prospectus_otp = new ProspectusController();
            $prospectus_otp->send_otp($request->phone_number);
            return view('admission_opt_verify')->with('success', 'Otp sended' . $request->phone_number);;
        } else {
            return  redirect()->route('prospectus.already')->with('error', 'Prospectus and phone number not match with our records');
        }
    }
    public function otp_verify(Request $request)
    {
        $course = DB::table('tbl_course')->get();
        if ($request->otp == session('otp')) {
            $prospectus_details = DB::table('tbl_prospectus')->where(['prospectus_no' => session('prospectus_no'), 'mobile' => session('mobile')])->get();

            return view('admission_form', ['courses' => $course, 'data' => $prospectus_details[0]]);
        } else {
            return view('admission_opt_verify', ['otp_error' => 'Please Enter a valid otp']);
        }
    }
    function session_get($course_id)
    {
        $course = DB::table('tbl_course')->where('course_id', $course_id)->get();

        $sessions = DB::table('tbl_university_details')->orderBy('university_details_id', 'DESC')->get();
        foreach ($sessions as  $session) {
            $start_year = explode('-', $session->university_details_academic_start_date)[0];
            $end_year = explode('-', $session->university_details_academic_end_date)[0];
            $total_year = $end_year - $start_year;
            if ($total_year == $course[0]->duration) {
                echo ' <option value="' . $session->university_details_id . '">' . $start_year . '-' . $end_year . '</option>';
            }
        }
    }




  function admission_form(Request $request)
{
    // Path inside the public directory (auto resolves to /public/images/student_images)
    // $destinationPath = public_path('/public_html/cms/images/student_images/');
    $destinationPath = public_path('../../cms/images/student_images/');
    //  $destinationPath = public_path('https://cms.sonadeviuniversity.ac.in/images/student_images/');
    //  $destinationPath = public_path('https://srv1830-files.hstgr.io/52ccb05668e14708/files/public_html/cms/images/student_images/');

    // Ensure folder exists (optional safety net on shared hosting)
    // if (!file_exists($destinationPath)) {
    //     mkdir($destinationPath, 0755, true);
    // }

    // Define unique user identity
    $identifier = [
        'admission_form_no' => session('prospectus_no'),
        'admission_mobile_student' => session('mobile'),
    ];

    // Save data (excluding token and image)
    DB::table('tbl_admission')->updateOrInsert($identifier, $request->except('_token', 'admission_profile_image'));

    // Get the admission_id after insert/update
    $admission_id = DB::table('tbl_admission')->where($identifier)->value('admission_id');

    // dd( $admission_id);

    // Handle profile image upload
    if ($request->hasFile('admission_profile_image')) {
        $existing_image = DB::table('tbl_admission')
            ->where('admission_id', $admission_id)
            ->value('admission_profile_image');

        if (!$existing_image) {
            $file = $request->file('admission_profile_image');
            $filename = 'admission_profile_image_' . date('YmdHis') . '.' . $file->getClientOriginalExtension();

            // Move file to public/images/student_images
            $file->move($destinationPath, $filename);

            // Update DB with image name
            DB::table('tbl_admission')
                ->where('admission_id', $admission_id)
                ->update(['admission_profile_image' => $filename]);
        }
    }

    return view('admission_document', ['id' => $admission_id]);
}



            

    // function admission_form(Request $request)
    // {
    //  $destinationPath = public_path('../../cms/images/student_images/');
    //     // $destinationPath = 'https://srv1830-files.hstgr.io/52ccb05668e14708/files/public_html/cms/images/student_images/';
    //     // $destinationPath = 'public_html/cms/images/student_images/';
    //     // $destinationPath = public_path('https://srv1830-files.hstgr.io/52ccb05668e14708/files/public_html/cms/images/student_images/');
    //     // $destinationPath = public_path('https://srv1830-files.hstgr.io/52ccb05668e14708/files/public_html/cms/images/student_images/');
  
    //     $admission_id = DB::table('tbl_admission')->updateOrInsert(['admission_form_no' => session('prospectus_no'), 'admission_mobile_student' => session('mobile')], $request->except('_token','admission_profile_image'));
    //     if ($request->file('admission_profile_image')) {
    //         $about_image = DB::table('tbl_admission')->where('admission_id', $admission_id)->pluck('admission_profile_image')->first();
    //         if ($about_image == null) {
    //             $about_image = 'admission_profile_image' . date('Ymdhms') . '.' . $request->file('admission_profile_image')->getClientOriginalExtension();
    //             DB::table('tbl_admission')->where('admission_id', $admission_id)->update(['admission_profile_image' => $about_image]);
    //         }
    //         $image = $request->file('admission_profile_image');
    //         $image->move($destinationPath, $about_image);
    //     }
    //     return view('admission_document', ['id' => $admission_id]);
    // }






    public function admission_document(Request $request)
    {
        // $destinationPath = 'https://cms.sonadeviuniversity.ac.in/images/student_certificates/';
         $destinationPath = public_path('../../cms/images/student_certificates/');
        $id = $request->id;

        if ($request->file('admission_tenth_marksheet')) {
            $about_image = DB::table('tbl_admission')->where('admission_id', $id)->pluck('admission_tenth_marksheet')->first();
            if ($about_image == null) {
                $about_image = 'admission_tenth_marksheet' . date('Ymdhms') . '.' . $request->file('admission_tenth_marksheet')->getClientOriginalExtension();
                DB::table('tbl_admission')->where('admission_id', $id)->update(['admission_tenth_marksheet' => $about_image]);
            }
            $image = $request->file('admission_tenth_marksheet');
            $image->move($destinationPath, $about_image);
        }

        if ($request->file('admission_tenth_passing_certificate')) {
            $about_image = DB::table('tbl_admission')->where('admission_id', $id)->pluck('admission_tenth_passing_certificate')->first();
            if ($about_image == null) {
                $about_image = 'admission_tenth_passing_certificate' . date('Ymdhms') . '.' . $request->file('admission_tenth_passing_certificate')->getClientOriginalExtension();
                DB::table('tbl_admission')->where('admission_id', $id)->update(['admission_tenth_passing_certificate' => $about_image]);
            }
            $image = $request->file('admission_tenth_passing_certificate');
            $image->move($destinationPath, $about_image);
        }
        if ($request->file('admission_twelve_markesheet')) {
            $about_image = DB::table('tbl_admission')->where('admission_id', $id)->pluck('admission_twelve_markesheet')->first();
            if ($about_image == null) {
                $about_image = 'admission_twelve_markesheet' . date('Ymdhms') . '.' . $request->file('admission_twelve_markesheet')->getClientOriginalExtension();
                DB::table('tbl_admission')->where('admission_id', $id)->update(['admission_twelve_markesheet' => $about_image]);
            }
            $image = $request->file('admission_twelve_markesheet');
            $image->move($destinationPath, $about_image);
        }
        if ($request->file('admission_twelve_passing_certificate')) {
            $about_image = DB::table('tbl_admission')->where('admission_id', $id)->pluck('admission_twelve_passing_certificate')->first();
            if ($about_image == null) {
                $about_image = 'admission_twelve_passing_certificate' . date('Ymdhms') . '.' . $request->file('admission_twelve_passing_certificate')->getClientOriginalExtension();
                DB::table('tbl_admission')->where('admission_id', $id)->update(['admission_twelve_passing_certificate' => $about_image]);
            }
            $image = $request->file('admission_twelve_passing_certificate');
            $image->move($destinationPath, $about_image);
        }
        if ($request->file('admission_graduation_marksheet')) {
            $about_image = DB::table('tbl_admission')->where('admission_id', $id)->pluck('admission_graduation_marksheet')->first();
            if ($about_image == null) {
                $about_image = 'admission_graduation_marksheet' . date('Ymdhms') . '.' . $request->file('admission_graduation_marksheet')->getClientOriginalExtension();
                DB::table('tbl_admission')->where('admission_id', $id)->update(['admission_graduation_marksheet' => $about_image]);
            }
            $image = $request->file('admission_graduation_marksheet');
            $image->move($destinationPath, $about_image);
        }
        if ($request->file('admission_recent_character_certificate')) {
            $about_image = DB::table('tbl_admission')->where('admission_id', $id)->pluck('admission_recent_character_certificate')->first();
            if ($about_image == null) {
                $about_image = 'admission_recent_character_certificate' . date('Ymdhms') . '.' . $request->file('admission_recent_character_certificate')->getClientOriginalExtension();
                DB::table('tbl_admission')->where('admission_id', $id)->update(['admission_recent_character_certificate' => $about_image]);
            }
            $image = $request->file('admission_recent_character_certificate');
            $image->move($destinationPath, $about_image);
        }
        if ($request->file('admission_other_certificate')) {
            $about_image = DB::table('tbl_admission')->where('admission_id', $id)->pluck('admission_other_certificate')->first();
            if ($about_image == null) {
                $about_image = 'admission_other_certificate' . date('Ymdhms') . '.' . $request->file('admission_other_certificate')->getClientOriginalExtension();
                DB::table('tbl_admission')->where('admission_id', $id)->update(['admission_other_certificate' => $about_image]);
            }
            $image = $request->file('admission_other_certificate');
            $image->move($destinationPath, $about_image);
        }
        if ($request->file('admission_character_certificate')) {
            $about_image = DB::table('tbl_admission')->where('admission_id', $id)->pluck('admission_character_certificate')->first();
            if ($about_image == null) {
                $about_image = 'admission_character_certificate' . date('Ymdhms') . '.' . $request->file('admission_character_certificate')->getClientOriginalExtension();
                DB::table('tbl_admission')->where('admission_id', $id)->update(['admission_character_certificate' => $about_image]);
            }
            $image = $request->file('admission_character_certificate');
            $image->move($destinationPath, $about_image);
        }
        return redirect()->route('admission.thankyou');
    }

    public function thankyou()
    {
        return view('thankyou');
    }
}
// added something comment