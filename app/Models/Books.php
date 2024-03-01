<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    public function Authors() {
        return $this->belongsTo(Authors::class, 'author_id');
    }
}
