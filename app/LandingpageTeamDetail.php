<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingpageTeamDetail extends Model
{
    protected $table = 'landingpage_team_details';
    protected $fillable = ['landingpage_detail_id','team_lead_name','team_lead_occupation',
    	'team_lead_email','team_lead_about','team_lead_image'];
}
