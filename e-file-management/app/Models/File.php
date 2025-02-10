<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'ia_name',
        'project_name',
        'folder_id',
        'file_type',
        'date_received',
        'file_path',
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
