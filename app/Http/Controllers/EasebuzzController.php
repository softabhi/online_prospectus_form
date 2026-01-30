<?php

namespace App\Http\Controllers;

use App\Http\Easebuzz\Easebuzz;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EasebuzzController extends Controller
{
    public function store(Request $request)
    {
        if (!empty($_POST) && (sizeof($_POST) > 0)) {
            // second way
            $apiname = 'initiate_payment';

            // Local

            $MERCHANT_KEY = "2MF9IMI3W";
            $SALT = "RRHY8YSMA";
            $ENV = "test";



            // $MERCHANT_KEY = "C2OO0D024Y";
            // $SALT = "RVWJJPV6AO";
            // $ENV = "prod"; 

            $easebuzzObj = new Easebuzz($MERCHANT_KEY, $SALT, $ENV);

            if ($apiname === "initiate_payment") {

                // getting the all data from the session
                $amount = session('prospectus_money') . '.0';

                $txn_id = session('txn_id');
                $student_prospectus_id = session('student_id');
                $email = session('email');
                $phone = session('phone');
                $name = session('name');
                $url = route('response');

                // Echo the amount here
                echo 'Amount: ' . $amount;  // This will print the amount value
                $student_data = DB::table('tbl_prospectus')->find($student_prospectus_id);
                $course_name = DB::table('tbl_course')->where('course_id', $student_data->prospectus_course_name)->first();
                // $session_name = DB::table('tbl_university_details')->where('academic_session',$student_data->prospectus_session)->first();
                // dd($session_name);


                // $course_name = $_SESSION["course_name"];
                $course_name_modified = str_replace(
                    ['(', '&'],   // Characters to replace
                    ['-', '-'],   // Replacement values for '(' and '&'
                    str_replace(')', '', $course_name->course_name) // Remove ')'
                );


                $postData = array(
                    "txnid" => "$txn_id",
                    "amount" => "$amount",
                    "firstname" => "$name",
                    "email" => "$email",
                    "phone" => "$phone",
                    "productinfo" => "NA",
                    "surl" => "$url",
                    "furl" => "$url",
                    "udf1" => "$student_prospectus_id",
                    "udf2" => "NA",
                    "udf3" => "NA",
                    "udf4" => "$course_name_modified",
                    "udf5" => "$student_data->prospectus_session",
                    "udf6" => "Prospectus",
                    "address1" => "NA",
                    "address2" => "NA",
                    "city" => "NA",
                    "state" => "NA",
                    "country" => "NA",
                    "zipcode" => "123123"
                );

                $result = $easebuzzObj->initiatePaymentAPI($postData);

                print_r($result);
            } else if ($apiname === "transaction") {
                $result = $easebuzzObj->transactionAPI($_POST);

                print_r($result);
            } else if ($apiname === "transaction_date" || $apiname === "transaction_date_api") {
                $result = $easebuzzObj->transactionDateAPI($_POST);

                print_r($result);
            } else if ($apiname === "refund") {
                $result = $easebuzzObj->refundAPI($_POST);

                print_r($result);
            } else if ($apiname === "payout") {
                $result = $easebuzzObj->payoutAPI($_POST);

                print_r($result);
            } else {

                echo '<h1>You called wrong API, Please try again</h1>';
            }
        } else {
            echo '<h1>Please fill all mandatory fields.</h1>';
        }
    }




    public function response2(Request $request)
    {

        // salt for testing env
        // $SALT = "RVWJJPV6AO";
        $SALT = "RRHY8YSMA";
        $easebuzzObj = new Easebuzz($MERCHANT_KEY = null, $SALT, $ENV = null);

        $result = $easebuzzObj->easebuzzResponse($_POST);
        $result = json_decode($result);
        $prospectus_student_id = $result->data->udf1;
        $email = $result->data->email;
        session(['student_id' => $prospectus_student_id, 'email' => $email]);

        if ($result->data->status == "success") {
            $net_debited_amount = $result->data->net_amount_debit;
            $easepayid = $result->data->easepayid;
            $txnid = $result->data->txnid;
            $mode = $result->data->mode;
            $bank_name = $result->data->bank_name;
            $addedon = $result->data->addedon;
            $status = md5('visible');

            // Generate a random prospectus number starting with "O"
            $prospectus_number = 'O' . rand(100000, 999999);

            // Update payment details along with the generated prospectus number
            $payment_success = DB::table('tbl_prospectus')->where('id', $prospectus_student_id)->update([
                'transaction_id' => $txnid,
                'easebuzz_id' => $easepayid,
                'bank_name' => $bank_name,
                'transaction_date' => $addedon,
                'post_at' => date('Y-m-d H:i:s'),
                'type' => $mode,
                'status' => $status,
                'prospectus_rate' => $net_debited_amount,
                'transaction_no' => $txnid,
                'prospectus_no' => $prospectus_number, // Updating the new prospectus number
            ]);

            //$student_data = DB::table('tbl_prospectus')->find($prospectus_student_id);

            $student_data = DB::table('tbl_prospectus')->find($prospectus_student_id);
            $student_name = $student_data->prospectus_applicant_name;
            $student_phone = $student_data->mobile;
            $student_prospectus = $student_data->prospectus_no;
            $admission_link = "bit.ly/4iZk3uB";

            try {
                DB::table('tbl_income')->insert([
                    'reg_no' => $prospectus_number, // Using the generated prospectus number
                    'course' => $student_data->prospectus_course_name,
                    'academic_year' => $student_data->prospectus_session,
                    'received_date' => $addedon,
                    'particulars' => 'Prospectus',
                    'amount' => $net_debited_amount,
                    'payment_mode' => $mode,
                    'check_no' => 'NA',
                    'bank_name' => $bank_name,
                    'income_from' => 'Prospectus',
                    'post_at' => date('Y-m-d H:i:s'),
                    'table_name' => 'tbl_prospectus',
                    'table_id' => $prospectus_student_id,
                ]);
            } catch (Exception $e) {
                Log::error('Error inserting income record: ' . $e->getMessage());
            }

            if ($payment_success) {

                try {
                    // $sms_message = "Dear $student_name,
                    // Thank you for your purchase. Your Prospectus No. is $student_prospectus. Please proceed for admission enquiry through the link $admission_link. 
                    // Regards,
                    // Netaji Subhas University,
                    // Jamshedpur.";

                    // // **MsgClub SMS API**
                    // $sms_api_url = "https://msg.msgclub.net/rest/services/sendSMS/sendGroupSms";
                    // $sms_api_key = "6a4743a8355fb97aa42dc2452185a1cd";
                    // $sender_id = "NSUJSR"; // Set your approved sender ID
                    // $route_id = "1"; // Promotional (Use "4" for transactional)



                    $sms_message = "Dear $student_name, Thank you for your purchase. Your Prospectus No. is $student_prospectus. Please proceed for admission enquiry through the link $admission_link. Regards, Sona Devi University, Ghatshila.";

                    $sms_api_url = "https://msg.msgclub.net/rest/services/sendSMS/sendGroupSms";
                    $sms_api_key = "e483e899e620eef37de9aab6613393";
                    $sender_id = "SDUGTS"; // Set your approved sender ID
                    $route_id = "1"; // Promotional (Use "4" for transactional)

                    // Send SMS using MsgClub API
                    $response = Http::get($sms_api_url, [
                        'AUTH_KEY' => $sms_api_key,
                        'message' => $sms_message,
                        'senderId' => $sender_id,
                        'routeId' => $route_id,
                        'mobileNos' => $student_phone,
                        'smsContentType' => 'english'
                    ]);

                    // Log response
                    Log::info('SMS Response: ' . $response);
                } catch (Exception $e) {
                    Log::error('SMS sending failed: ' . $e->getMessage());
                }

                return redirect()->route('print');
            }
        } else {
            return redirect()->route('print');
        }
    }

    public function print_form()
    {
        $data = DB::table('tbl_prospectus')->find(session('student_id'));
        // $data = DB::table('tbl_prospectus')->find(1);

        Mail::to(session('email'))->send(new \App\Mail\PropectusEmail());
        return view('print', ['data' => $data]);
    }
}
