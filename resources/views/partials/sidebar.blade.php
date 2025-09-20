<aside class="w-64 bg-white shadow-lg fixed h-full">
    <div class="p-4 font-bold text-xl text-gray-800">MyTeamCollab</div>
    <nav class="mt-4 flex flex-col space-y-2">
        <a href="{{ route('dashboard') }}" class="px-4 py-2 hover:bg-gray-200">Dashboard</a>
        <a href="{{ route('documents.index') }}" class="px-4 py-2 hover:bg-gray-200">Mes Documents</a>
        <a href="{{ route('documents.create') }}" class="px-4 py-2 hover:bg-gray-200">Nouveau Document</a>
        <a href="{{ url('/documents/share') }}" class="px-4 py-2 hover:bg-gray-200">Partager Document</a>
        <a href="{{ url('/documents/access') }}" class="px-4 py-2 hover:bg-gray-200">Accéder Document</a>
        <a href="{{ url('/organization') }}" class="px-4 py-2 hover:bg-gray-200">Organisation</a>
        @if(auth()->user()->role === 'admin')
            <a href="{{ url('/admin/members') }}" class="px-4 py-2 hover:bg-gray-200">Admin: Membres</a>
            <a href="{{ url('/admin/documents') }}" class="px-4 py-2 hover:bg-gray-200">Admin: Documents</a>
        @endif
    </nav>
</aside>
