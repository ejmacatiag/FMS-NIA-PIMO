<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Box extends Model {
    protected $fillable = ['box_name', 'box_description'];
    public function folders() {
        return $this->hasMany(Folder::class);
    }
}
