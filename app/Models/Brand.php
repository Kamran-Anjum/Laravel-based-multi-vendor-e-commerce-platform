<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
// use Astrotomic\Translatable\Translatable;

class Brand extends Model
{
    use HasFactory;
    protected $table ='brands';
}
