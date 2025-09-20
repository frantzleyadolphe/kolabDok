@extends('layouts.app')
@section('title','Forgot Password')
@section('content')
<div class="max-w-md mx-auto mt-10 bg-white dark:bg-gray-800 p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Forgot Password</h1>
    @if(session('status'))
        <div class="mb-2 text-green-500">{{ session('status') }}</div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" class="w-full mb-2 p-2 border rounded"/>
        <button type="submit" class="w-full bg-yellow-500 text-white p-2 rounded">Send Reset Link</button>
    </form>
    <p class="mt-4 text-sm">
        <a href="{{ route('login') }}" class="text-blue-500">Back to Login</a>
    </p>
</div>
@endsection
