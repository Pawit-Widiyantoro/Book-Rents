<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role_id', 2)
                        ->where('status', 'active')
                        ->get();
        return view('dashboard.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Show user account activation.
     */
    public function activation()
    {
        $users = User::where('status', 'inactive')->get();
        return view('dashboard.users.activation', [
            'users' => $users,
        ]);
    }

    /**
     * Activate user account.
     */
    public function activate(User $user)
    {
        $user->update(['status' => 'active']);
        return redirect('/dashboard/users')->with('success', 'User has been activated!');
    }


    /**
     * Show banned account.
     */
    public function banned()
    {
        $users = User::where('status', 'banned')->get();
        return view('dashboard.users.banned', [
            'users' => $users,
        ]);
    }

    /**
     * Ban user account.
     */
    public function ban(User $user)
    {
        $user->update(['status' => 'banned']);
        return redirect('/dashboard/users')->with('success', 'User has been banned!');
    }

    /**
     * Unban user account.
     */
    public function unban(User $user)
    {
        $user->update(['status' => 'active']);
        return redirect('/dashboard/users')->with('success', 'User has been unbanned!');
    }
}
