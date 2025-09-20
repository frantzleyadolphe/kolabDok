<?php
namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentShare;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = auth()->user()->documents;
        return view('documents.index', compact('documents'));
    }

    public function create()
    {return view('documents.create');}

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file'  => 'required|file|max:10240',
        ]);
        $path     = $request->file('file')->store('documents');
        $document = auth()->user()->documents()->create([
            'title'           => $request->title,
            'file_path'       => $path,
            'organization_id' => auth()->user()->organizations->first()->id,
        ]);
        return redirect()->route('documents.index')->with('success', 'Document uploaded!');
    }

    public function sharePage()
    {return view('documents.share', ['document' => Document::first()]);}

    public function share(Request $request, Document $doc)
    {
        $code = Str::random(8);
        DocumentShare::create([
            'document_id' => $doc->id,
            'shared_by'   => auth()->id(),
            'access_code' => $code,
            'expires_at'  => $request->expires_at,
        ]);
        return back()->with('code', $code);
    }

    public function accessPage()
    {return view('documents.access');}

    public function accessDocument(Request $request)
    {
        $share = DocumentShare::where('access_code', $request->access_code)
            ->where(function ($q) {$q->whereNull('expires_at')->orWhere('expires_at', '>', now());})
            ->first();
        if (! $share) {
            return back()->withErrors(['access_code' => 'Code invalide ou expiré.']);
        }

        $document = $share->document;
        return view('documents.access', compact('document'));
    }
}
