<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // Definizione della relazione
    // Un tag può essere associato a molti eventi
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
