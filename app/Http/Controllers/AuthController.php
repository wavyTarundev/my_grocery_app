<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;          
class AuthController extends Controller
{
    public function login(){
        return view('auth/login');
    }
    public function doLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect("/home")->with('success', 'Login success');
        }
        return redirect("/")->with('error','You have entered invalid credentials');
    }
}
