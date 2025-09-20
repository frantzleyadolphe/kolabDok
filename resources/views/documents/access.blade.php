@extends('layouts.app')

@section('title','Accéder Document')

@section('content')
<h2 class="text-xl font-bold mb-4">Accéder à un document via code</h2>

<form action="{{ url('/documents/access') }}" method="POST" class="space-y-4">
    @csrf
    <input type="text" name="access_code" placeholder="Entrez le code" class="w-full border rounded px-3 py-2" required>
    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Accéder</button>
</form>

@if(isset($document))
<div class="mt-4 p-4 border rounded bg-white">
    <p>Document: <strong>{{ $document->title }}</strong></p>
    <a href="{{ asset('storage/'.$document->file_path) }}" class="px-2 py-1 bg-green-600 text-white rounded" target="_blank">Télécharger</a>
</div>
@endif
@endsection
