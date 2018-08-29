<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title', 'director',  'imageUrl', 'duration' , 'releaseDate',  'genre'
    ];

    protected static function queryBuilder($request) {

        $title = $request->query('title');
        $take = $request->query('take');
        $skip = $request->query('skip');
        
        if($title) {
            return self::where('title', 'LIKE', '%'. $title. '%')->take($take)->get();
        }
        if($take && $skip) {
             return self::skip($skip)->take($take)->get();
        }
    }
}
