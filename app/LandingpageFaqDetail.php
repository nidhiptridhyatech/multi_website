<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingpageFaqDetail extends Model
{
    protected $table = 'landingpage_faq_details';
    protected $fillable = ['landingpage_detail_id','faq_question','faq_answer'];
}
