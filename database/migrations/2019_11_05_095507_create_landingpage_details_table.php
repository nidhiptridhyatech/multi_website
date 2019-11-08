<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingpageDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landingpage_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('template_id');
            $table->string('name')->nullable(true);
            $table->string('sliderimage1')->nullable(true);
            $table->string('sliderimage2')->nullable(true);
            $table->string('sliderimage3')->nullable(true);
            $table->string('service_main_heading')->nullable(true);
            $table->string('service_sub_heading1')->nullable(true);
            $table->string('service_detail1')->nullable(true);
            $table->string('service_sub_heading2')->nullable(true);
            $table->string('service_detail2')->nullable(true);
            $table->string('service_sub_heading3')->nullable(true);
            $table->string('service_detail3')->nullable(true);
            $table->text('portfolio_images')->nullable(true);
            $table->string('testimonial1')->nullable(true);
            $table->string('testimonial2')->nullable(true);
            $table->text('footer_details')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable(true);
            $table->integer('updated_by')->nullable(true);
            $table->integer('deleted_by')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landingpage_details');
    }
}
