@extends('layouts.app')

@section('title','Partager Document')

@section('content')
<h2 class="text-xl font-bold mb-4">Partager un document</h2>

<form action="{{ url('/documents/'.$document->id.'/share') }}" method="POST" class="space-y-4">
    @csrf
    <p>Document: <strong>{{ $document->title }}</strong></p>
    <label class="block">
        Expiration (optionnel):
        <input type="datetime-local" name="expires_at" class="border rounded px-2 py-1 w-full">
    </label>
    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Générer code de partage</button>
</form>

@if(session('code'))
<div class="mt-4 p-4 bg-green-600 text-white rounded">
    Code de partage: <strong>{{ session('code') }}</strong>
</div>
@endif
@endsection
