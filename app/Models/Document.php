<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

     protected $fillable = [
        'titre',
        'description',
        'url_fichier',
        'user_id',
        'categorie_id',
        'vues',
        'telechargements'
    ];

    public function isFavoriBy($userId)
    {
        return $this->favoris()->where('user_id', $userId)->exists();
    }

    public function isNotedBy($userId)
    {
        return $this->notations()->where('user_id', $userId)->exists();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function downloads()
    {
        return $this->hasMany(Download::class);
    }

    public function favoris() {
        return $this->hasMany(Favori::class);
    }

    public function commentaires() {
        return $this->hasMany(Commentaire::class);
    }

    public function notations() {
        return $this->hasMany(Notation::class);
    }



}
