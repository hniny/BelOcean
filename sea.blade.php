 <div class="row mb-3">
    <div class="col-md-12 col-sm-12 col-xs-12 py-2" style="background-color:#dff0d8">
        <div class="text-center">
            <h4>Seaman's Documents</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <table class="table table-borderless">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Holding Certificates</th>
                <th scope="col">Number</th>
                <th scope="col">Date of Issues</th>
                <th scope="col">Date of Expire</th>
              </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 30; $i++)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td width="40%">Passport ( PP)</td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="date" class="form-control"></td>
                    <td><input type="date" class="form-control"></td>
                  </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
      

{{-- ****************seaman documents************ --}}

<div class="row mb-3">
    <div class="col-md-12 col-sm-12 col-xs-12 py-2" style="background-color:#dff0d8">
        <div class="text-center">
            <h4>Previous Sea Service</h4>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="repeater">
            
                <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                    <div class="float-right">
                      <input data-repeater-create class="btn btn-success" type="button" value="Add Vessel"/>
                    </div>
                </div>
              <div data-repeater-list="contact_persons">
                <div data-repeater-item>
                  <div class="form-row col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-borderless">
                        <thead>
                          <tr class="text-center">
                            <th scope="col">Name of Vessel</th>
                            <th scope="col">Rank</th>
                            <th scope="col" width="20%">Type</th>
                            <th scope="col">GRT</th>
                            <th scope="col">BHP</th>
                            <th scope="col">Main Engin</th>
                            <th scope="col" width="20px">Sign on</th>
                            <th scope="col">Sign off</th>
                            <th scope="col">Service Onboard</th>
                            <th scope="col">Ship Owner</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td width="20%"><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                            <td> <select class="form-control form-control-sm ">
                                <option>Tanker</option>
                                <option>Container</option>
                                <option>Bulk</option>  
                              </select></td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                            <td><input type="date" class="form-control form-control-sm"></td>
                            <td><input type="date" class="form-control form-control-sm"></td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                            <td><input data-repeater-delete class="btn btn-sm btn-danger" type="button" value="Remove" /></td>
                          </tr>
                        </tbody>
                    </table>    
                       
                  </div>
                </div>
              </div>

            </div>
        </div> 
    </div>
{{-- ****************personalinfos************ --}}

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
                @for ($i = 1; $i <= 8; $i++)
                <tr>          
                    <td >Have previous injuries or sickness?</td>
                    <td>
                      <div class="form-check">
                        <label class="form-check-label" for="radio2">
                          <input type="radio" class="form-check-input" id="radio2" name="optradio1" value="option2">
                        </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                        <label class="form-check-label" for="radio1">
                          <input type="radio" class="form-check-input" id="radio1" name="optradio1" value="option1" checked>
                        </label>
                      </div>
                    </td>
                    <td><input type="text" class="form-control"></td>
                  </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
{{-- **************************declaration*********************** --}}