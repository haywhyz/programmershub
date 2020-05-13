<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Language;
use App\Specialization;
use App\Language_User;
use App\Specialization_User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            // 'name' => ['required', 'string', 'max:255'],
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
    {
        // $user =  User::create([
        //     'firstname'=> $data['firstname'],
        //     'lastname'=> $data['lastname'],
        //     'gender'=> $data['gender'],
        //     'email'=> $data['email'],
        //     'occupation'=> $data['occupation'],
        //     'institution'=> $data['institution'],
        //     'username'=> $data['username'],
        //     'password'=> Hash::make($data['password']),
        // ]);

        // foreach($language as $languages){
        //      $language::create(['user_id'=>$user->id, 'language_id'=>$languages->])
        // }
        // specialization

    }

    public function register(Request $request, Language_User $language_user, Specialization_User $specialization_user){

        $user =  User::create([
            'firstname'=> $request['firstname'],
            'lastname'=> $request['lastname'],
            'gender'=> $request['gender'],
            'email'=> $request['email'],
            'occupation'=> $request['occupation'],
            'institution'=> $request['institution'],
            'username'=> $request['username'],
            'password'=> Hash::make($request['password']),
        ]);
        $languages = $request['language'];
        $specializations = $request['specialization'];
        foreach($languages as $lang){
            $language_user::create(['user_id'=>$user->id, 'language_id'=>$lang]);
        }
        foreach($specializations as $specialization){
            $specialization_user::create(['user_id'=>$user->id, 'specialization_id'=>$specialization]);
        }
        return redirect('/register')->with('success', 'Registration Successful');
    }

    public function showRegistrationForm()
    {
        $language = Language::get();
        $specialization = Specialization::get();
        return view('auth.register')
        ->with('languages', $language)
        ->with('specializations', $specialization);
    }
}
