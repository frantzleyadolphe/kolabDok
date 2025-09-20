<?php
namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrganizationController extends Controller
{
    public function index()
    {
        $organization = auth()->user()->organizations->first();
        return view('organization.index', compact('organization'));
    }

    public function invitePage(Organization $organization)
    {return view('organization.invite', compact('organization'));}

    public function invite(Request $request, Organization $organization)
    {
        $token = Str::random(16);
        Invitation::create([
            'organization_id' => $organization->id,
            'email'           => $request->email,
            'token'           => $token,
        ]);
        // Envoie email logik (Mail::to($request->email)->send(new InvitationMail($token)))
        return back()->with('success', 'Invitation envoyée!');
    }

    public function acceptInvite($token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();
        $invitation->update(['accepted_at' => now()]);
        $invitation->organization->members()->attach(auth()->id());
        return redirect('/dashboard')->with('success', 'Invitation acceptée!');
    }
}
