<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class UserController extends Controller
{
    public function register()
    {
        return view('admin.login.dangki');
    }
    public function checkregister(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
        ]);

        $notifications = [
            'ok' => 'ok',
        ];
        $notification = [
            'message' => 'error',
        ];
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        try {
            $user->save();
            return redirect()->route('viewlogin');
        } catch (\Exception $e) {
            Log::error("message:".$e->getMessage());
        }

            if ($request->password == $request->confirmpassword) {
                $user->save();
                return redirect()->route('viewlogin')->with($notifications);
            }else{
                return redirect()->route('shop.register')->with($notification);

            }
    }
    public function viewlogin()
    {
        return view('admin.login.login');
    }
  //xử lí đăng nhập
  public function login(Request $request){
    $validated = $request->validate([
        'email' => 'required',
        'password'=>'required|min:6',
    ],
        [
            'email.required'=>'Không được để trống',
            'password.required'=>'Không được để trống',
            'password.min'=>'Lớn hơn :min',
        ]
);

      $credentials = $request->validate([
          'email' => ['required', 'email'],
          'password' => ['required'],
      ]);

      if (Auth::attempt($credentials)) {

          $request->session()->regenerate();

          return redirect()->route('categories.index');
      }
      // dd($request->all());
      return back()->withErrors([
          'email' => 'Thông tin đăng nhập được cung cấp không khớp với hồ sơ của chúng tôi.',
      ])->onlyInput('email');
  }


    public function checklogin(Request $request)
    {

            $arr = [
                'email' => $request->email,
                'password' => $request->password
            ];
            // if (Auth::guard('users')->attempt($arr)) {
                return redirect()->route('categories.index');
            // } else {
            //     return redirect()->route('viewlogin');
            // }

    }
    public function logout(Request $request)
    {
        // echo 123;
        // die();
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('viewlogin');
    }




    public function quenmatkhau(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $pass = Str::random(6);
            $user->password = bcrypt($pass);
            $user->save();
            $data = [
                'name' => $user->name,
                'pass' => $pass,
                'email' => $user->email,
            ];
            Mail::send('admin.emails.email', compact('data'), function ($email) use ($user) {
                $email->subject('Shop');
                $email->to($user->email, $user->name);
            });
        }
        return redirect()->route('login');
    }
    public function viewquenmatkhau()
    {
        return view('admin.pasword.pasword');
    }
}
