@extends('layouts.app')
@section('title','Register')
@section('content')
<div class="max-w-md mx-auto mt-10 bg-white dark:bg-gray-800 p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Register</h1>
    @if($errors->any())
        <div class="mb-2 text-red-500">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('register.submit') }}">
        @csrf
        <input type="text" name="name" placeholder="Name" class="w-full mb-2 p-2 border rounded"/>
        <input type="email" name="email" placeholder="Email" class="w-full mb-2 p-2 border rounded"/>
        <input type="password" name="password" placeholder="Password" class="w-full mb-2 p-2 border rounded"/>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full mb-2 p-2 border rounded"/>
        <button type="submit" class="w-full bg-green-500 text-white p-2 rounded">Register</button>
    </form>
    <p class="mt-4 text-sm">
        Already have an account? <a href="{{ route('login') }}" class="text-blue-500">Login</a>
    </p>
</div>
@endsection
