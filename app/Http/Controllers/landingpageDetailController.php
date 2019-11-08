<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingpageDetail;
use App\LandingpageServiceDetail;
use App\LandingpageTeamDetail;
use App\LandingpageFaqDetail;
use App\UserwiseLandingpageDetail;
use Auth;

class landingpageDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UserwiseLandingpageDetail::select("landingpage_types.name as landingpage_type",
            "userwise_landingpage_details.*")
        ->leftJoin("landingpage_types","userwise_landingpage_details.landingpage_type_id","="
            ,"landingpage_types.id")
        ->where("userwise_landingpage_details.user_id",Auth::user()->id)
        ->get();
        //echo "<pre>";print_r($data);exit;
        return view('landingpage_details.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('landingpage_details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo "<pre>";print_r($request->faq);exit;
        //Slider Image Upload Starts
            $slider_path = storage_path().'/app/public/landingpageDetail/slider';
            $slider_array = array();
            $slider_json = '';
            if($request->file('slider_images')){ 
                foreach ($request->file('slider_images') as $key => $value) {
                    $now =  date("Ymdhis").rand(1,5000); 
                    if($value->isValid()){
                        if (!file_exists($slider_path)) {
                            mkdir($slider_path, 0777, true);
                        }
                        $slider_image = $now.".".$value->getClientOriginalExtension();
                        $value->move($slider_path,$slider_image);
                        array_push($slider_array, "landingpageDetail/slider/".$slider_image);
                    }
                }
            }
            $slider_json =  json_encode($slider_array);
        //Slieder Image Upload Ends

        //Service Image Upload Starts
            $service_path = storage_path().'/app/public/landingpageDetail/service';
            $service_array = array();
            if(isset($request->service) && !empty($request->service)){
                foreach ($request->service as $key => $value){
                    $now =  date("Ymdhis").rand(1,5000); 
                    if(array_key_exists('image',$value)){
                        if($value['image']->isValid()){
                            if (!file_exists($service_path)){
                                mkdir($service_path, 0777, true);
                            }
                            $service_image =$now.".".$value['image']->getClientOriginalExtension();
                            $value['image']->move($service_path,$service_image);
                        }
                        array_push($service_array, "landingpageDetail/service/".$service_image);
                    }else{
                        array_push($service_array, "");
                    }
                }
            }
        //Service Image Upload Ends

        //Team Image Upload Starts
            $team_path = storage_path().'/app/public/landingpageDetail/team';
            $team_array = array();
            if(isset($request->team_lead) && !empty($request->team_lead)){
                foreach ($request->team_lead as $key => $value) {
                    $now =  date("Ymdhis").rand(1,5000); 
                    if(array_key_exists('image',$value)){
                        if($value['image']->isValid()){
                            if (!file_exists($team_path)) {
                                mkdir($team_path, 0777, true);
                            }
                            $team_image =$now.".".$value['image']->getClientOriginalExtension();
                            $value['image']->move($team_path,$team_image);
                        }
                        array_push($team_array, "landingpageDetail/team/".$team_image);
                    }
                    else{
                        array_push($team_array, "");
                    }
                    
                }
            }
        //Team Image Upload Ends

        //Portfolio Image Upload Starts
            $portfolio_path = storage_path().'/app/public/landingpageDetail/portfolio';
            $portfolio_array = array();
            $portfolio_json = '';
            if($request->file('portfolio_images')){ 
                foreach ($request->file('portfolio_images') as $key => $value) {
                    $now =  date("Ymdhis").rand(1,5000); 
                    if($value->isValid()){
                        if (!file_exists($portfolio_path)) {
                            mkdir($portfolio_path, 0777, true);
                        }
                        $portfolio_image = $now.".".$value->getClientOriginalExtension();
                        $value->move($portfolio_path,$portfolio_image);
                        array_push($portfolio_array, "landingpageDetail/slider/".$portfolio_image);
                    }
                }
            }
            $portfolio_json =  json_encode($portfolio_array);
        //Portfolio Image Upload Ends

        $landingpageDetail = new LandingpageDetail();
        $landingpageDetail->user_id = Auth::user()->id;
        $landingpageDetail->template_id = Auth::user()->id;
        $landingpageDetail->name = $request->name;
        $landingpageDetail->slider_images = $slider_json;
        $landingpageDetail->service_main_heading =$request->serviceMainHeading;
        $landingpageDetail->portfolio_images =$portfolio_json;
        $landingpageDetail->testimonial1 =  $request->testimonial1;
        $landingpageDetail->testimonial2 = $request->testimonial2;
        $landingpageDetail->footer_details = $request->footer_details;
        $landingpageDetail->save();

        foreach ($request->service as $key => $value) { 
            if($value['sub_heading'] != ''){
                $landingpageServiceDetail = new LandingpageServiceDetail();
                $landingpageServiceDetail->landingpage_detail_id = $landingpageDetail->id;
                $landingpageServiceDetail->service_sub_heading = $value['sub_heading'];
                $landingpageServiceDetail->service_detail = $value['detail'];
                $landingpageServiceDetail->service_image = (isset($service_array[$key])) ?  $service_array[$key] : '';
                $landingpageServiceDetail->save();
            }
        }
        foreach ($request->team_lead as $key => $value) {
            if($value['name'] != ''){
                $landingpageTeamDetail = new LandingpageTeamDetail();
                $landingpageTeamDetail->landingpage_detail_id = $landingpageDetail->id;
                $landingpageTeamDetail->team_lead_name = $value['name'];
                $landingpageTeamDetail->team_lead_occupation = $value['occupation'];
                $landingpageTeamDetail->team_lead_email = $value['email'];
                $landingpageTeamDetail->team_lead_about = $value['about'];
                $landingpageTeamDetail->team_lead_image = (isset($team_array[$key])) ?  $team_array[$key] : '';
                $landingpageTeamDetail->save();
            }
        }
        foreach ($request->faq as $key => $value) {
            if($value['question'] != ''){
                $landingpageFaqDetail = new LandingpageFaqDetail();
                $landingpageFaqDetail->landingpage_detail_id = $landingpageDetail->id;
                $landingpageFaqDetail->faq_question = $value['question'];
                $landingpageFaqDetail->faq_answer = $value['answer'];
                $landingpageFaqDetail->save();
            }
        }

        return redirect()->route('Landingpage_details.index')->with('status', 'Data Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $landingpageDetail = LandingpageDetail::find($id);
       
        return view('landingpage_details.preview', ['landingpageDetail' => $landingpageDetail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $userwiseLandingpageDetail = UserwiseLandingpageDetail::find($id)->toArray();
        /*$landingpageServiceDetails =LandingpageServiceDetail::where("landingpage_detail_id",$id)->get()->toArray();
        $landingpageTeamDetails = LandingpageTeamDetail::where("landingpage_detail_id",$id)
            ->get()->toArray();
        $landingpageFaqDetails = LandingpageFaqDetail::where("landingpage_detail_id",$id)
            ->get()->toArray();*/

        return view('landingpage_details.edit', ['userwiseLandingpageDetail' => $userwiseLandingpageDetail]);
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $testimonial_json = json_encode($request->testimonial);
        $faq_json = json_encode($request->faq);
        $footer_json = json_encode($request->footer);
        $footer_link_json = json_encode($request->footer_link);
        
        //Slider Image Upload Starts
            $slider_path = storage_path().'/app/public/landingpageDetail/slider';
            $request_slider = $request->slider;
            $slider_json = '';
            $i=0;
            if(isset($request_slider) && !empty($request_slider)){
                foreach ($request_slider as $key => $value){
                    $now =  date("Ymdhis").rand(1,5000); 
                    if(array_key_exists('image',$value)){
                        if($value['image']->isValid()){
                            if (!file_exists($slider_path)){
                                mkdir($slider_path, 0777, true);
                            }
                            $slider_image =$now.".".$value['image']->getClientOriginalExtension();
                            $value['image']->move($slider_path,$slider_image);
                        }
                        $request_slider[$i]['slider_image'] = "landingpageDetail/slider/".$slider_image;
                    }elseif(array_key_exists('old_image',$value)){
                       $request_slider[$i]['slider_image'] = $value['old_image']; 
                    }
                    else{
                       $request_slider[$i]['slider_image'] = ""; 
                    }
                    unset($request_slider[$i]['image']);
                    $i++;
                }
            }
            $slider_json = json_encode($request_slider);
        //Slider Image Upload Ends

        //Service Image Upload Starts
            $service_path = storage_path().'/app/public/landingpageDetail/service';
            $request_service = $request->service;
            $service_json = '';
            $k=0;
            if(isset($request_service) && !empty($request_service)){
                foreach ($request_service as $key => $value){
                    $now =  date("Ymdhis").rand(1,5000); 
                    if(array_key_exists('image',$value)){
                        if($value['image']->isValid()){
                            if (!file_exists($service_path)){
                                mkdir($service_path, 0777, true);
                            }
                            $service_image =$now.".".$value['image']->getClientOriginalExtension();
                            $value['image']->move($service_path,$service_image);
                        }
                        $request_service[$k]['service_image'] = "landingpageDetail/service/".$service_image;
                    }elseif(array_key_exists('old_image',$value)){
                       $request_service[$k]['service_image'] = $value['old_image']; 
                    }else{
                       $request_service[$k]['service_image'] = ""; 
                    }
                    unset($request_service[$k]['image']);
                    $k++;
                }
            }
            $service_json = json_encode($request_service);
        //Service Image Upload Ends

        //Team Image Upload Starts
            $team_path = storage_path().'/app/public/landingpageDetail/team';
            $request_team = $request->team;
            $team_json = '';
            $j=0;
            if(isset($request_team) && !empty($request_team)){
                foreach ($request_team as $key => $value){
                    $now =  date("Ymdhis").rand(1,5000); 
                    if(array_key_exists('image',$value)){
                        if($value['image']->isValid()){
                            if (!file_exists($team_path)){
                                mkdir($team_path, 0777, true);
                            }
                            $team_image =$now.".".$value['image']->getClientOriginalExtension();
                            $value['image']->move($team_path,$team_image);
                        }
                        $request_team[$j]['team_image'] = "landingpageDetail/team/".$team_image;
                    }elseif(array_key_exists('old_image',$value)){
                       $request_team[$j]['team_image'] = $value['old_image']; 
                    }
                    else{
                       $request_team[$j]['team_image'] = ""; 
                    }
                    unset($request_team[$j]['image']);
                    $j++;
                }
            }
            $team_json = json_encode($request_team);
        //Team Image Upload Ends

        //Portfolio Image Upload Starts
            $portfolio_path = storage_path().'/app/public/landingpageDetail/portfolio';
            $portfolio_array = array();
            $portfolio_json = '';
            if($request->file('portfolio_images')){ 
                foreach ($request->file('portfolio_images') as $key => $value) {
                    $now =  date("Ymdhis").rand(1,5000); 
                    if($value->isValid()){
                        if (!file_exists($portfolio_path)) {
                            mkdir($portfolio_path, 0777, true);
                        }
                        $portfolio_image = $now.".".$value->getClientOriginalExtension();
                        $value->move($portfolio_path,$portfolio_image);
                        array_push($portfolio_array, "landingpageDetail/portfolio/".$portfolio_image);
                    }
                }
                $portfolio_json =  json_encode($portfolio_array);
            }else if($request->portfolio_old_images){
                $portfolio_json =  json_encode($request->portfolio_old_images);
            }
        //Portfolio Image Upload Ends

        $userwiseLandingpageDetail = UserwiseLandingpageDetail::find($id);
        $userwiseLandingpageDetail->slider_details = $slider_json;
        $userwiseLandingpageDetail->service_main_heading = $request->service_main_heading;
        $userwiseLandingpageDetail->service_other_details = $service_json;
        $userwiseLandingpageDetail->team_details = $team_json;
        $userwiseLandingpageDetail->portfolio_images = $portfolio_json;
        $userwiseLandingpageDetail->testimonial_details = $testimonial_json;
        $userwiseLandingpageDetail->faq_details = $faq_json;
        $userwiseLandingpageDetail->footer_details = $footer_json;
        $userwiseLandingpageDetail->footer_link_details = $footer_link_json;
        $userwiseLandingpageDetail->save();
       
        return redirect()->route('Landingpage_details.index')->with('status', 'Data Saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
