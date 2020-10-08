<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //Send link when forgot password button was clicked
    public function send_link_reset_pass($email)
    {
        try {
            Mail::to($email)->send(new ForgotPassword());

            return json_encode(['status' => true]);
        }
        catch (\Exception $e)
        {
            dd($e->getMessage());
            //return json_encode(['status' => false, $e->getMessage()]);
        }

    }

    //$id = user id
    public function new_password_view($id = null)
    {

    }

    //$id = user id
    public function new_password(Request $request, $id)
    {

    }
}
