<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LandingpageDetail extends Model
{
    protected $table = 'Landingpage_details';
    use SoftDeletes;
    protected $fillable = ['user_id','template_id','sliderimage1','sliderimage2','sliderimage3','service_main_heading','service_sub_heading1','service_detail1','service_sub_heading2','service_detail2','service_sub_heading3'];
}
