@extends('layouts.app')

@section('title','Accepter invitation')

@section('content')
<h2 class="text-xl font-bold mb-4">Accepter l'invitation</h2>

<p>Vous avez été invité à rejoindre l'organisation: <strong>{{ $organization->name }}</strong></p>

<form action="{{ url('/invite/'.$token) }}" method="POST">
    @csrf
    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Accepter</button>
</form>
@endsection
