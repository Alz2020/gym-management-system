<?PHP
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Mail\OtpMail;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('auth.login');
    }
    // Handle Login with MFA
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            // Generate a 6-digit OTP
            $otp = rand(100000, 999999);
            // Store OTP in session for verification
            Session::put('mfa_otp', $otp);
            Session::put('auth_user_id', $user->id);
            // Send OTP via email
            Mail::to($user->email)->send(new OtpMail($otp));
            // Redirect to OTP verification page
            return redirect()->route('verify.otp');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    // Show OTP Verification Page
    public function showOtpForm()
    {
        return view('auth.verify-otp');
    }

    // Handle OTP Verification
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric'
        ]);

        $otp = Session::get('mfa_otp');
        $userId = Session::get('auth_user_id');

        if ($request->otp == $otp && $userId) {
            Auth::loginUsingId($userId);
            Session::forget(['mfa_otp', 'auth_user_id']); // Clear OTP session
            return redirect()->route('user.dashboard')->with('success', 'MFA successful!');
        }

        return back()->withErrors(['otp' => 'Invalid OTP']);
    }

    // Show Register Form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle Registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Registration successful');
    }

    // Handle Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


}
