@extends('layouts.app')

@section('css')
    <style type="text/css">
       
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   <!-- <a class="btn btn-primary" href="{{route('Landingpage_details.create')}}"> Add New Landing Page</a> -->
                   Your Landing Pages
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>LandingPage Type</th>
                                <th>Preview</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $landingpage_detail)
                                <tr>
                                    <td>{{$landingpage_detail->landingpage_type}}</td>
                                    <!-- <td><a href=
                                        "{{route('Landingpage_details.show',$landingpage_detail->id)}}" target="_blank">Preview</a></td> -->
                                    <td>
                                        <a href="#" target="_blank">Preview</a>
                                    </td>
                                    <td>
                                        <a href=
                                        "{{route('Landingpage_details.edit',$landingpage_detail->id)}}" target="_blank">Edit</a>
                                    </td>  
                                   <!--  <td>
                                        <a href="#" target="_blank">Edit</a>
                                    </td> -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
