<?php
namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function indexMembers()
    {
        $members = auth()->user()->organizations->first()->members;
        return view('admin.members', compact('members'));
    }

    public function indexDocuments()
    {
        $documents = auth()->user()->organizations->first()->documents;
        return view('admin.documents', compact('documents'));
    }
}
