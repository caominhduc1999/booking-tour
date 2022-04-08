<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Mail\ForgotPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getLogin()
    {
        if (Auth::check() && Auth::user()->role == 1) {
            return redirect('/admin');
        }

        return view('admin.pages.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me)) {
            $user = $this->userService->findByField('email', $request->email)->first();
            if ($user->role == 1) {
                return redirect('/admin');
            } else {
                return redirect()->back()->with('notify', 'Sai email hoặc mật khẩu');
            }
        } else {
            return redirect()->back()->with('notify', 'Sai email hoặc mật khẩu');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/admin/login');
    }

    public function getForgotPassword()
    {
        return view('admin.pages.auth.forgot_password');
    }

    public function postForgotPassword(ForgotPasswordRequest $request)
    {
        $dataMail = [
            'email' => $request->email,
            'reset_password_link' => URL::temporarySignedRoute('get_reset_password', now()->addMinutes(30), ['email' => $request->email])
        ];
        Mail::to($request->email)->send(new ForgotPasswordMail($dataMail));

        return redirect('/admin/forgot-password')->with('notify', 'Vui lòng truy cập link reset mật khẩu trong mail');
    }

    public function getResetPassword(Request $request)
    {
        if ($request->hasValidSignature()) {
            return view('admin.pages.auth.reset_password', ['email' => $request->email]);
        }

        return redirect('/admin/forgot-password')->with('notify', 'Link reset mật khẩu không tồn tại');
    }

    public function postResetPassword(ResetPasswordRequest $request, $email)
    {
        if ($request->hasValidSignature()) {
            $user = $this->userService->findByField('email', $email)->first();

            $result = $this->userService->update($user->id, [
                'password' => $request->password
            ]);

            if ($result) {
                return redirect()->back()->with('notify', 'Đặt lại mật khẩu thành công');
            } else {
                return redirect()->back()->with('notify', 'Đặt lại mật khẩu thất bại');
            }
        }
    }
}
