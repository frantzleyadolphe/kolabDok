<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'file_path', 'owner_id', 'organization_id'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function shares()
    {
        return $this->hasMany(DocumentShare::class);
    }
}
