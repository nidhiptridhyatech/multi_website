<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingpageServiceDetail extends Model
{
    protected $table = 'landingpage_service_details';
    protected $fillable = ['landingpage_detail_id','service_sub_heading','service_detail'];
}
