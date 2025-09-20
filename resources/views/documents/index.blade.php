@extends('layouts.app')

@section('title','Mes Documents')

@section('content')
<div class="flex justify-between mb-4">
    <h2 class="text-xl font-bold">Mes Documents</h2>
    <a href="{{ route('documents.create') }}" class="px-4 py-2 bg-green-600 text-white rounded">Nouveau Document</a>
</div>
<ul class="space-y-2">
    @foreach($documents as $doc)
    <li class="p-2 border mb-2 rounded flex justify-between bg-white">
        <span>{{ $doc->title }}</span>
        <a href="{{ asset('storage/'.$doc->file_path) }}" target="_blank" class="px-2 py-1 bg-blue-600 text-white rounded">Télécharger</a>
    </li>
    @endforeach
</ul>
@endsection
