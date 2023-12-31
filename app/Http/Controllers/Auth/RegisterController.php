<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EducationalLevel;
use App\Models\Student;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Coupon;
use App\Rules\CouponValidation;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Exception;
use Throwable;
use function PHPUnit\Framework\exactly;

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
     * Write code on Method
     *
     * @return response()
     */
    public function showRegistrationForm()
    {
        $educational_levels = EducationalLevel::all();
        return view('Auth/register')->with('educationalLevels',$educational_levels);
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
            'coupon' => ['required', 'string', 'min:8', new CouponValidation],
            'mobile'=>['required','string', 'max:11' ,'min:11'],
            'address'=>['required','string', 'max:50' ,'min:5'],
            'educational_level_id'=>['required']
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $code = $data['coupon'];
        $coupon = Coupon::where("code","=","$code")->first();
        $coupon->activated =true;
        $coupon->save();
      $user =   User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
      $user->save();
        try {

            $student = Student::create([
                'educational_level_id' => $data['educational_level_id'],
                'coupon_id' => $coupon->id,
                'user_id' => $user->id,
                'address' => $data['address'],
                'mobile' => $data['mobile'],
            ]);
            $student->save();
        }
        catch (Throwable $e)
        {
            $coupon->activated =false;
            $coupon->save();
            $user->delete();
        }



     return $user;
    }
}
