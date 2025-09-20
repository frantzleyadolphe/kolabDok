@extends('layouts.app')

@section('title','Admin: Membres')

@section('content')
<h2 class="text-xl font-bold mb-4">Tous les membres</h2>

<table class="w-full border-collapse">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-2 border">Nom</th>
            <th class="p-2 border">Email</th>
            <th class="p-2 border">Role</th>
        </tr>
    </thead>
    <tbody>
        @foreach($members as $m)
        <tr class="border-b">
            <td class="p-2">{{ $m->name }}</td>
            <td class="p-2">{{ $m->email }}</td>
            <td class="p-2">{{ $m->role }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
