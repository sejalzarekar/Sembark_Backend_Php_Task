<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitation;
use App\Models\Role;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    // Show invitation form
    public function create() {
        $roles = Role::all();
        return view('invitations.create', compact('roles'));
    }

    // Handle invitation
    public function store(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:users,email|unique:invitations,email',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = auth()->user();
        $role = Role::find($request->role_id);

        // Determine company_id
        $companyId = null;
        if ($user->role->name == 'SuperAdmin') {
            // New company must be created manually or assign later
            $companyId = null; 
        } else {
            $companyId = $user->company_id;
        }

        $token = Str::random(32);

        $invitation = Invitation::create([
            'email' => $request->email,
            'role_id' => $role->id,
            'company_id' => $companyId,
            'token' => $token,
        ]);


        return back()->with('success', 'Invitation sent successfully!');
    }
}
