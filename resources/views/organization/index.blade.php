@extends('layouts.app')

@section('title','Organisation')

@section('content')
<h2 class="text-xl font-bold mb-4">Mon Organisation</h2>
<p>Organisation: <strong>{{ $organization->name }}</strong></p>

<h3 class="text-lg font-semibold mt-4">Membres</h3>
<ul class="list-disc ml-4">
    @foreach($organization->members as $member)
        <li>{{ $member->name }} ({{ $member->email }})</li>
    @endforeach
</ul>

<a href="{{ url('/organization/'.$organization->id.'/invite') }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded">Inviter un membre</a>
@endsection
