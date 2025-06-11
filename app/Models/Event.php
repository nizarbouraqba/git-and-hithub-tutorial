<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'titre', 'description', 'is_a_venir', 'day', 'month', 'heure_event', 'date_limite_inscription', 'heure_limite_inscription', 'date', 'heure', 'ville', 'image', 'prix', 'categorie', 'description_detaillee',
    ];
}
