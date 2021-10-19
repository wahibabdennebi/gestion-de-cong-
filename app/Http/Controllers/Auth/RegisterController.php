<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use \Datetime;

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

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   //dd($data);
        if ($data['image']) {
            $file = $data['image'];
            $filename = $file->getClientOriginalName();
            date_default_timezone_set('Africa/Tunis');
           // $date = date('m/d/Y h:i:s a', time());
            $date=time();
            $hash2 = md5($filename.$date);
            //dd($hash2);
            $hash = md5($filename).'_'.$date;
            $destination = 'upload/images/';
            $ext= $file->getClientOriginalExtension();
            $mainFilename = $hash2.'.' .$ext ;
            //dd($mainFilename);
            $file->move($destination,$mainFilename);
            
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birthday' => $data['birthday'],
            'role' => 'user',
            'product' => $data['product'],
            'team' => $data['team'],
            'phone' => $data['phone'],
            'equipe_id' => '1',
            'image'=>$mainFilename,
        ]);
    }
}
