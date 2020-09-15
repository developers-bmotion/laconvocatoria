<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistType extends Model
{
    //
    protected $table = "artist_types";
    protected $fillable = ['name'];

}
