<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rit extends Model
{
    protected $fillable = [
        'user_id', 'Van', 'Naar', 'Beginstand', 'Eindstand', 'Retour', 'Zakelijk', 'Omschrijving'
    ];
}
