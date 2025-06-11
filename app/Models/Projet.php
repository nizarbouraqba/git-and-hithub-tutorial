<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $table = 'projets';
    protected $fillable = [
        'titre_projet', 'description_projet', 'theme', 'date_projet', 'statut_projet', 'image', 'description_detaillee', 'organisateur', 'localisation', 'duree', 'image_partenaire', 'objectif_projet', 'grande_description',
    ];
}
