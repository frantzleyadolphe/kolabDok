@extends('layouts.app')

@section('title','Nouveau Document')

@section('content')
<h2 class="text-xl font-bold mb-4">Upload un nouveau document</h2>
<form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <input type="text" name="title" placeholder="Titre du document" class="w-full border rounded px-3 py-2" required>
    <input type="file" name="file" class="w-full" required>
    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Upload</button>
</form>
@endsection
