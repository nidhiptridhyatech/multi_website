@extends('layouts.app')

@section('css')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" type="text/css" href="{{asset('css/landingpage.css')}}">
@endsection
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <section class="multi_step_form">  
            <form id="msform"  method="POST" action="{{route('Landingpage_details.update',$userwiseLandingpageDetail['id'])}}" enctype="multipart/form-data" >
              <input name="_method" type="hidden" value="PUT">
              @csrf 
              <div class="title">
                <h2>Edit Landing Page</h2>
              </div>
              <!-- progressbar -->
              <ul id="progressbar">
                <li class="active"> Landing Page</li>
                <li >Services</li>  
                <li>Team Details</li> 
                <li>Portfolio & Testimonials</li>
                <li> FAQ</li>
                <li> Footer</li>
                <li> Footer Links</li>
              </ul>

              <!-- Slider Starts -->
                <fieldset>
                  @for($i=0; $i<3; $i++)
                    <?php
                      $k = $i+1; 
                      $slider_array = json_decode($userwiseLandingpageDetail['slider_details']);
                    ?>
                    <div class="form-group">
                          <label>{{$k}}'s Slider Heading1:</label>
                          <input type="text" class="form-control-file form-control slider" name="slider[0][heading1]" 
                          value="<?php echo @$slider_array[$i]->heading1?>">
                    </div>
                    <div class="form-group">
                          <label>{{$k}}'s Slider Heading2:</label>
                          <input type="text" class="form-control-file form-control "
                          name="slider[{{$i}}][heading2]"
                          value="<?php echo @$slider_array[$i]->heading2?>">
                    </div>
                    <div class="form-group">
                      <label for="sliderImage3" class="file-label">{{$k}}'s Slider Image</label>
                      <input type="file" class="form-control-file " name="slider[{{$i}}][image]">

                      <input type="hidden" name="slider[{{$i}}][old_image]" value="<?php echo @$slider_array[$i]->slider_image ?>">
                      <p><a href="<?php echo asset('/storage/'. @$slider_array[$i]->slider_image) ?>"><?php echo @$slider_array[$i]->slider_image?></a></p>
                    </div>
                  @endfor
                  <button type="button" class="action-button previous previous_button">Back</button> 
                  <button type="button" class="next action-button " >Continue</button>
                </fieldset>
              <!-- Slider Ends -->

              <!-- Services Starts -->
                <fieldset>
                  <div class="form-group">
                      <label for="serviceMainHeading">Service Main Heading :</label>
                      <input type="text" class="form-control" name="service_main_heading"
                      value="<?php echo @$userwiseLandingpageDetail['service_main_heading'] ?>">
                  </div>
                  @for($i=0; $i<3; $i++)
                    <?php
                      $k = $i+1;
                      $service_array = json_decode($userwiseLandingpageDetail['service_other_details']);
                    ?>
                    <div class="form-group">
                      <label>{{$k}}'s Service Heading :</label>
                      <input type="text" class="form-control" name="service[{{$i}}][heading]" 
                      value="<?php echo @$service_array[$i]->heading?>">
                    </div>
                  <div class="form-group">
                      <label>{{$k}}'s Service Detail :</label>
                      <textarea class="form-control" rows="3" name="service[{{$i}}][detail]"><?php echo @$service_array[$i]->detail?></textarea>
                  </div>
                  <div class="form-group">
                      <label for="serviceDetail1" class="file-label">{{$k}}'s Service Image :</label>
                      <input type="file" class="form-control" name="service[{{$i}}][image]">

                      <input type="hidden" name="service[{{$i}}][old_image]" value="<?php echo @$service_array[$i]->service_image ?>">
                      <p><a href="<?php echo asset('/storage/'. @$service_array[$i]->service_image) ?>"><?php echo @$service_array[$i]->service_image?></a></p>
                  </div>
                  @endfor
                  <button type="button" class="action-button previous previous_button">Back</button> 
                  <button type="button" class="next action-button">Continue</button>  
                </fieldset>
              <!-- Services Ends -->

              <!-- Team Lead Starts -->
                <fieldset>
                  <?php $team_array = json_decode($userwiseLandingpageDetail['team_details']);
                    $i_count = 0;
                   ?>
                  <div class ="team_div">
                    @if(!empty($team_array))
                      @foreach($team_array as $k => $team)
                        @php $i = $k+1; @endphp
                        <div class="form-group">
                            <label>{{$i}} Team Lead Name :</label>
                            <input type="text" class="form-control" name="team[{{$k}}][name]" value="<?php echo @$team->name ?>">
                        </div>
                        <div class="form-group">
                            <label>{{$i}} Team Lead occupation :
                            </label>
                            <input type="text" class="form-control" name="team[{{$k}}][occupation]" value="<?php echo @$team->occupation ?>">
                        </div>
                        <div class="form-group">
                            <label>{{$i}} Team Lead Email :</label>
                            <input type="text" class="form-control" name="team[{{$k}}][email]" value="<?php echo @$team->email ?>">
                        </div>
                        <div class="form-group">
                            <label>{{$i}} Team Lead About :</label>
                            <input type="text" class="form-control" name="team[{{$k}}][about]" value="<?php echo @$team->about ?>">
                        </div>
                        <div class="form-group">
                            <label class="file-label" class="file-label">{{$i}} Team Lead Image :</label>
                            <input type="file" class="form-control-file" name="team[{{$k}}][image]">
                            <input type="hidden" name="team[{{$k}}][old_image]" value="<?php echo 
                            @$team->team_image ?>">
                            <p><a href="<?php echo asset('/storage/'. @$team->team_image) ?>"><?php echo @$team->team_image?></a></p>
                        </div>
                        <?php $i_count++;?>
                      @endforeach
                    @else
                      <div class="form-group">
                            <label>1 Team Lead Name :</label>
                            <input type="text" class="form-control" name="team[0][name]">
                      </div>
                      <div class="form-group">
                          <label>1 Team Lead occupation :
                          </label>
                          <input type="text" class="form-control" name="team[0][occupation]">
                      </div>
                      <div class="form-group">
                          <label>1 Team Lead Email :</label>
                          <input type="text" class="form-control" name="team[0][email]">
                      </div>
                      <div class="form-group">
                          <label>1 Team Lead About :</label>
                          <input type="text" class="form-control" name="team[0][about]">
                      </div>
                      <div class="form-group">
                          <label class="file-label" class="file-label">1 Team Lead Image :</label>
                          <input type="file" class="form-control-file" name="team[0][image]">
                      </div>
                    @endif
                    <input type="hidden" name="i_count" id="i_count" value="{{$i_count}}"> 
                  </div>

                  <button type="button" class="action-button  add_team">Add Team</button> 
                  <button type="button" class="action-button previous previous_button">Back</button> 
                   <button type="button" class="next action-button">Continue</button>  
                </fieldset>
              <!-- Team Lead Ends -->

              <!-- Testimonials Starts -->
                <fieldset>
                  <div class="form-group">
                    <label class="file-label">Portfolio Images :</label>
                    <input type="file" class="form-control-file" name="portfolio_images[]" multiple="true">
                    <?php 
                      $portfolio_array = json_decode($userwiseLandingpageDetail['portfolio_images']); 
                     ?>
                    @if(!empty($portfolio_array))
                      @foreach($portfolio_array as $portfolio)
                        <p><a href="<?php echo asset('/storage/'. @$portfolio) ?>"><?php echo @$portfolio?></a></p>
                      <input type="hidden" name="portfolio_old_images[]" value="{{@$portfolio}}">
                      @endforeach
                    @endif
                  </div>

                  @for($i=0; $i<2; $i++)
                  <?php 
                    $k = $i+1;
                    $testimonial_array = json_decode($userwiseLandingpageDetail['testimonial_details']);
                  ?>
                  <div class="form-group">
                    <label>Testimonial {{$k}} :</label>
                    <textarea class="form-control" rows="3" name="testimonial[{{$i}}]"><?php echo @$testimonial_array[$i]?></textarea>
                  </div>
                  @endfor
                  <button type="button" class="action-button previous previous_button">Back</button>
                  <button type="button" class="next action-button">Continue</button>  
                </fieldset>
              <!-- Testimonials Ends -->

              <!-- Faq Starts -->
                <fieldset>
                  @for($i=0; $i<5;$i++)
                    <?php
                      $k = $i+1; 
                      $faq_array = json_decode($userwiseLandingpageDetail['faq_details']);
                    ?>
                    <div class="form-group">
                        <label>{{$k}} Faq Question:</label>
                        <input type="text" class="form-control-file form-control" name="faq[{{$i}}][question]" value="<?php echo @$faq_array[$i]->question?>">
                    </div>
                    <div class="form-group">
                        <label>{{$k}} Faq Answer:</label>
                        <input type="text" class="form-control-file form-control" name="faq[{{$i}}][answer]" value="<?php echo @$faq_array[$i]->answer?>">
                    </div>
                  @endfor
                  <button type="button" class="action-button previous previous_button">Back</button> 
                  <button type="button" class="next action-button">Continue</button>  
                </fieldset>
              <!-- Faq Ends -->

              <!-- FooterInfo Starts -->
                <fieldset>
                  <?php
                    $footer_array = json_decode($userwiseLandingpageDetail['footer_details']);
                  ?>
                  <div class="form-group">
                      <label>Footer Heading 1 :</label>
                      <input type="text" class="form-control" name="footer[heading1]" value="<?php echo @$footer_array->heading1?>">
                  </div>
                  <div class="form-group">
                      <label>Footer Details :</label>
                      <textarea class="form-control" rows="3" name="footer[detail]"><?php echo 
                      @$footer_array->detail?></textarea>
                  </div>
                  <div class="form-group">
                      <label>Footer Heading 2 :</label>
                      <input type="text" class="form-control" name="footer[heading2]" value="<?php echo @$footer_array->heading2?>">
                  </div>
                  <div class="form-group">
                      <label>Footer Heading 3 :</label>
                      <input type="text" class="form-control" name="footer[heading3]" value="<?php echo @$footer_array->heading3?>">
                  </div>
                  <div class="form-group">
                      <label>Address :</label>
                      <input type="text" class="form-control" name="footer[address]" value="<?php echo @$footer_array->address?>">
                  </div>
                  <div class="form-group">
                      <label>Phone :</label>
                      <input type="text" class="form-control" name="footer[phone]" value="<?php echo @$footer_array->phone?>">
                  </div>
                  <div class="form-group">
                      <label>Email :</label>
                      <input type="text" class="form-control" name="footer[email]" value="<?php echo @$footer_array->email?>">
                  </div>
                  <div class="form-group">
                      <label>Web :</label>
                      <input type="text" class="form-control" name="footer[web]" value="<?php echo @$footer_array->web?>">
                  </div>
                  <button type="button" class="action-button previous previous_button">Back</button> 
                  <button type="button" class="next action-button">Continue</button> 
                </fieldset>
              <!-- FooterInfo Ends -->

              <!-- FooterLink Starts -->
                <fieldset>
                  <?php
                    $footer_link_array = json_decode($userwiseLandingpageDetail['footer_link_details']);
                  ?>
                  @for($i=0; $i<6; $i++)
                  @php $k = $i+1; @endphp
                    <div class="form-group">
                        <label>{{$k}} Footer Link Url :</label>
                        <input type="text" class="form-control" name="footer_link[{{$i}}][url]" value="<?php echo @$footer_link_array[$i]->url?>">
                    </div>
                    <div class="form-group">
                        <label>{{$k}} Footer Link Name :</label>
                        <input type="text" class="form-control" name="footer_link[{{$i}}][name]" value="<?php echo @$footer_link_array[$i]->name?>">
                    </div>
                  @endfor
                  <button type="button" class="action-button previous previous_button">Back</button> 
                  <input type="submit" name="submit" class="btn btn-primary mb-2" value="Submit">
                  
                </fieldset>
              <!-- FooterLink Ends -->
              
              
            </form>  
        </section> 
      </div>
    </div>
  </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script type="text/javascript" src="{{asset('js/landingpage.js')}}"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("input:text:visible:first").focus();
        var i = $("#i_count").val();
        if(i == 0){
            i = 1;
        }
        $(".add_team").click(function(){
          var html = '';
          var k = parseInt(i)+1;
          html += '<div class="form-group">';
            html += '<label>'+k+' Team Lead Name :</label>';
            html += '<input type="text" class="form-control" name="team['+i+'][name]">';
          html += '</div>';

          html += '<div class="form-group">';
            html +='<label>'+k+' Team Lead occupation :</label>';
            html += '<input type="text" class="form-control" name="team['+i+'][occupation]">';
          html += '</div>';

          html += '<div class="form-group">';
            html += '<label>'+k+' Team Lead Email :</label>';
            html += '<input type="text" class="form-control" name="team['+i+'][email]">';
          html += '</div>';

          html += '<div class="form-group">';
            html += '<label>'+k+' Team Lead About :</label>';
            html += '<input type="text" class="form-control" name="team['+i+'][about]">';
          html += '</div>';

          html += '<div class="form-group">';
            html += '<label class="file-label" class="file-label">'+k+' Team Lead Image :</label>';
            html += '<input type="file" class="form-control-file" name="team['+i+'][image]">';
          html += '</div>';
          $(".team_div").append(html);
          i++;
        });

        $('#msform').validate({
            rules: {
                'slider[0][heading1]': {
                    required: true
                },
                'slider[1][heading1]': {
                    required: true
                }
            },
            submitHandler: function (form) { // for demo
                alert('valid form');
                return false;
            }
        });

      });
    </script>
@endsection
