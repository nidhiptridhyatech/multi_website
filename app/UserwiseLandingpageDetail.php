<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserwiseLandingpageDetail extends Model
{
    protected $table = 'userwise_landingpage_details';
    use SoftDeletes;
    protected $fillable = ['user_id','landingpage_type_id','slider_details'];
}
