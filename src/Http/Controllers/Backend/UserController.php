<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('backend.user.index')->with('users', User::latest()->get());
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }


    public function show($user)
    {
    }

    public function edit($id)
    {
    }



    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
