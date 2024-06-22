@extends('adminlte::page')

@section('title', 'PersonalInfos Show')

@section('content_header')

@stop

@section('content')
<div class="container bg-white pb-5 mt-5">
    <div class="row border-top border-info ">
        <div class="col-lg-12 margin-tb py-3">
            <div class="float-left">
                <h2> Show <span class="text-info">{{$personalinfo->name}}</span> Details</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary btn-sm" href="{{ route('personalinfos.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <table class="table table-bordered table-sm">
                <tr>
                    <td width="20%"><strong>Post Applied For</strong></td>
                    <td width="20%">{{$personalinfo->applied_cat->cat_name}}</td>
                    <td width="10%"><strong>Applied Date</strong></td>
                    <td width="20%">{{\Carbon\Carbon::parse($personalinfo->applied_date)->format('d-m-Y') }}</td>
                    <td width="10%"><strong>Readiness</strong></td>
                    <td width="20%">{{$personalinfo->readiness}}</td>
                </tr>
            </table>
        </div>
    </div>
    {{-- *****************personal info************************** --}}
    <div class="row mb-3">
        <div class="col-md-12 col-sm-12 col-xs-12 py-2" style="background-color:#dff0d8">
            <div class="text-center">
                <h4>Personal Details</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <table class="table table-bordered table-sm">
                <tbody>
                  <tr>
                    <td width="20%"><strong> Name</strong></td>
                  <td width="30%">{{$personalinfo->name}}</td>
                    <td width="15%"><strong>Date of Birth</strong></td>
                    <td width="15%">{{\Carbon\Carbon::parse($personalinfo->date_birth)->format('d-m-Y') }}</td>
                    <td width="20%" rowspan="8" style="border: 0" ><img src="{{ url('public/profile/'.$personalinfo->person_img) }}" alt="" style="padding: 1rem;width:12.5rem;height:15rem"></td>                 
                  </tr>
                  <tr>
                    <td><strong>Age</strong></td>
                    <td>{{$personalinfo->age}}</td>
                    <td><strong>Place of Birth<strong></td>
                    <td>{{$personalinfo->place_birth}}</td>
                                        
                  </tr>

                  <tr>
                    <td><strong>Religion</strong> </td>
                    <td>{{$personalinfo->religion}}</td>
                    <td><strong>Marital Status</strong></td>
                    <td>{{$personalinfo->marital_status}}</td>
                                        
                  </tr>
                  <tr>
                    <td><strong>Height</strong></td>
                    <td>{{$personalinfo->height}}</td>
                    <td><strong>Weight</strong></td>
                    <td>{{$personalinfo->weight}}</td>
                                       
                  </tr>
                  <tr>
                    <td><strong>Education</strong></td>
                    <td>{{$personalinfo->education}}</td>
                    <td><strong>Mark</strong></td>
                    <td>{{$personalinfo->mark}}</td>
                   
                  </tr>
                  <tr>
                    <td><strong>Father Name</strong></td>
                    <td>{{$personalinfo->father_name}}</td>
                    <td><strong>Mother Name</strong></td>
                    <td>{{$personalinfo->mother_name}}</td>
                                        
                  </tr>
                  <tr>
                    <td><strong>Shoe size</strong></td>
                    <td>{{$personalinfo->shoe_size}}</td>
                    <td><strong>Overall size</strong></td>
                    <td>{{$personalinfo->overall_size}}</td>
                                        
                  </tr>
                  <tr>
                    <td><strong>Next of kin</strong></td>
                    <td>{{$personalinfo->next_kin}}</td>
                    <td><strong>Relation</strong></td>
                    <td>{{$personalinfo->relation}}</td>
                                        
                  </tr>
                  <tr>
                    <td rowspan="2"><strong>Address</strong></td>
                    <td rowspan="2">{{$personalinfo->address}}</td>
                    <td><strong>Phone No</strong></td>
                    <td colspan="2">{{$personalinfo->phone_no}}</td>
                                       
                  </tr>
                  <tr>
                    <td><strong>Email</strong></td>
                    <td colspan="2">{{$personalinfo->email}}</td>
                  </tr>


                </tbody>
              </table>
        </div>
    </div>
    {{-- *****************personal info************************** --}}

    {{-- ****************seamam's Document************ --}}  
    <div class="row my-3">
        <div class="col-md-12 col-sm-12 col-xs-12 py-2" style="background-color:#dff0d8">
            <div class="text-center">
                <h4>Seaman's Document</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <table id="example1" class="table table-bordered table-sm">
                <thead>
                <tr class="success">
                    <th>No</th>
                    <th>Holding Certificates</th>
                    <th>Number</th>
                    <th>Date of Issues</th>
                    <th>Date of Expire</th>
                    <th>Attach File</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($seadocs as $key=>$item)
                        <tr>
                        <td>{{++$key}}</td>
                            <td>{{$item->certificate->name}}</td>
                            <td>{{$item->certificate_no}}</td>
                           @if ($item->issued_date != null)
                            <td>{{\Carbon\Carbon::parse($item->issued_date)->format('d-m-Y') }}</td>   
                           @else
                            <td>{{$item->issued_date}}</td>   
                           @endif                
                           @if ($item->expire_date != null)
                           <td>{{\Carbon\Carbon::parse($item->expire_date)->format('d-m-Y') }}</td>   
                           @else
                            <td>{{$item->expire_date}}</td>   
                           @endif                
                                                
                            <td>                
                            @if ($item->certificate->status == 1 && $item->attach_file != null)
                            <a href="/public/attach/{{$item->attach_file}}" class="btn btn-info btn-sm" target="_blank">View Attach File</a> 
                            @endif  
                        </td>                
                        </tr>
                    @endforeach
                </tbody>
                </table>
        </div>
    </div>

     {{-- ****************seamam's Document************ --}}

    {{-- **************************sea service********************************* --}}
    <div class="row mt-3 mb-3">
        <div class="col-md-12 col-sm-12 col-xs-12 py-2" style="background-color:#dff0d8">
            <div class="text-center">
                <h4>Previous Sea Service</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                    <th scope="col">Name of Vessel</th>
                    <th scope="col">Rank</th>
                    <th scope="col" width="20%">Type</th>
                    <th scope="col">GRT</th>
                    <th scope="col">BHP</th>
                    <th scope="col">Main Engine</th>
                    <th scope="col">Sign on</th>
                    <th scope="col">Sign off</th>
                    <th scope="col">Service Onboard</th>
                    <th scope="col">Ship Owner</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($seaservices as $item)
                <tr>
                    <td width="20%">{{$item->name_of_vessel}}</td>
                    <td>{{$item->rank}}</td>   
                    @if ($item->vessel_id == 0)
                    <td>-</td>
                    @else 
                    <td>{{$item->vessel->vsl_name ? $item->vessel->vsl_name : ''}}</td>
                    @endif
                    <td>{{$item->grt}}</td>
                    <td>{{$item->bph}}</td>
                    <td>{{$item->main_engine}}</td>
                    @if ($item->sign_on_date != null)
                    <td width="20%">{{\Carbon\Carbon::parse($item->sign_on_date)->format('d-m-Y') }}</td>   
                    @else
                    <td width="20%">{{$item->sign_on_date}}</td>   
                    @endif 
                    @if ($item->sign_off_date != null)
                    <td width="20%">{{\Carbon\Carbon::parse($item->sign_off_date)->format('d-m-Y') }}</td>   
                    @else
                    <td width="20%">{{$item->sign_off_date}}</td>   
                    @endif 
                    

                    <td>{{$item->service_onboard}}</td>
                    <td>{{$item->ship_owner}}</td>
                   
                </tr>
                @endforeach
                </tbody>
            </table>  
        </div>
    </div>
    {{-- **************************sea service********************************* --}}

    {{-- ****************declaration************ --}}

    <div class="row mb-3">
        <div class="col-md-12 col-sm-12 col-xs-12 py-2" style="background-color:#dff0d8">
            <div class="text-center">
                <h4>Declarations</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <table class="table table-bordered table-sm">
                <thead>
                  <tr class="text-uppercase">
                           
                    <th scope="col" width="40%">Background informations</th>
                    <th scope="col" width="10%">Yes</th>
                    <th scope="col" width="10%">No</th>
                    <th scope="col" >If Yes, Please Provide Details</th>
                  </tr>
                </thead>
                <tbody>        
                    @foreach ($declarations as $declaration)
                    <tr>  
                        <td>{{$declaration->information->bg_name}}</td>
                    <td>
                        <div class="form-check">
                        <label class="form-check-label" for="radio1">
                        <input type="radio"  id="option1" name="status{{$declaration->id}}" value="1"  {{ ($declaration->status=="0")? "checked" : "" }} ></label>
                        </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                        <label class="form-check-label" for="radio2">
                            <input type="radio" id="option2" name="status{{$declaration->id}}" value="2" {{ ($declaration->status=="1")? "checked" : "" }} >
                        </label>
                        </div>
                    </td>
                    <td>{{$declaration->description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- **************************declaration*********************** --}}
</div>

{{-- <div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <object data=”/public/attach/20201221081335.pdf" type=”application/pdf” width=”100%” height=”100%”>
        </div>
    </div>
</div> --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop