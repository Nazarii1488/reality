<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function personal()
    {
        $user = Auth::user();
        return view('users/viewUser', compact('user'));
    }
}
