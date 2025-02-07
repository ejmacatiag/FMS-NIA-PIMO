<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model {
    protected $fillable = ['box_id', 'folder_name'];
    public function box() {
        return $this->belongsTo(Box::class);
    }
    public function files() {
        return $this->hasMany(File::class);
    }
}