<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $data = User::paginate(5);
        return view('admin.users.index', [
            "data" => $data
        ]);
    }
    public function UserView(User $user)
    {
//
        return view('admin.users.view', [
            "user" => $user
        ]);
    }}
