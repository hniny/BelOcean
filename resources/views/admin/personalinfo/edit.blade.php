@extends('adminlte::page')

@section('title', 'Personalinfos')

@section('content_header')

@stop

@section('content')
<section class="my-5">
<div class="container bg-white pb-5 mt-5">
    <div class="row border-top border-info ">
    <div class="col-lg-12 margin-tb py-3">
        <div class="float-left">
            <h2>Personal info</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-sm btn-secondary" href="{{ route('personalinfos.index') }}"> Back</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form action="{{route('personalinfos.update',$personalinfo->id)}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate files="true">
    @csrf
    @method('PUT')
    {{-- {{dd($personalinfo->address)}} --}}
    <div class="row mb-3">
        <div class="col-md-4 col-xs-12 col-sm-12">
            <label for="applied_cat_id">Post Applied For</label>
            <select class="form-control form-control-sm" name="applied_cat_id">
                @foreach ($appliedcategories as  $appliedcategory)
                <option value="{{$appliedcategory->id}}" @if ($appliedcategory->id == $personalinfo->applied_cat_id) selected @endif>{{$appliedcategory->cat_name}} </option>   
              @endforeach
                </select>
        </div>
        <div class="col-md-4 col-xs-12 col-sm-12">
            <label for="applied_date">Applied Date</label>
            <div class="input-append date dp" id="dp1" data-date-format="dd-mm-yyyy">
                <input class="span2 form-control form-control-sm" size="16" type="text"  value="{{ \Carbon\Carbon::parse($personalinfo->applied_date)->format('d-m-Y') }}" name="applied_date" ><span class="add-on"><i class="fa fa-calender"></i></span>
            </div>
            {{-- <input type="date" class="form-control form-control-sm" value="{{$personalinfo->applied_date}}" name="applied_date" > --}}
        </div>
        <div class="col-md-4 col-xs-12 col-sm-12">
            <label for="readiness">Readiness</label>
        <input type="text" class="form-control form-control-sm" value="{{$personalinfo->readiness}}" name="readiness" >
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12 col-sm-12 col-xs-12 py-2" style="background-color:#dff0d8">
            <div class="text-center">
                <h4>Personal Details</h4>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control form-control-sm" value="{{$personalinfo->name}}" name="name" required>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control form-control-sm" value="{{$personalinfo->age}}" name="age" required>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="date_birth">Date of Birth</label>
            <div class="input-append date dp" id="dp1" data-date-format="dd-mm-yyyy">
                <input class="span2 form-control form-control-sm" size="16" type="text"  value="{{ \Carbon\Carbon::parse($personalinfo->date_birth)->format('d-m-Y') }}" name="date_birth" ><span class="add-on"><i class="fa fa-calender"></i></span>
            </div>
            {{-- <input type="date" class="form-control form-control-sm" value="{{$personalinfo->date_birth}}" name="date_birth" required> --}}
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="place_birth">Place of Birth</label>
            <input type="text" class="form-control form-control-sm" value="{{$personalinfo->place_birth}}" name="place_birth" required>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="religion">Religion</label>
            <input type="text" class="form-control form-control-sm" value="{{$personalinfo->religion}}" name="religion" required>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="marital_status">Marital Status</label>
            <select class="form-control form-control-sm " name="marital_status">
                <option>Choose Marital Status</option>
                @foreach (config('marital.status') as $status=>$value)
                    <option value="{{$value}}" @if ($value == $personalinfo->marital_status) selected @endif>{{$value}} </option> 
                @endforeach
                </select>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="height">Height</label>
            <input type="text" class="form-control form-control-sm" value="{{$personalinfo->height}}" name="height" required>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="weight">Weight</label>
            <input type="text" value="{{$personalinfo->weight}}" class="form-control form-control-sm" name="weight">
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="education">Education</label>
            <input type="text" value="{{$personalinfo->education}}" class="form-control form-control-sm" name="education">
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="mark">Mark</label>
            <input type="text" value="{{$personalinfo->mark}}" class="form-control form-control-sm" name="mark">
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="father_name">Father Name</label>
            <input type="text" value="{{$personalinfo->father_name}}" class="form-control form-control-sm" name="father_name">
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="mother_name">Mother Name</label>
            <input type="text" value="{{$personalinfo->mother_name}}" class="form-control form-control-sm" name="mother_name">
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="shoe_size">Shoe Size</label>
            <input type="text" value="{{$personalinfo->shoe_size}}" class="form-control form-control-sm" name="shoe_size">
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="overall_size">Overall Size</label>
            <input type="text" value="{{$personalinfo->overall_size}}" class="form-control form-control-sm" name="overall_size">
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="next_kin">Next of kin</label>
            <input type="text" value="{{$personalinfo->next_kin}}" class="form-control form-control-sm" name="next_kin">
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="relation">Relation</label>
            <input type="text" value="{{$personalinfo->relation}}" class="form-control form-control-sm" name="relation">
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="address">Address</label><br>
            <input type="text" value="{{$personalinfo->address}}" class="form-control form-control-sm" name="address">
            
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="phone_no">Phone No</label>
            <input type="text" value="{{$personalinfo->phone_no}}" class="form-control form-control-sm" name="phone_no">
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control form-control-sm"  value="{{$personalinfo->email}}" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        
        <div class="col-md-3 col-xs-12 col-sm-12 form-group">
            <label for="person_img">Photo</label><br>
            <div class="row">
                <div class="col-md-12">
            @if ($personalinfo->person_img<>null)
            <div class="row pb-2" id="show-image-image" >
                <div class="col-md-3">
                    <div class="inline position-relative">
                        <div class="d-inline">
                            <img src="{{ url('public/profile/'.$personalinfo->person_img) }}" alt="" style="width:5rem;" id="show-image"> <br>
                        </div>
                        <span class="pl-3 position-absolute" id="show" style="top:0px;right:0px;padding-right:0px">
                            <a id="" class="btn-delete-image btn btn-sm btn-danger" data-id="{{$personalinfo->id}}" data-field="person_img" data-image="{{$personalinfo->person_img}}"><i class="fa fa-times"></i></a>
                        </span> 
                    </div>
                </div>
            </div>
            @endif
                <div class="col-md-12">
                    <input type="file" class="form-control form-control-sm " name="person_img">
                </div>
            </div>
                
        </div>
    </div>
    
    </div>
{{-- ****************personalinfos************ --}}

{{-- ****************seaman's documents************ --}}
<div class="row my-3">
    <div class="col-md-12 col-sm-12 col-xs-12 py-2" style="background-color:#dff0d8">
        <div class="text-center">
            <h4>Seaman's Document</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <table id="example1" class="table table-borderless table-sm">
        <thead>
        <tr class="success">
            <th>No</th>
            <th width="30%">Holding Certificates</th>
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
                    <td>
                        <input type="text" class="form-control form-control-sm border-0" value="{{$item->certificate->name}}" name="doc[{{$key}}][certificate_id]" required>
                        <input type="hidden" class="form-control form-control-sm border-0" value="{{$item->certificate->id}}" name="doc[{{$key}}][certificate_id]" required>
                        <input type="hidden" class="form-control form-control-sm border-0" value="{{$item->id}}" name="doc[{{$key}}][id]" required>
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm" name="doc[{{$key}}][certificate_no]" value="{{$item->certificate_no}}">
                    </td>
                    <td>
                        <div class="input-group">
                            {{-- {{dd($item->issued_date)}} --}}
                            @if (isset($item->issued_date))
                            
                            <div class="input-append date dp" id="dp3" data-date-format="dd-mm-yyyy">
                                <input class="span2 form-control form-control-sm" size="16" type="text" value="{{\Carbon\Carbon::parse($item->issued_date)->format('d-m-Y') }}"  name="doc[{{$key}}][issue_date{{$key}}]" ><span class="add-on"><i class="fa fa-calender"></i></span>
                            </div>
                            
                            @else
                            <div class="input-append date dp" id="dp5" data-date-format="dd-mm-yyyy">
                                <input class="span2 form-control form-control-sm" size="16" type="text" placeholder="dd-mm-yyyy"  name="doc[{{$key}}][issue_date{{$key}}]"   ><span class="add-on"><i class="fa fa-calender"></i></span>
                            </div>
                            @endif
                            
                            {{-- <input type="date" class="form-control form-control-sm issue_date" value="{{$item->issued_date}}"  name="doc[{{$key}}][issue_date{{$key}}]"> --}}
                        </div>
                    </td>
                    
                    <td>
                        <div class="input-group">
                            @if (isset($item->expire_date))
                            
                            <div class="input-append date dp" id="dp3" data-date-format="dd-mm-yyyy">
                                <input class="span2 form-control form-control-sm" size="16" type="text" value="{{\Carbon\Carbon::parse($item->expire_date)->format('d-m-Y') }}"  name="doc[{{$key}}][expire_date{{$key}}]" ><span class="add-on"><i class="fa fa-calender"></i></span>
                            </div>
                            
                            @else
                            <div class="input-append date dp" id="dp6" data-date-format="dd-mm-yyyy">
                                <input class="span2 form-control form-control-sm" size="16" type="text" placeholder="dd-mm-yyyy" name="doc[{{$key}}][expire_date{{$key}}]" ><span class="add-on"><i class="fa fa-calender"></i></span>
                            </div>
                            @endif
                            {{-- <div class="input-append date dp" id="dp3" data-date-format="dd-mm-yyyy">
                                <input class="span2 form-control form-control-sm" size="16" type="text" value="{{\Carbon\Carbon::parse($item->expire_date)->format('d-m-Y') }}"  name="doc[{{$key}}][expire_date{{$key}}]" ><span class="add-on"><i class="fa fa-calender"></i></span>
                            </div> --}}
                            {{-- <input type="date" class="form-control form-control-sm expire_date" value="{{$item->expire_date}}"  name="doc[{{$key}}][expire_date{{$key}}]"> --}}
                        </div>
                    </td>
                    
                    <td>
                        <div class="form-group">
                            @if ($item->attach_file<>null)
                            <div class="row pb-2" id="show-image-business" >
                                <div class="col-md-3">
                                    <div class="inline position-relative">
                                        @if ($item->certificate->status == 1 && $item->attach_file != null)
                                        <div class="d-inline" >
                                            <i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 4rem; color: rgb(10, 131, 245)"></i>
                                            <input type="hidden" name="doc[{{$key}}][old_pdf{{$key}}]" value="{{$item->attach_file}}">
                                        </div>
                                        @endif 
                                        <span class="pl-3 position-absolute" id="show" style="top:0px;right:0px;">
                                            <a id="" class="btn-delete-pdf btn btn-sm btn-danger" data-id="{{$item->id}}" data-field="attach_file" data-pdf="{{$item->attach_file}}"><i class="fa fa-times" style="font-size: 15px;"></i></a>
                                        </span> 
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if ($item->certificate->status == 1 || $item->certificate->status == 2)
                            <div class="input-group">
                                <input type="file" class="f form-control form-control-sm border-0" name="doc[{{$key}}][attach_file{{$key}}]">
                            </div>
                            @endif 
                            
                            <input type="hidden" name="doc[{{$key}}][attach_file{{$key}}]" class="form-control form-control-sm" value="{{$item->attach_file}}">
                           
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>

{{-- **************************seaman's Document********************************* --}}

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
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="repeater">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="float-right">
                            <input data-repeater-create class="btn btn-success" type="button" value="Add Vessel"/>
                        </div>
                    </div><br><br>
                
                        <div data-repeater-list="sea_services">
                            {{-- {{dd(count($seaservices))}} --}}
                            {{-- <table class="table table-borderless table-sm">
                                <thead>
                                    <tr>
                                        <th width="10%">Name of<br>Vessel</th>
                                        <th>Rank</th>
                                        <th>Type</th>
                                        <th>GRT</th>
                                        <th>BHP</th>
                                        <th>Main<br>Engine</th>
                                        <th width="18%">Sign On</th>
                                        <th width="16%" class="pr-0">Sign Off</th>
                                        <th width="8%" class="pl-0">Service<br>Onboard</th>
                                        <th width="12%">Ship<br> Owner</th>
                                    </tr>
                                </thead>
                            </table> --}}
                            @if(isset($seaservices) && count($seaservices) != 0)
                                @foreach ($seaservices as $item)
                                {{-- {{dd($item)}} --}}
                                    <div data-repeater-item>
                                        {{-- {{dd($ac)}} --}}
                                        <div class="row">
                                            <div class="col pr-0 form-group" >
                                                <div class="col"> Name of Vessel</div>
                                                <input type="text" class="form-control form-control-sm" name="name_of_vessel" value="{{$item->name_of_vessel}}" style="width: 5rem">
                                            </div>
                                            <div class="col pr-0 form-group">
                                                <div class="col">Rank</div><br><br>
                                                <input type="text" class="form-control form-control-sm" name="rank" value="{{$item->rank}}">
                                            </div>
                                            <div class="col pr-0 form-group">
                                                <div class="col">Type</div><br><br>
                                                <select class="form-control form-control-sm " name="vessel_id" required>
                                                    @if ($item->vessel_id == 0)
                                                    <option value="0">Type</option>
                                                    @foreach ($vessels as $item)
                                                        <option value="{{$item->id}}">{{$item->vsl_name}}</option>
                                                    @endforeach
                                                    @else
                                                    @foreach ($vessels as $vessel)
                            
                                                    <option value="{{$vessel->id}}" @if ($vessel->id == $item->vessel_id) selected @endif>{{$vessel->vsl_name}} </option>   
                                                    @endforeach
                                                    @endif
                                                   
                                                </select>
                                            </div>
                                            <div class="col pr-0 form-group">
                                                <div class="col">GRT</div><br><br>
                                                <input type="text" class="form-control form-control-sm" name="grt" value="{{$item->grt}}">
                                            </div>
                                            <div class="col pr-0 form-group">
                                                <div class="col">BHP</div><br><br>
                                                <input type="text" class="form-control form-control-sm" name="bph" value="{{$item->bph}}">
                                            </div>
                                            <div class="col pr-0 form-group">
                                                <div class="col">Main Engine</div><br>
                                                <input type="text" class="form-control form-control-sm" name="main_engine" value="{{$item->main_engine}}">
                                            </div>
                                            <div class="col pr-0 form-group">
                                                <div class="col">Sign On</div><br>
                                                @if (isset($item->sign_on_date))
                            

                                                <div class="input-append date dp" id="dp3" data-date-format="dd-mm-yyyy">
                                                    <input class="span2 form-control form-control-sm" size="16" type="text" value="{{\Carbon\Carbon::parse($item->sign_on_date)->format('d-m-Y') }}"  name="sign_on_date" id="sign_on_date" ><span class="add-on"><i class="fa fa-calender"></i></span>
                                                </div>
                            
                                                @else
                                                <div class="input-append date dp" id="dp5" data-date-format="dd-mm-yyyy">
                                                    <input class="span2 form-control form-control-sm" size="16" type="text" placeholder="dd-mm-yyyy" name="sign_on_date" id="sign_on_date"><span class="add-on"><i class="fa fa-calender"></i></span>
                                                </div>
                                                @endif
                                                
                                                {{-- <input type="date" class="form-control form-control-sm" name="sign_on_date" id="sign_on_date" value="{{$item->sign_on_date}}"> --}}
                                            </div>
                                            <div class="col pr-0 form-group">
                                                <div class="col">Sign Off</div><br>
                                                @if (isset($item->sign_on_date))
                            

                                                <div class="input-append date dp" id="dp3" data-date-format="dd-mm-yyyy">
                                                    <input class="span2 form-control form-control-sm" size="16" type="text" value="{{\Carbon\Carbon::parse($item->sign_off_date)->format('d-m-Y') }}"  name="sign_off_date" id="sign_off_date" ><span class="add-on"><i class="fa fa-calender"></i></span>
                                                </div>
                            
                                                @else
                                                <div class="input-append date dp" id="dp5" data-date-format="dd-mm-yyyy">
                                                    <input class="span2 form-control form-control-sm" size="16" type="text" placeholder="dd-mm-yyyy" name="sign_off_date" id="sign_off_date"><span class="add-on"><i class="fa fa-calender"></i></span>
                                                </div>
                                                @endif
                                                
                                                {{-- <input type="date" class="form-control form-control-sm" name="sign_off_date" id="sign_off_date" value="{{$item->sign_off_date}}"> --}}
                                            </div>
                                            <div class="col pr-0 form-group">
                                                <div class="col">Service Onboard</div><br>
                                                <input type="text" class="form-control form-control-sm" name="service_onboard" id="service_onboard" value="{{$item->service_onboard}}">
                                            </div>
                                            <div class="col pr-0 form-group">
                                                <div class="col">Ship Owner</div><br>
                                                <input type="text" class="form-control form-control-sm" name="ship_owner" value="{{$item->ship_owner}}">
                                            </div>
                                            <div class="col-md-1 pr-0 text-right" style="padding-top:4.3rem;">
                                            <input data-repeater-delete type="button" value="Remove" class="btn btn-danger btn-sm"/>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                            <div data-repeater-item>
                                <div class="row">
                                    <div class="col pr-0 form-group" >
                                        <input type="text" class="form-control form-control-sm" name="name_of_vessel" style="width: 5rem">
                                    </div>
                                    <div class="col pr-0 form-group">
                                        <input type="text" class="form-control form-control-sm" name="rank">
                                    </div>
                                    <div class="col pr-0 form-group">
                                        <select class="form-control form-control-sm " name="vessel_id" required>
                                            <option value="0">Type</option>
                                            @foreach ($vessels as $item)
                                                <option value="{{$item->id}}">{{$item->vsl_name}}</option>
                                            @endforeach
                                            </select>
                                        </select>
                                    </div>
                                    <div class="col pr-0 form-group">
                                        <input type="text" class="form-control form-control-sm" name="grt" >
                                    </div>
                                    <div class="col pr-0 form-group">
                                        <input type="text" class="form-control form-control-sm" name="rank" >
                                    </div>
                                    <div class="col pr-0 form-group">
                                        <input type="text" class="form-control form-control-sm" name="rank" >
                                    </div>
                                    <div class="col pr-0 form-group">
                                        <div class="col">Sign On</div><br>
                                        @if (isset($item->sign_on_date))
                            

                                        <div class="input-append date dp" id="dp3" data-date-format="dd-mm-yyyy">
                                            <input class="span2 form-control form-control-sm" size="16" type="text" value="{{\Carbon\Carbon::parse($item->sign_on_date)->format('d-m-Y') }}"  name="sign_on_date" id="sign_on_date" ><span class="add-on"><i class="fa fa-calender"></i></span>
                                        </div>
                            
                                        @else
                                        <div class="input-append date dp" id="dp5" data-date-format="dd-mm-yyyy">
                                            <input class="span2 form-control form-control-sm" size="16" type="text" placeholder="dd-mm-yyyy" name="sign_on_date" id="sign_on_date"><span class="add-on"><i class="fa fa-calender"></i></span>
                                        </div>
                                        @endif
                                                
                                        {{-- <input type="date" class="form-control form-control-sm" name="sign_on_date" id="sign_on_date" value="{{$item->sign_on_date}}"> --}}
                                    </div>
                                    <div class="col pr-0 form-group">
                                        <div class="col">Sign Off</div><br>
                                        @if (isset($item->sign_on_date))
                            

                                        <div class="input-append date dp" id="dp3" data-date-format="dd-mm-yyyy">
                                            <input class="span2 form-control form-control-sm" size="16" type="text" value="{{\Carbon\Carbon::parse($item->sign_off_date)->format('d-m-Y') }}"  name="sign_off_date" id="sign_off_date" ><span class="add-on"><i class="fa fa-calender"></i></span>
                                        </div>
                            
                                        @else
                                        <div class="input-append date dp" id="dp5" data-date-format="dd-mm-yyyy">
                                            <input class="span2 form-control form-control-sm" size="16" type="text" placeholder="dd-mm-yyyy" name="sign_off_date" id="sign_off_date"><span class="add-on"><i class="fa fa-calender"></i></span>
                                        </div>
                                        @endif
                                                
                                        {{-- <input type="date" class="form-control form-control-sm" name="sign_off_date" id="sign_off_date" value="{{$item->sign_off_date}}"> --}}
                                    </div>
                                    {{-- <div class="col pr-0 form-group">
                                        <input type="date" class="form-control form-control-sm" name="sign_on_date" id="sign_on_date">
                                    </div>
                                    <div class="col pr-0 form-group">
                                        <input type="date" class="form-control form-control-sm" name="sign_off_date" id="sign_off_date" >
                                    </div> --}}
                                    <div class="col pr-0 form-group">
                                        <input type="text" class="form-control form-control-sm" name="service_onboard" id="service_onboard" >
                                    </div>
                                    <div class="col pr-0 form-group">
                                        <input type="text" class="form-control form-control-sm" name="ship_owner">
                                    </div>
                                    <div class="col-md-1 pr-0 text-right" style="padding-top:0px;">
                                        <input data-repeater-delete type="button" value="Remove" class="btn btn-danger btn-sm"/>
                                    </div>
                                </div>
                            </div>
                            @endif
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    
{{-- ****************sea service************ --}}

{{-- ****************declarations************ --}}

<div class="row mb-3">
    <div class="col-md-12 col-sm-12 col-xs-12 py-2" style="background-color:#dff0d8">
        <div class="text-center">
            <h4>Declarations</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <table class="table table-borderless">
            <thead>
              <tr class="text-uppercase">
                           
                <th scope="col" width="40%">Holding Certificates</th>
                <th scope="col" width="10%">Yes</th>
                <th scope="col" width="10%">No</th>
                <th scope="col" >If Yes, Please Provide Details</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($declarations as $key=>$declaration)
                <tr>  
                    {{-- <td>{{$declaration->information->bg_name}}</td> --}}
                    <td>
                        <input type="text" class="form-control form-control-sm border-0" name="status[{{$key}}][bg_id]" value="{{$declaration->information->bg_name}}" required>
                        {{-- <input type="text" name="status[{{$key}}][bg_id]" 
                        value="{{$declaration->information->bg_name}}"> --}}
                        <input type="hidden" class="form-control form-control-sm border-0" name="status[{{$key}}][bg_id]" value="{{$declaration->information->id}}">
                    </td>
                <td>
                    <div class="form-check">
                    <label class="form-check-label" for="radio1">
                    <input type="radio"  id="option1" name="status[{{$key}}][bg-info{{$key}}]" value="0"  {{ ($declaration->status=="0")? "checked" : "" }} ></label>
                    </label>
                    </div>
                </td>
                <td>
                    <div class="form-check">
                    <label class="form-check-label" for="radio2">
                        <input type="radio" id="option2" name="status[{{$key}}][bg-info{{$key}}]" value="1" {{ ($declaration->status=="1")? "checked" : "" }} ></label>
                    </label>
                    </div>
                </td>
                <td><input type="text" class="form-control" name="status[{{$key}}][descri]" value="{{$declaration->description}}"></td>
                <input type="hidden" name="status[{{$key}}][id]" value="{{$declaration->id}}">
                </tr>
                @endforeach     
            </tbody>
        </table>
    </div>
</div>
{{-- **************************declaration*********************** --}}

{{-- submit --}}
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="float-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{{-- submit --}}
    </form>
    </div>
</section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href='bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
<script src="{{ asset('js/repeater.js') }}"></script>
<script src="{{ asset('js/validate.js') }}"></script>
<script src="{{ asset('js/jquery_ui.js') }}"></script>
  <script>
    $(document).ready(function () {
        $('.dp ').datepicker();
        $('.f').change(function(){
            var file=this.files[0];
            console.log('file',file.name);
            var id=$(this).data('id'); 
            console.log('id',id);

            var attach="#attach_file"+id; 
            // var file = $('#attach_file1').val();
            // var file = $('"'+attach+'"').files[0];
            if(id == 1){  //Passport
                var maxSizeMb = 4;
            }else if(id == 2){ //SIRD
                var maxSizeMb = 2;
            }else if(id == 3){ //COC
                var maxSizeMb = 4;
            }else if(id == 31){ //Old CDC
                var maxSizeMb = 15;
            }else if(id == 32){ //Old COC
                var maxSizeMb = 15;
            }else if(id == 33){ //Medical Certificate
                var maxSizeMb = 3;
            }else if(id == 34){ //Medical Record Book
                var maxSizeMb = 8;
            }else if(id == 35){ //Yellow Book
                var maxSizeMb = 3;
            }else if(id == 36){ //SID
                var maxSizeMb = 1;
            }else if(id == 37){ //PANAMA CDC
                var maxSizeMb = 4;
            }else if(id == 38){ //PANAMA Coc
                var maxSizeMb = 4;
            }else if(id == 39){ //Certificate Verfication
                var maxSizeMb = 2;
            }

            console.log('maxSizeMb',maxSizeMb);
            // if(file !== undefined){
           
                var totalSize = this.files[0].size;
                console.log('total size',totalSize);

                //Convert bytes into MB.
                var totalSizeMb = totalSize  / Math.pow(1024,2);
                console.log('total size mb',totalSizeMb);

                //Check to see if it is too large.
                if(totalSizeMb > maxSizeMb){
                    // console.log('ddd');

                    //Create an error message to show to the user.
                    var errorMsg = 'File too large. Maximum file size is ' + maxSizeMb + 'MB. Selected file is ' + totalSizeMb.toFixed(2) + 'MB';
                 
                   alert( errorMsg);
                   $('#attach_file'+id).remove();
                    var input = $("<input>")
                                .attr({
                                    type: 'file',
                                    id: 'fileinput',
                                    name: 'attach_file'+id
                                    });
                   
                    $('#attach_files'+id).append(input);
                    //Return FALSE.
                    return false;
                }
           // }
            
        });
        $('.btn-delete-pdf').click(function(e){
            var id=$(this).data('id');
            var field=$(this).data('field');
            var pdf=$(this).data('pdf');
            if(confirm("Are you sure want to delete this attach file"))
            {
                $.ajax({
                    url:"/admin/personalinfos/"+id+"/delete/"+field+"/pdf/"+pdf,
                    type:'get',
                    success:function(data){
                        $('#show-image'+id).fadeOut(10);
                        $('#show'+id).fadeOut(10);
                    }
                });
            }
        });
        $('.btn-delete-image').click(function(e){
            var id=$(this).data('id');
            var field=$(this).data('field');
            console.log(field)
            var image=$(this).data('image');
            console.log(image)
            if(confirm("Are you sure want to delete this image"))
            {
                $.ajax({
                    url:"/admin/personalinfos/"+id+"/delete/"+field+"/image/"+image,
                    type:'get',
                    success:function(data){
                        console.log(data);
                        $('#show-image').fadeOut(10);
                        $('#show').fadeOut(10);
                    }
                });
            }
        });
        $('.repeater').repeater({
            initEmpty: false,
            defaultValues: {
                'text-input': 'foo'
            },            
            show: function () {
                $(this).slideDown();
            },
            
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
           
            ready: function (setIndexes) {
                // $dragAndDrop.on('drop', setIndexes);
            },
            isFirstItemUndeletable: true
           
        });

        
       
        Date.monthsDiff= function(day1,day2){
            console.log('date1',day1);
                var d1= day1,d2= day2;
                if(day1<day2){
                    d1= day2;
                    d2= day1;
                }
                var m= (d1.getFullYear()-d2.getFullYear())*12+(d1.getMonth()-d2.getMonth());
                if(d1.getDate()<d2.getDate()) --m;
                return m;
        }         

    });

    function selectItemChange(index,name){   
        // console.log('data',index,name);
        setItemNo(index);
        // allSum();
    }     
               
    function setItemNo(index) { 
            var start_date = $('#sign_on_date'+index).val().split("-").reverse().join("-");
            var end_date = $('#sign_off_date'+index).val().split("-").reverse().join("-");
            var day1 = new Date(start_date);
            var day2 = new Date(end_date);
                console.log('Day1', day1);
                console.log('Day2', day2);
                var d1= day1,d2= day2;
                if(day1<day2){
                    d1= day2;
                    d2= day1;
                }
            var m= (d1.getFullYear()-d2.getFullYear())*12+(d1.getMonth()-d2.getMonth());
            if(d1.getDate()<d2.getDate()) 
            --m;
            console.log('m',m);
            if(m>0){
                $("#service_onboard"+index).val(m+'M');
            }
       
    }
  </script>
@stop