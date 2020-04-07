<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignController extends Controller
{

    public function in(Request $request)
    {
        return view('sign/in');
    }

    public function handleIn(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/');
        }

        return redirect()->route('sign_in')->withError('error', 'Uživatel se zadným e-mailem neexistuje nebo bylo zadáno nesprávné heslo.');
    }

    public function up(Request $request)
    {
        return view('sign/up');
    }

    public function handleUp(Request $request)
    {
        $request->validateWithBag('registerForm', [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        $user->role = 'ROLE_USER';
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->save();

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/');
        }

        return redirect()->route('sign_up');
    }

    public function out()
    {
        Auth::logout();
        return redirect()->route('homepage_overview');
    }

}
