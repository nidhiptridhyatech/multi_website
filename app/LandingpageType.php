<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LandingpageType extends Model
{
    protected $table = 'Landingpage_types';
    use SoftDeletes;
    protected $fillable = ['name'];
}
