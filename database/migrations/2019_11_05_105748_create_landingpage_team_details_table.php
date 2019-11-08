<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingpageTeamDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landingpage_team_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('landingpage_detail_id');
            $table->string('team_lead_name')->nullable(true);
            $table->string('team_lead_occupation')->nullable(true);
            $table->string('team_lead_email')->nullable(true);
            $table->string('team_lead_about')->nullable(true);
            $table->string('team_lead_image')->nullable(true);     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landingpage_team_details');
    }
}
