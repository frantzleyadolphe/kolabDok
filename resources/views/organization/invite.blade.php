@extends('layouts.app')

@section('title','Inviter un membre')

@section('content')
<h2 class="text-xl font-bold mb-4">Inviter un membre</h2>

<form action="{{ url('/organizations/'.$organization->id.'/invite') }}" method="POST" class="space-y-4">
    @csrf
    <input type="email" name="email" placeholder="Email du membre" class="w-full border rounded px-3 py-2" required>
    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Envoyer invitation</button>
</form>

@if(session('success'))
<div class="mt-4 p-4 bg-green-600 text-white rounded">{{ session('success') }}</div>
@endif
@endsection
