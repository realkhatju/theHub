<?php

namespace App\Http\Controllers\Web;

use Auth;
use Illuminate\Support\Facades\Session;

use App\User;
use App\Expense;
use App\Voucher;
use App\MenuItem;
use App\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    protected function index(Request $request) {

        if (Session::has('user')) {
            if($request->session()->get('user')->role_flag == 1){
                // dd($request->session()->get('user')->role_flag);
                return view('dashboard');
            }
            elseif ($request->session()->get('user')->role_flag == 2) {
                return redirect()->route('pending_lists');
            }
            elseif($request->session()->get('user')->role_flag == 3){
                return redirect()->route('pending_lists');
            }
            elseif ($request->session()->get('user')->role_flag == 4) {
                return redirect()->route('pending_lists');
            }
        }
        else{
            // dd('hello');
            return view('login');
        }

	}

    // protected function loginProcess(Request $request){

    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);

    //     if ($validator->fails()) {

    //         alert()->error('Something Wrong! Validation Error!');

    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $user = User::where('email', $request->email)->first();

    //     if (!isset($user)) {

    //         alert()->error('Wrong Email!');

    //         return redirect()->back();
    //     }
    //     elseif (!\Hash::check($request->password, $user->password)) {

    //         alert()->error('Wrong Password!');

    //         return redirect()->back();
    //     }

    //     session()->put('user', $user);

    //     if ($user->role_flag == 1 || $user->role_flag == 5 || $user->role_flag == 6) {

    //         alert()->success("Successfully Login");

    //         $voucher = Voucher::where('status',0)->get();
    //         $purchase = Purchase::all();
    //         $expense = Expense::all();
    //         $total_sale = 0;$today_sale = 0;$total_inventory = 0;$total_expense=0;$total_profit= 0;
    //         $today = date("Y-m-d");
    //         foreach($voucher as $vou){
    //             $total_sale += $vou->total_price;
    //         }
    //         $tod_voucher = Voucher::where('date',$today)->where('status',0)->get();
    //            foreach($tod_voucher as $tod){
    //             $today_sale += $tod->total_price;
    //         }
    //         foreach($purchase as $pur){
    //             $total_inventory += $pur->total_price;
    //         }
    //         foreach($expense as $exp){
    //             $total_expense += $exp->amount;
    //         }
    //         $menu = MenuItem::all()->count();
    //         return view('report',compact('total_sale','today_sale','total_inventory','menu','total_expense'));
    //     }
    //     elseif ($user->role_flag == 2 || $user->role_flag == 3 || $user->role_flag == 4) {
    //         return redirect()->route('pending_lists');

    //     }
    //     // elseif ($user->role_flag == 4) {

    //     //     alert()->success("Successfully Login");

    //     //     return redirect()->route('inven_dashboard');

    //     // }
    //     else{

    //         Session::flush();

    //         return redirect()->route('index');

    //     }

    // }


    protected function loginProcess(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            alert()->error('Something Wrong! Validation Error!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if (!isset($user)) {
            alert()->error('Wrong Email!');
            return redirect()->back();
        }
        elseif (!\Hash::check($request->password, $user->password)) {
            alert()->error('Wrong Password!');
            return redirect()->back();
        }

        // Make a POST request to the API endpoint to verify app accessibility
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->post('http://crmbackend.kwintechnologies.com:3500/api/verify-app-accessibility', [
                'json' => [
                    "deal" => "65cdd64ab9386b6326e6fb6b"
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody(), true);

            // Check if the API call was successful and data is accessible
            if ($statusCode == 200 && isset($responseData['data']['isAccessible']) && $responseData['data']['isAccessible'] === true) {
                // API call was successful and data is accessible, proceed with the login process

                // Store the user in the session
                session()->put('user', $user);

                // Redirect based on user role
                if ($user->role_flag == 1 || $user->role_flag == 5 || $user->role_flag == 6) {
                    // Additional logic for admin users
                    alert()->success("Successfully Login");
                    return redirect()->route('admin_dashboard');
                } elseif ($user->role_flag == 2 || $user->role_flag == 3 || $user->role_flag == 4) {
                    // Additional logic for other roles
                    return redirect()->route('pending_lists');
                } else {
                    // Additional logic for other cases
                    return redirect()->route('index');
                }
            } else {
                // API call was not successful or data is not accessible
                alert()->error('Subscription Expired!');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            // Error occurred while making the API call
            alert()->error('Data is not accessible');
            return redirect()->back();
        }
    }




    protected function logoutProcess(Request $request){

        Session::flush();

        alert()->success("Successfully Logout");

        return redirect()->route('index');

    }

    protected function getChangePasswordPage(){

        return view('change_pw');
    }

    protected function updatePassword(Request $request){

        $validator = Validator::make($request->all(), [
            'current_pw' => 'required',
            'new_pw' => 'required|confirmed|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/'
        ]);

        if ($validator->fails()) {

            alert()->error('Something Wrong!');
            return redirect()->back()->withErrors($validator);

        }

        $user = $request->session()->get('user');

        $current_pw = $request->current_pw;

        if(!\Hash::check($current_pw, $user->password)){

            alert()->info("Wrong Current Password!");

            return redirect()->back();
        }

        $has_new_pw = \Hash::make($request->new_pw);

        $user->password = $has_new_pw;

        $user->save();

        alert()->success('Successfully Changed!');

        return redirect()->route('admin_dashboard');
    }
}
