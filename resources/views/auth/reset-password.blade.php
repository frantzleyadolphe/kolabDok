@extends('layouts.app')
@section('title','Reset Password')
@section('content')
<div class="max-w-md mx-auto mt-10 bg-white dark:bg-gray-800 p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Reset Password</h1>
    @if($errors->any())
        <div class="mb-2 text-red-500">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="email" name="email" placeholder="Email" value="{{ $email ?? old('email') }}" class="w-full mb-2 p-2 border rounded"/>
        <input type="password" name="password" placeholder="New Password" class="w-full mb-2 p-2 border rounded"/>
        <input type="password" name="password_confirmation" placeholder="Confirm New Password" class="w-full mb-2 p-2 border rounded"/>
        <button type="submit" class="w-full bg-green-500 text-white p-2 rounded">Reset Password</button>
    </form>
</div>
@endsection
