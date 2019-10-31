<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Location extends Model
{
    use SearchableTrait;

    protected $fillable = [
        'name'
    ];

    protected $searchable = [
        'columns' => [
            'name' => 10,
        ],
    ];
}