<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest; // Pastikan Anda mengimpor AuthRequest jika Anda membuatnya.
use PhpOffice\PhpSpreadsheet\Reader\Xls\RC4;

class UserController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            switch ($user->level) {
                case 1:
                case 2:
                    return redirect()->intended('/');
                    break;
                default:
                    return view('auth.login');
                    break;
            }
        }
        
        return view('auth.login');
    }

    public function cekLogin(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $request->session()->regenerate();
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            switch ($user->level) {
                case 1:
                case 2:
                    return redirect()->intended('/');
                    break;
            }
            return redirect()->intended('/');
        }
        
        return back()->withErrors([
            'nofound' => 'Email or password is wrong'
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
