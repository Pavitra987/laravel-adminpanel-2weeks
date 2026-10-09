<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {

           session([
    'admin_id' => $admin->id,
    'admin_name' => $admin->name,
    'admin_email' => $admin->email,
]);

            return redirect()->route('admin.index');
        }

        return back()->with('error', 'Invalid email or password');
    }

   public function logout(Request $request)
{
    $request->session()->forget([
        'admin_id',
        'admin_name',
        'admin_email'
    ]);

    return redirect()->route('admin.login');
}
}