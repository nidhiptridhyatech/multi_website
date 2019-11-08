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
            <form id="msform"  method="POST" action="{{route('Landingpage_details.store')}}" enctype="multipart/form-data" >
              @csrf 
              <div class="title">
                <h2>Create Landing Page</h2>
              </div>
              <!-- progressbar starts-->
                <ul id="progressbar">
                  <li class="active"> Landing Page</li>
                  <li >Services</li>  
                  <li>Team Details</li> 
                  <li>Portfolio & Testimonials</li>
                  <li> FAQ</li>
                  <li> Footer</li>
                </ul>
              <!-- progressbar ends-->  

              <!-- Slider Starts -->
                <fieldset>
                    <div class="form-group">
                        <label for="name">Landing Page Name :</label>
                        <input type="text" class="form-control-file form-control" id="name" 
                        name="name">
                    </div>
                        <div class="form-group">
                            <label for="sliderImage3" class="file-label">Slider Image</label>
                            <input type="file" class="form-control-file" name="slider_images[]" multiple="true">
                        </div>
                        <button type="button" class="next action-button">Continue</button>
                </fieldset>
              <!-- Slider Ends -->
              
              <!-- Services Starts -->
                <fieldset>
                  <div class="form-group">
                      <label for="serviceMainHeading">Service Main Heading :</label>
                      <input type="text" class="form-control" id="serviceMainHeading" name="serviceMainHeading">
                  </div>
                  @for($i=0; $i<3;$i++)
                  <div class="form-group">
                      <label>Service Sub Heading{{$i}} :</label>
                      <input type="text" class="form-control" name="service[{{$i}}][sub_heading]">
                  </div>
                  <div class="form-group">
                      <label>Service Detail{{$i}}</label>
                      <textarea class="form-control" rows="3" name="service[{{$i}}][detail]"></textarea>
                  </div>
                  <div class="form-group">
                      <label for="serviceDetail1" class="file-label">Service Image{{$i}}</label>
                      <input type="file" class="form-control" name="service[{{$i}}][image]">
                  </div>
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
                        <label>Team Lead{{$i}} Name :</label>
                        <input type="text" class="form-control" name="team_lead[{{$i}}][name]">
                    </div>
                    <div class="form-group">
                        <label>Team Lead{{$i}} occupation :
                        </label>
                        <input type="text" class="form-control" name="team_lead[{{$i}}][occupation]">
                    </div>
                    <div class="form-group">
                        <label>Team Lead{{$i}} Email :</label>
                        <input type="text" class="form-control" name="team_lead[{{$i}}][email]">
                    </div>
                    <div class="form-group">
                        <label>Team Lead{{$i}} About :</label>
                        <input type="text" class="form-control" name="team_lead[{{$i}}][about]">
                    </div>
                    <div class="form-group">
                        <label class="file-label" class="file-label">Team Lead{{$i}} Image :</label>
                        <input type="file" class="form-control-file" name="team_lead[{{$i}}][image]">
                    </div>
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
                  </div>
                  <div class="form-group">
                    <label for="testimonial1">Testimonial 1 :</label>
                    <textarea class="form-control" id="testimonial1" rows="3" 
                    name="testimonial1"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="testimonial2">Testimonial 2 :</label>
                    <textarea class="form-control" id="testimonial2" rows="3" 
                    name="testimonial2"></textarea>
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
                        <input type="text" class="form-control-file form-control" name="faq[{{$i}}][question]">
                    </div>
                    <div class="form-group">
                        <label for="faq_answer1">Faq Answer {{$i}} :</label>
                        <input type="text" class="form-control-file form-control" name="faq[{{$i}}][answer]">
                    </div>
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
                      <input type="text" class="form-control-file form-control" id="footer_details" name="footer_details">
                  </div>
                  <input type="submit" name="submit" class="btn btn-primary mb-2" value="Submit">
                  <button type="button" class="action-button previous previous_button">Back</button> 
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
