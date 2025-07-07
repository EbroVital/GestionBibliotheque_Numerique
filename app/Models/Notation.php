<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'document_id', 'note'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function document() {
        return $this->belongsTo(Document::class);
    }

}
