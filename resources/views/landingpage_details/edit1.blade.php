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
            <form id="msform"  method="POST" action="{{route('Landingpage_details.update',$landingpageDetail->id)}}" enctype="multipart/form-data" >
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
              </ul>

              <!-- Slider Starts -->
                <fieldset>
                    <div class="form-group">
                        <label for="name">Landing Page Name :</label>
                        <input type="text" class="form-control-file form-control" id="name" 
                        name="name" value="{{@$landingpageDetail->name}}">
                    </div>
                        <div class="form-group">
                            <label for="sliderImage3" class="file-label">Slider Image</label>
                            <input type="file" class="form-control-file" name="slider_images[]" multiple="true">
                        </div>
                        @if(isset($landingpageDetail) && !empty($landingpageDetail->slider_images))
                          @php $slider_images = json_decode($landingpageDetail->slider_images); @endphp
                          @foreach($slider_images as $slider_image)
                            <p><a href="{{asset('/storage/'. $slider_image)}}" target="_blank">{{$slider_image}}</a></p>
                          @endforeach
                        @endif
                        <input type="submit" name="submit" class="btn btn-primary mb-2" value="Submit">
                        <button type="button" class="action-button previous previous_button">Back</button> 
                        <button type="button" class="next action-button">Continue</button>
                </fieldset>
              <!-- Slider Ends -->
              
              <!-- Services Starts -->
                <fieldset>
                  <div class="form-group">
                      <label for="serviceMainHeading">Service Main Heading :</label>
                      <input type="text" class="form-control" id="serviceMainHeading" name="serviceMainHeading" value="{{@$landingpageDetail->service_main_heading}}">
                  </div>
                  @for($i=0; $i<3;$i++)
                    <div class="form-group">
                      <label for="serviceSubHeading1">Service Sub Heading{{$i}} :</label>
                      @if (array_key_exists($i,$landingpageServiceDetails))
                        <input type="text" class="form-control" 
                        name="service[{{$i}}][sub_heading]" 
                        value="<?php echo $landingpageServiceDetails[$i]['service_sub_heading'] ?>">
                      @else
                        <input type="text" class="form-control" name="service[{{$i}}][sub_heading]">
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="serviceDetail1">Service Detail{{$i}}</label>
                      @if (array_key_exists($i,$landingpageServiceDetails))
                        <textarea class="form-control" rows="3" name="service[{{$i}}][detail]">
                          <?php echo $landingpageServiceDetails[$i]['service_detail'] ?>
                        </textarea>
                      @else
                        <textarea class="form-control" rows="3" name="service[{{$i}}][detail]">
                        </textarea>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="serviceDetail1" class="file-label">Service Image{{$i}}</label>
                      <input type="file" class="form-control" name="service[{{$i}}][image]">
                      @if (array_key_exists($i,$landingpageServiceDetails))
                        <p><a href="{{asset('/storage/'. @$landingpageServiceDetails[$i]['service_image'])}}" target="_blank">{{$landingpageServiceDetails[$i]['service_image']}}</a></p>
                      @endif
                    </div>
                    @if(array_key_exists($i,$landingpageServiceDetails))
                      <input type="hidden" name="service[{{$i}}][id]" value="<?php echo $landingpageServiceDetails[$i]['id'] ?>">
                      <input type="hidden" name="service[{{$i}}][old_image]" value="<?php echo $landingpageServiceDetails[$i]['service_image'] ?>">
                    @endif
                  @endfor
                  <input type="submit" name="submit" class="btn btn-primary mb-2" value="Submit">
                  <button type="button" class="action-button previous previous_button">Back</button> 
                  <button type="button" class="next action-button">Continue</button>  
                </fieldset>
              <!-- Services Ends -->

              <!-- Team Lead Starts -->
                <fieldset>
                  @for($i=0; $i<2;$i++)
                    <div class="form-group">
                        <label for="team_lead1_name">Team Lead{{$i}} Name :</label>
                        @if(array_key_exists($i,$landingpageTeamDetails))
                          <input type="text" class="form-control" name="team_lead[{{$i}}][name]" value="<?php echo $landingpageTeamDetails[$i]['team_lead_name'] ?>">
                        @else
                          <input type="text" class="form-control" name="team_lead[{{$i}}][name]">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="team_lead1_occupation">Team Lead{{$i}} occupation :
                        </label>
                        @if(array_key_exists($i,$landingpageTeamDetails))
                          <input type="text" class="form-control" name="team_lead[{{$i}}][occupation]" value="<?php echo $landingpageTeamDetails[$i]['team_lead_occupation'] ?>">
                        @else
                          <input type="text" class="form-control" name="team_lead[{{$i}}][occupation]">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="team_lead1_email">Team Lead{{$i}} Email :</label>
                        @if(array_key_exists($i,$landingpageTeamDetails))
                          <input type="text" class="form-control" name="team_lead[{{$i}}][email]" value="<?php echo $landingpageTeamDetails[$i]['team_lead_email'] ?>">
                        @else
                          <input type="text" class="form-control" name="team_lead[{{$i}}][email]">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="team_lead1_about">Team Lead{{$i}} About :</label>
                        @if(array_key_exists($i,$landingpageTeamDetails))
                          <input type="text" class="form-control" name="team_lead[{{$i}}][about]" value="<?php echo $landingpageTeamDetails[$i]['team_lead_about'] ?>">
                        @else
                          <input type="text" class="form-control" name="team_lead[{{$i}}][about]">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="team_lead1_image" class="file-label" class="file-label">Team Lead{{$i}} Image :</label>
                        <input type="file" class="form-control-file" name="team_lead[{{$i}}][image]">
                        @if(array_key_exists($i,$landingpageTeamDetails))
                          <p><a href="{{asset('/storage/'. @$landingpageTeamDetails[$i]['team_lead_image'])}}" target="_blank">{{@$landingpageTeamDetails[$i]['team_lead_image']}}</a></p>
                        @endif
                    </div>

                    @if(array_key_exists($i,$landingpageTeamDetails))
                      <input type="hidden" name="team_lead[{{$i}}][id]" value="<?php echo $landingpageTeamDetails[$i]['id'] ?>">
                      <input type="hidden" name="team_lead[{{$i}}][old_image]" value="<?php echo $landingpageTeamDetails[$i]['team_lead_image'] ?>">
                    @endif
                  @endfor
                  <input type="submit" name="submit" class="btn btn-primary mb-2" value="Submit">
                  <button type="button" class="action-button previous previous_button">Back</button> 
                   <button type="button" class="next action-button">Continue</button>  
                </fieldset>
              <!-- Team Lead Ends -->

              <!-- Testimonials Starts -->
                <fieldset>
                  <div class="form-group">
                    <label for="portfolio_images" class="file-label">Portfolio Images :</label>
                    <input type="file" class="form-control-file" name="portfolio_images[]" multiple="true">
                    @if(isset($landingpageDetail) && !empty($landingpageDetail->portfolio_images))
                      @php 
                        $portfolio_images = json_decode($landingpageDetail->portfolio_images); 
                      @endphp
                      @foreach(@$portfolio_images as $portfolio_image)
                        <p><a href="{{asset('/storage/'. $portfolio_image)}}" target="_blank">{{@$portfolio_image}}</a></p>
                      @endforeach
                    @endif
                  </div>
                  
                  <div class="form-group">
                    <label for="testimonial1">Testimonial 1 :</label>
                    <textarea class="form-control" id="testimonial1" rows="3" 
                    name="testimonial1">{{@$landingpageDetail->testimonial1}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="testimonial2">Testimonial 2 :</label>
                    <textarea class="form-control" id="testimonial2" rows="3" 
                    name="testimonial2">{{@$landingpageDetail->testimonial2}}</textarea>
                  </div>
                  <button type="button" class="action-button previous previous_button">Back</button>
                  <button type="button" class="next action-button">Continue</button>  
                </fieldset>
              <!-- Testimonials Ends -->
              
              <!-- Faq Starts -->
                <fieldset>
                  @for($i=0; $i<4;$i++)
                    <div class="form-group">
                        <label for="faq_question1">Faq Question {{$i}} :</label>
                        @if(array_key_exists($i,$landingpageFaqDetails))
                          <input type="text" class="form-control-file form-control" name="faq[{{$i}}][question]" value="<?php echo $landingpageFaqDetails[$i]['faq_question']?>">
                        @else
                          <input type="text" class="form-control-file form-control" name="faq[{{$i}}][question]">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="faq_answer1">Faq Answer {{$i}} :</label>
                        @if(array_key_exists($i,$landingpageFaqDetails))
                          <input type="text" class="form-control-file form-control" name="faq[{{$i}}][answer]" value="<?php echo $landingpageFaqDetails[$i]['faq_answer']?>">
                        @else
                          <input type="text" class="form-control-file form-control" name="faq[{{$i}}][answer]">
                        @endif
                    </div>
                    @if(array_key_exists($i,$landingpageFaqDetails))
                      <input type="hidden" name="faq[{{$i}}][id]" value="<?php echo $landingpageFaqDetails[$i]['id'] ?>">
                      @endif
                  @endfor
                  <input type="submit" name="submit" class="btn btn-primary mb-2" value="Submit">
                  <button type="button" class="action-button previous previous_button">Back</button> 
                  <button type="button" class="next action-button">Continue</button>  
                </fieldset>
              <!-- Faq Ends -->
              
              <!-- FooterInfo Starts -->
                <fieldset>
                  <div class="form-group">
                      <label for="footer_details">Footer Details :</label>
                      <input type="text" class="form-control-file form-control" id="footer_details" name="footer_details" value="{{@$landingpageDetail->footer_details}}">
                  </div>
                  <button type="button" class="action-button previous previous_button">Back</button> 
                  <input type="submit" name="submit" class="btn btn-primary mb-2" value="Submit">
                </fieldset>
              <!-- FooterInfo Ends -->

            </form>  
        </section> 
      </div>
    </div>
  </div>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script type="text/javascript" src="{{asset('js/landingpage.js')}}"></script>
@endsection
