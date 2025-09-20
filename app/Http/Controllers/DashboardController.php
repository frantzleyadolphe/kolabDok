<?php
namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $documents = auth()->user()->documents;
        return view('dashboard', compact('documents'));
    }
}
