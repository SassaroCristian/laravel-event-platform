<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "date",
        "location",
        "description"
    ];

    // Definizione delle relazioni
    // Un evento può appartenere a molte categorie
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
