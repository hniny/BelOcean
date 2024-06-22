<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belocean Myanmar</title>
    <meta name="description" content="Belocen Myanmar">
    <meta name="keywords" content="Belocen Myanmar">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    
</head>
<body>
<section class="my-5">
<div class="container bg-white pb-5 shadow-lg p-3 mb-5  rounded">
    <div class="row pb-0">
        <div class="col-lg-12 col-md-12 margin-tb py-3">
            <img src="images/pdf-logo.jpg" alt="" srcset="">
        </div>   
        {{-- <div class="col-lg-8 col-md-8 margin-tb py-3">
            <h3 style="font-family: 'Roboto', sans-serif;color:#0049cc;" class="pt-4 text-center">BELOCEAN SHIP MANAGEMENT</h3>
        </div>
        <div class="col-lg-2 col-md-2 margin-tb py-3">
            <img src="http://local.belocean/public/images/logo11.png" class="pt-4" alt="" srcset="">
        </div>
         --}}
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb py-3">
            <div class="text-center border-top border-bottom py-3">
                <h2 class="header" style="color: #0049cc">"Only for Myanmar Seafarer"</h2>
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
    @if ($message = Session::get('success'))
    
    
        <div class="alert" style="background-color: #a6ee8a;border-color:#a6ee8a">
            <p class="pb-0">{{ $message }}</p>
        </div>
    @endif
    <form action="{{route('personal.store')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf
        {{-- {{dd($appliedcategories)}} --}}
        <div class="row mb-3">
            <div class="col-md-4 col-xs-12 col-sm-12">
                <label for="applied_cat_id">Post Applied For</label>
                <select class="form-control form-control-sm" name="applied_cat_id">
                    <option>Choose Post Applied</option>
            
                    @foreach ($appliedcategories as $key=>$appliedcategory)
                        <option value="{{$appliedcategory->id}}">{{$appliedcategory->cat_name}}</option>
                    @endforeach
                    </select>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-12">
                <label for="readiness">Applied Date</label>
                <div class="input-append date dp" id="dp1" data-date-format="dd-mm-yyyy">
                    <input class="span2 form-control form-control-sm" size="16" type="text" placeholder="dd-mm-yyyy" name="applied_date" ><span class="add-on"><i class="fa fa-calender"></i></span>
                </div>
                {{-- <input type="date" class="form-control form-control-sm" name="applied_date" > --}}
            </div>
            <div class="col-md-4 col-xs-12 col-sm-12">
                <label for="readiness">Readiness</label>
                <input type="text" class="form-control form-control-sm" name="readiness" >
            </div>
            
        </div>
        <div class="row mb-3">
            <div class="col-md-12 col-sm-12 col-xs-12 py-2" style="background-color:#dff0d8">
                <div class="text-center">
                    <h4 class="text-uppercase text-second-color">Personal Details</h4>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control form-control-sm" name="name" required>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control form-control-sm" name="age" required>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="date_birth">Date of Birth</label>
                <div class="input-append date dp" id="dp2" data-date-format="dd-mm-yyyy">
                    <input class="span2 form-control form-control-sm" size="16" type="text" placeholder="dd-mm-yyyy" name="date_birth" required ><span class="add-on"><i class="fa fa-calender"></i></span>
                </div>
                {{-- <input type="date" class="form-control form-control-sm" name="date_birth" required> --}}
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="place_birth">Place of Birth</label>
                <input type="text" class="form-control form-control-sm" name="place_birth" required>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="religion">Religion</label>
                <input type="text" class="form-control form-control-sm" name="religion" required>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="marital_status">Marital Status</label>
                <select class="form-control form-control-sm " name="marital_status">
                    <option>Choose Marital Status</option>
                    @foreach (config('marital.status') as $status=>$value)
                        <option value="{{$value}}">{{$value}}</option>
                    @endforeach
                    </select>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="height">Height</label>
                <input type="text" class="form-control form-control-sm" name="height" required>
                <small id="emailHelp" class="form-text text-muted">Please enter with "cm".</small>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="weight">Weight</label>
                <input type="text" class="form-control form-control-sm" name="weight" required>
                <small id="emailHelp" class="form-text text-muted">Please enter with "Lbs".</small>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="education">Education</label>
                <input type="text" class="form-control form-control-sm" name="education" required>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="mark">Mark</label>
                <input type="text" class="form-control form-control-sm" name="mark" required>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="father_name">Father Name</label>
                <input type="text" class="form-control form-control-sm" name="father_name" required>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="mother_name">Mother Name</label>
                <input type="text" class="form-control form-control-sm" name="mother_name" required>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="shoe_size">Shoe Size</label>
                <input type="text" class="form-control form-control-sm" name="shoe_size" required> 
                <small id="emailHelp" class="form-text text-muted">Please enter with "cm".</small>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="overall_size">Overall Size</label>
                <input type="text" class="form-control form-control-sm" name="overall_size" required>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="next_kin">Next of kin</label>
                <input type="text" class="form-control form-control-sm" name="next_kin" required>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="relation">Relation</label>
                <input type="text" class="form-control form-control-sm" name="relation" required>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="address">Address</label><br>
                <textarea name="address" id="address" cols="30" rows="3" class="form-control form-control-sm" required></textarea>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="phone_no">Phone No</label>
                <input type="text" class="form-control form-control-sm" name="phone_no" required>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 form-group">
                <label for="person_img">Photo</label>
                <input type="file" class="form-control form-control-sm" name="person_img" required>
        
            </div>

        </div>
    {{-- ****************personalinfos************ --}}
    <div class="row my-3">
        <div class="col-md-12 col-sm-12 col-xs-12 py-2" style="background-color:#dff0d8">
            <div class="text-center">
                <h4 class="text-uppercase text-second-color">Seaman's Document</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <table id="example1" class="table table-borderless table-sm">
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
                @foreach ($certificates as $key=>$item)
                    <tr>
                    <td>{{++$key}}</td>
                        <td>{{$item->name}}</td>
                        @if ($item->id ==1 || $item->id == 2 || $item->id == 3)
                        <td><input type="text" class="form-control form-control-sm" name="number{{$item->id}}" placeholder="Enter Number" required></td>
                        <td>
                            <div class="input-group">
                                <div class="input-append date dp" id="dp3" data-date-format="dd-mm-yyyy">
                                    <input class="span2 form-control form-control-sm" size="16" type="text" placeholder="dd-mm-yyyy" name="date_issue{{$item->id}}" required ><span class="add-on"><i class="fa fa-calender"></i></span>
                                </div>
                                {{-- <input type="date" class="form-control form-control-sm issue_date" placeholder="Date Issue"  name="date_issue{{$item->id}}" required> --}}
                            </div>
                        </td>
                
                        <td>
                            <div class="input-group">
                                <div class="input-append date dp" id="dp4" data-date-format="dd-mm-yyyy">
                                    <input class="span2 form-control form-control-sm" size="16" type="text" placeholder="dd-mm-yyyy" name="expire_date{{$item->id}}" required ><span class="add-on"><i class="fa fa-calender"></i></span>
                                </div>
                                {{-- <input type="date" class="form-control form-control-sm expire_date" placeholder="Date Expired"  name="expire_date{{$item->id}}" required> --}}
                            </div>
                        </td>
                        <td>
                            @if ($item->status == 1 || $item->status == 2)
                            <input type="file" class="f form-control form-control-sm border-0" name="attach_file{{$item->id}}" data-id="{{$item->id}}" 
                            id="attach_file{{$item->id}}"
                            required>
                            <span class=" form-control form-control-sm border-0" id="attach_files{{$item->id}}" required></span>
                            @endif
                        </td>
                        @else
                        <td><input type="text" class="form-control form-control-sm" name="number{{$item->id}}" placeholder="Enter Number"></td>
                        <td>
                            <div class="input-group" >
                                <div class="input-append date dp" id="dp5" data-date-format="dd-mm-yyyy">
                                    <input class="span2 form-control form-control-sm" size="16" type="text" placeholder="dd-mm-yyyy" name="date_issue{{$item->id}}"  ><span class="add-on"><i class="fa fa-calender"></i></span>
                                </div>
                                {{-- <input type="date" class="form-control form-control-sm issue_date" placeholder="Date Issue"  name="date_issue{{$item->id}}"> --}}
                            </div>
                        </td>
                
                        <td>
                            <div class="input-group">
                                <div class="input-append date dp" id="dp6" data-date-format="dd-mm-yyyy">
                                    <input class="span2 form-control form-control-sm" size="16" type="text" placeholder="dd-mm-yyyy" name="expire_date{{$item->id}}"  ><span class="add-on"><i class="fa fa-calender"></i></span>
                                </div>
                                {{-- <input type="date" class="form-control form-control-sm expire_date" placeholder="Date Expired"  name="expire_date{{$item->id}}"> --}}
                            </div>
                        </td>
                        <td>
                            @if ($item->status == 1 || $item->status == 2)
                            <input type="file" class="f form-control form-control-sm border-0" name="attach_file{{$item->id}}" data-id="{{$item->id}}" 
                            id="attach_file{{$item->id}}"
                            >
                            <span class=" form-control form-control-sm border-0" id="attach_files{{$item->id}}"></span>
                            @endif
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
    {{-- **************************seaman's Document********************************* --}}
    <div class="row mt-3 mb-3">
        <div class="col-md-12 col-sm-12 col-xs-12 py-2" style="background-color:#dff0d8">
            <div class="text-center">
                <h4 class="text-uppercase text-second-color">Previous Sea Service</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="repeater">
                    <div class="row">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="float-right">
                                <input data-repeater-create class="btn btn-success" type="button" value="Add Vessel"/>
                            </div>
                        </div>
                    </div>
                
                        <div data-repeater-list="sea_services">
                            {{-- {{dd(count($seaservices))}} --}}
                            {{-- <table class="table table-borderless table-sm">
                                <thead>
                                    <tr> --}}
                                    {{-- <div class="row">
                                        <div class="col-md-1"> Name of Vessel</div>
                                        <div class="col">Rank</div>
                                        <div class="col">Type</div>
                                        <div class="col">GRT</div>
                                        <div class="col">BHP</div>
                                        <div class="col">Main Engine</div>
                                        <div class="col">Sign On</div>
                                        <div class="col"></div>
                                        <div class="col-md-1">Sign Off</div>
                                        <div class="col"></div>
                                        <div class="col">Service Onboard</div>
                                        <div class="col">Ship Owner</div>
                                        <div class="col"></div>
                                    </div><hr> --}}
                                    {{-- </tr>
                                </thead>
                            </table> --}}
                            <div data-repeater-item>
                                <div class="row">
                                    <div class="col pr-0 form-group" >
                                        <div class="col"> Name of Vessel</div>
                                        <input type="text" class="form-control form-control-sm" name="name_of_vessel" style="width: 5rem">
                                    </div>
                                    <div class="col pr-0 form-group">
                                        <div class="col">Rank</div><br>
                                        <input type="text" class="form-control form-control-sm" name="rank">
                                    </div>
                                    <div class="col pr-0 form-group">
                                        <div class="col">Type</div><br>
                                        <select class="form-control form-control-sm " name="vessel_id" required>
                                            <option value="0">Type</option>
                                            @foreach ($vessels as $item)
                                                <option value="{{$item->id}}">{{$item->vsl_name}}</option>
                                            @endforeach
                                            </select>
                                        </select>
                                    </div>
                                    <div class="col pr-0 form-group">
                                        <div class="col">GRT</div><br>
                                        <input type="text" class="form-control form-control-sm" name="grt" >
                                    </div>
                                    <div class="col pr-0 form-group">
                                        <div class="col">BHP</div><br>
                                        <input type="text" class="form-control form-control-sm" name="bph" >
                                    </div>
                                    <div class="col pr-0 form-group">
                                        <div class="col">Main Engine</div>
                                        <input type="text" class="form-control form-control-sm" name="main_engine" >
                                    </div>
                                    <div class="col pr-0 form-group">
                                        <div class="col">Sign On</div><br>
                                        <div class="input-append date dp" id="dp5" data-date-format="dd-mm-yyyy">
                                            <input class="span2 form-control form-control-sm" size="16" type="text" placeholder="dd-mm-yyyy" name="sign_on_date" id="sign_on_date"><span class="add-on"><i class="fa fa-calender"></i></span>
                                        </div>
                                        {{-- <input type="date" class="form-control form-control-sm" name="sign_on_date" id="sign_on_date"> --}}
                                    </div>
                                    <div class="col pr-0 form-group" >
                                        <div class="col">Sign Off</div><br>
                                        <div class="input-append date dp" id="dp5" data-date-format="dd-mm-yyyy">
                                            <input class="span2 form-control form-control-sm" size="16" type="text" placeholder="dd-mm-yyyy" name="sign_off_date" id="sign_off_date"><span class="add-on"><i class="fa fa-calender"></i></span>
                                        </div>
                                        {{-- <input type="date" class="form-control form-control-sm" name="sign_off_date" id="sign_off_date" > --}}
                                    </div>
                                    <div class="col pr-0 form-group">
                                        <div class="col">Service Onboard</div>
                                        <input type="text" class="form-control form-control-sm" name="service_onboard" id="service_onboard" >
                                    </div>
                                    <div class="col pr-0 form-group">
                                        <div class="col">Ship Owner</div>
                                        <input type="text" class="form-control form-control-sm" name="ship_owner">
                                    </div>
                                    <div class="col-md-1 pr-0 text-right" style="padding-top:3rem;">
                                        <input data-repeater-delete type="button" value="Remove" class="btn btn-danger btn-sm"/>
                                    </div>
                                </div>
                            </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    {{-- ****************sea service************ --}}

    <div class="row mb-3">
        <div class="col-md-12 col-sm-12 col-xs-12 py-2" style="background-color:#dff0d8">
            <div class="text-center">
                <h4 class="text-uppercase text-second-color">Declarations</h4>
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
                    @foreach ($backgroundinfos as $backgroundinfo)
                    <tr>  
                        <td>{{$backgroundinfo->bg_name}}</td>
                    <td>
                        <div class="form-check">
                        <label class="form-check-label" for="radio1">
                        <input type="radio" class="form-check-input" id="radio1" name="status{{$backgroundinfo->id}}" value="0">
                        </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                        <label class="form-check-label" for="radio2">
                            <input type="radio" class="form-check-input" id="radio2" name="status{{$backgroundinfo->id}}" value="1" checked>
                        </label>
                        </div>
                    </td>
                    <td><input type="text" class="form-control" name="description{{$backgroundinfo->id}}"></td>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="js/repeater.js"></script>
<script src="js/validate.js"></script>
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
            if(id == 1){
                var maxSizeMb = 2;
            }else if(id == 2){
                var maxSizeMb = 2;
            }else if(id == 3){
                var maxSizeMb = 4;
            }else if(id == 31){
                var maxSizeMb = 2;
            }else if(id == 32){
                var maxSizeMb = 2;
            }else if(id == 33){
                var maxSizeMb = 1;
            }else if(id == 34){
                var maxSizeMb = 1;
            }else if(id == 35){
                var maxSizeMb = 2;
            }else if(id == 36){
                var maxSizeMb = 2;
            }else if(id == 37){
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
        $('.repeater').repeater({
       
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
        console.log('data',index,name);
        setItemNo(index);
        // allSum();
    }    
           
  
    function setItemNo(index) { 
        var start_date = $('#sign_on_date'+index).val().split("-").reverse().join("-");
        var end_date = $('#sign_off_date'+index).val().split("-").reverse().join("-");
        var day1 = new Date(start_date);
        var day2 = new Date(end_date);
            console.log('day 1', start_date);
            console.log('day 2', end_date);
            console.log('Day1', day1);
            console.log('Day2', day2);
            var d1= day1,d2= day2;
            if(day1<day2){
                d1= day2;
                d2= day1;
            }
            var m= (d1.getFullYear()-d2.getFullYear())*12+(d1.getMonth()-d2.getMonth());
            console.log('mm',m)
            if(d1.getDate()<d2.getDate()) 
            --m;
            console.log('m',m);
            if(m>0){
                $("#service_onboard"+index).val(m+'M');
            }
   
    }

  </script>
</body>
</html>

