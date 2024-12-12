<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password'=> 'required|confirmed'
        ]);
        // var_dump($request->all());

        $user = User::create ([
            'name'=> $request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);
        session()->flash('success', 'Регистрация пройдена');

        return redirect()->route('verification.notice');
    }

    public function loginForm() {
        return view('user.login');
    }

    public function login(Request $request) {
        // dd($request->all());
        $title = "Home Page";
        $request->validate([
            'email' => 'required|email',
            'password'=> 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password'=> $request->password,
        ])) {
            session()->flash('success', 'Вы вошли!');
            return redirect()->route('home', compact('title'));
            if (Auth::user()->is_admin) {
                return redirect()->route('admin');
            }
        }
        return redirect()->back()->with('error', 'Неверный логин или пароль...');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login.create');
    }

    public function forgotPasswordStore(Request $request) {
        // $request->validate(['email' => 'required|email']);
        // $status = Password::sendResetLink(
        //     $request->only('email')
        // );
        // return $status === Password::RESET_LINK_SENT
        //     ? back()->with(['success' => __($status)])
        //     : back()->withErrors(['email' => __($status)]);

        // Валидация входных данных

        // Валидация входных данных
    $request->validate(['email' => 'required|email']);

    // Проверка существования пользователя с указанным email
        $userExists = User::where('email', $request->email)->exists();

        if (!$userExists) {
            // Если пользователь не найден, возвращаем ошибку
            return back()->withErrors(['email' => 'Пользователь с таким email не найден.']);
        }

        // Если пользователь существует, отправляем ссылку для сброса пароля
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Проверяем статус отправки ссылки
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with(['success' => 'Ссылка для сброса пароля отправлена на ваш email.']);
        } else {
            return back()->withErrors(['email' => 'Не удалось отправить ссылку для сброса пароля. Попробуйте еще раз.']);
        }
    }

    public function resetPasswordUpdate(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password'=> 'required|confirmed'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('success', __($status))
        : back()->withErrors(['email' => __($status)]);
    }

    public function dashboard() {
        Auth::logout();
        return view('user.dashboard');
    }
}