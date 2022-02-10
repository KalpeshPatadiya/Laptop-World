<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function viewuser($id)
    {
        $users = User::find($id);
        return view('admin.users.view', compact('users'));
    }

    public function edituser($id)
    {
        $users = User::find($id);
        return view('admin.users.edit', compact('users'));
    }

    public function updateuser(Request $request, $id)
    {
        $users = User::find($id);
        $users->role_as = $request->input('roles');
        $users->update();
        return redirect('users')->with('status', "Role Updated Successfully");
    }
}
