<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentShare extends Model
{
    use HasFactory;

    protected $fillable = ['document_id', 'shared_by', 'access_code', 'expires_at'];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function sharedBy()
    {
        return $this->belongsTo(User::class, 'shared_by');
    }
}
