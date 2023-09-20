<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(){
        return view("auth.login.index");
    }

    public function postLogin(Request $res){
        $res->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        if (Auth::attempt(['username' => $res->username, "password" => $res->password])) {
            dd("Authentication was successful");
        }
        else {
            return redirect()->route('login')->withErrors("Tên đăng nhập hoặc mật khẩu sai!!!");
        }
    }

    public function register(){
        return view("auth.register.index");
    }

    public function postRegister(Request $res){
        Validator::extend('unique_email_or_phone', function ($attribute, $value, $parameters, $validator) {
            if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                return !User::where('Email', $value)->exists();
            } else {
                $normalizedPhoneNumber = (int)$value;
                return !User::where('Phone', $normalizedPhoneNumber)->exists();
            }
        });

        $validator = Validator::make($res->all(), [
            'username' => ['required', 'string', 'max:255' , 'unique:User'],
            'email_or_phone' => 'required|string|max:255|unique_email_or_phone',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }
        $result = $this->createUser($res->all());

        if ($result instanceof User) {
            session()->flash('success', 'Đăng ký thành công, vui lòng đăng nhập vào tài khoản');
            return redirect()->route("login");
        }
    }

    protected function createUser(array $data)
    {
        if (filter_var($data['email_or_phone'], FILTER_VALIDATE_EMAIL)) {
            return User::create([
                'Username' => $data['username'],
                'Email' => $data['email_or_phone'],
                'Password' => bcrypt($data['password']),
                'Role' => 0
            ]);
        } else {
            $normalizedPhoneNumber = (int)$data['email_or_phone'];
            return User::create([
                'Username' => $data['username'],
                'Phone' => $normalizedPhoneNumber,
                'Password' => bcrypt($data['password']),
                'Role' => 0
            ]);
        }
    }
}
