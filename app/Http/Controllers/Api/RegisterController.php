<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\ComplateInvoiceCount;
use App\Models\PaymentGetway;

class RegisterController extends BaseController
{
    public function register(Request $request)
    {
        $validation =  Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validation->fails()) {
            return $this->sendError('validation Error', $validation->errors());
        }

        $random = Str::random(40);

        $password = bcrypt($request->password);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $password,
            'remember_token' => $random,
        ]);

        $success['token'] = $user->createToken('RestApi')->plainTextToken;
        $success['name'] = $user->name;


        if ($user->email) {
            $domain = URL::to('/');
            $url = $domain .'/verify-mail/'.$user->id .'/'. $random;

            $data['url'] =  $url;
            $data['email'] = $user->email;
            $data['title'] = "Email verification";
            $data['body'] = "Please click the link below to verify your mail. $random";

            Mail::send('api_mail.varify-email', $data,  function ($message) use ($data) {
                $message->to($data['email'])->subject($data['body']);
            });

            $get_id = $user->id;

            PaymentGetway::create([
                'user_id' => $get_id,
                'amount' => '0',
                'subscription_package_id' => '1',
                'organization_package_id' => '0',
                'created_at' => Carbon::now()
            ]);
            ComplateInvoiceCount::create([
                'user_id' => $get_id,
                'invoice_count_total' => '0',
                'current_invoice_total' => '0',
                'created_at' => Carbon::now()
            ]);

            return $this->sendResponse($success, 'User register success and mail send');
        } else {
            return $this->sendError('Unthorize', ['error' => 'User Not Register']);
        }
    }

    public function verify_email($id, $hash)
    {
        $user = User::where('id', $id)->where('remember_token', $hash)->update(
            [
                'email_verified_at' => Carbon::now(),
                'remember_token' => Null
            ]
        );

        if ($user) {
            return $this->sendResponse('Verifyed', 'Email Successfuly Verified.');
        } else {
            return $this->sendError('Unthorize', ['error' => 'Email Allready Verified ']);
        }
    }

    public function login(Request $request)
    {

        $validation =  Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        if ($validation->fails()) {
            return $this->sendError('validation Error', $validation->errors());
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();
            $success['token'] = $user->createToken('RestApi')->plainTextToken;
            $success['name'] = $user->name;

            return $this->sendResponse($success, 'User Successfuly login.');
        } else {
            return $this->sendError('Unthorize', ['error' => 'Email Or Password Does not match ?']);
        }
    }
}
