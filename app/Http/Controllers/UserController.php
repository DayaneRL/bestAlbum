<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
        $this->middleware('auth');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }
}
