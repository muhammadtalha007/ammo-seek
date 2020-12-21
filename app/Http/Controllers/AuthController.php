<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function registerCustomer(Request $request)
    {
        try {
            if (!User::where('email', $request->email)->exists()) {
                $customer = new User();
                $customer->name = $request->name;
                $customer->email = $request->email;
                $customer->password = md5($request->password);
                $customer->save();
                Session::put('userId', $customer->id);
                return redirect('/');
            } else {
                session()->flash('msg', 'Email Already Exists');
                return redirect()->back();
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function loginCustomer(Request $request)
    {
        try {
            if (User::where('email', $request->email2)->exists()) {
                $customer = User::where('email', $request->email2)->first();
                if ($customer->password == md5($request->password2)) {
                    if ($customer->status == '1') {
                        return redirect()->back()->withErrors(['You are blocked by Admin.']);
                    }
                    Session::put('userId', $customer->id);
                    return redirect('/');
                } else {
                    return redirect()->back()->withErrors(['Invalid email or password!']);
                }
            } else {
                return redirect()->back()->withErrors(['Invalid email or password!']);
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function logout()
    {
        try {
            Session::remove('userId');
            return json_encode(['status' => true]);
        } catch (\Exception $exception) {
            return json_encode(['status' => false]);
        }
    }
}
