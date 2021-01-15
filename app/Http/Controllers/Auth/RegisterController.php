<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Http\Controllers\MailController;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    // public function register(Request $request)
    // {
    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $user->verification_code = sha1(time());
    //     $user->save();

    //     // send email
    //     if($user != null){
    //         MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
    //         return redirect()->back()->with(session()->flash('alert-success', 'Your account has been created. Please check email for verification link.'));
    //     }

    //     return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));
    //     // send message
    // }

    // public function verifyUser(Request $request){
    //     $verification_code = \Illuminate\Support\Facades\Request::get('code');
    //     $user = User::where(['verification_code' => $verification_code])->first();
    //     if($user != null){
    //         $user->is_verified = 1;
    //         $user->save();
    //         return redirect()->route('login')->with(session()->flash('alert-success', 'Your account is verified. Please login!'));
    //     }

    //     return redirect()->route('login')->with(session()->flash('alert-danger', 'Invalid verification code!'));
    // }

}
