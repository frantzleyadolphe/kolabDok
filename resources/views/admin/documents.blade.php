@extends('layouts.app')

@section('title','Admin: Documents')

@section('content')
<h2 class="text-xl font-bold mb-4">Tous les documents</h2>

<table class="w-full border-collapse">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-2 border">Titre</th>
            <th class="p-2 border">Propriétaire</th>
            <th class="p-2 border">Organisation</th>
        </tr>
    </thead>
    <tbody>
        @foreach($documents as $doc)
        <tr class="border-b">
            <td class="p-2">{{ $doc->title }}</td>
            <td class="p-2">{{ $doc->owner->name }}</td>
            <td class="p-2">{{ $doc->organization->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
