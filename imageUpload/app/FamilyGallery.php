<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyGallery extends Model
{
    protected $table = 'family_image';


    protected $fillable = ['family_image','created_at','updated_at'];
}
