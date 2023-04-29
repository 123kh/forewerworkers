@extends('layout')
@section('content')

<style>
    .popup-container {
  position: relative;
}
.popup-content {
  display: none;
  position: absolute;
  z-index: 1;
  top: 100%;
  left: 0;
  background-color: #F9F9F9;
  padding: 10px;
  border: 1px solid #ccc;
}
.popup-container:hover .popup-content {
  display: block;
}
.popup-btn {
  /* background-color: #f2f2f2; */
  color: black;
  border: none;
  padding: 10px;
  cursor: pointer;
}
.popup-btn:hover {
  background-color: #f2f2f2;
}
</style>

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        @include('alerts')

        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center">
                    
                            <h5 class="mb-0 text-primary">Basic Employee Details</h5>
                        </div>
                        <hr>
                        <form class="row g-2" action="{{route('master.create_employee')}}" method="post" enctype="multipart/form-data">
                            @csrf	
                            <!-- <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Select Date </label>
                                <input type="date" class="form-control" id="inputFirstName" placeholder="Market Open Time"> 
                            </div> -->
                            <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">Select Location</label>
                                <select class="form-select mb-3" aria-label="Default select example" name="location_id">
                                    <option value="">Select Location</option>
                                    @foreach ($loc as $location)
                                    <option value="{{ $location->id }}">
                                       {{ucWords($location->location)}} </option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">Employee ID</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Employee ID" name="employee_id"> 
                            </div>
                        
                            <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">Employee Name</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Employee Name" name="employee_name"> 
                            </div>
                            <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">Address</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Address" name="address"> 
                            </div> 
                            <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Contact Number" name="contact_number"> 
                            </div>
                            <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputFirstName" placeholder="Email" name="Email"> 
                            </div>
                            <div class="col-md-3">
                                <label for="formFile" class="form-label">ID Proof</label>
                                <input class="form-control" type="file" id="formFile" name="ID_proof">
                            </div>
                            <!-- <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">ID Proof</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="ID Proof"> 
                            </div> -->
                            <div class="col-md-3">
                                <label for="formFile" class="form-label">Address Proof</label>
                                <input class="form-control" type="file" id="formFile" name="address_proof">
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">DOB</label>
                                <input type="date" class="form-control" id="inputFirstName" placeholder="DOB" name="DOB"> 
                            </div>
                           
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">SIN</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="SIN" name="sin"> 
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">BC DL/ID</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="BC DL/ID" name="bcdl"> 
                            </div>
                            
                            <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">Bank Name</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Bank Name" name="bank_name"> 
                            </div>
                            <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">Account Number</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Account Number" name="account_number"> 
                            </div>
                            <div class="col-md-4">
                                <label for="inputAddress" class="form-label">Bank Details</label>
                                <textarea class="form-control" id="inputAddress" placeholder="Bank Details..." rows="2" name="bank_details"></textarea>
                            </div>
                            <!-- <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">Bank Details</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Bank Details"> 
                            </div> -->

                            <hr>
                            <div class="card-title d-flex align-items-center">
                    
                                <h5 class="mb-0 text-primary">Employee Payout</h5>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked name="Job_Acceptreject" value="1">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Job Accept/Reject</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked name="Show_Hide" value="1">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Show/ Hide Total Pay</label>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-top: 2vh;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="Only_Straight_hours" name="Only_Straight_hours">
                                    <label class="form-check-label" for="flexCheckDefault">Only Straight hours applicable</label>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            
                           
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Select Categories</label>
                                <select class="form-select mb-3" aria-label="Default select example" id="category" name="select_categories">
                                    <option value="">Select</option>
                                    @foreach ($cat as $cat)
                                    <option value="{{ $cat->id }}">
                                       {{ucWords($cat->add_category)}} </option>
                                    @endforeach
                                   
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Straight pay/hours</label>
                                <input type="number" step="0.001" class="form-control" id="straight" placeholder="Straight Pay hours" > 
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Overtime 1.5 pay/hours</label>
                                <input type="number" step="0.001" class="form-control" id="overtime1" placeholder="Overtime 1.5 pay hours"> 
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Overtime 2.0 pay/hours</label>
                                <input type="number" step="0.001" class="form-control" id="overtime2" placeholder="Overtime 2.0 pay hours" > 
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Night pay/hours</label>
                                <input type="number" step="0.001" class="form-control" id="nighthours" placeholder="Night hours pay" > 
                            </div>
                            <div class="col-md-2" style="margin-top: 6vh;" >
                                <button type="button" class="btn btn-primary px-3 add-row">ADD</button>
                            </div>
                            <div class="row d-none" id="payout_category_error">
                                <p class="error">The same payout category can not be added again.
                                <p>
                            </div>
                            <div class="col-xl-12 mx-auto">
                                
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    {{-- <th scope="col">Sr.No.</th> --}}
                                                    <!-- <th scope="col">Selected Location</th> -->
                                                    <th scope="col">Selected Categories</th>
                                                    <th scope="col">Straight pay/hours</th>
                                                    <th scope="col">Overtime 1.5 pay/hours</th>
                                                    <th scope="col">Overtime 2.0 pay/hours</th>
                                                    <th scope="col">Night pay/hours</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="add_more">
                                               
                                                {{-- <tr>
                                                    <th scope="row">2</th>
                                                    <!-- <td>Pune</td> -->
                                                    <td>10</td>
                                                    <td>20</td>
                                                    <td>20</td>
                                                    <td>20</td>
                                                    <td>
                                                        {{-- <button type="button" class="btn1 btn-outline-primary"><i class='bx bx-edit-alt me-0'></i></button> --}}
                                                        {{-- <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> 
                                                    </td>
                                                </tr> --}} 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            
                            </div>
                        <!-- </div> -->
                        <!-- <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Only Straight hours applicable</label>
                            </div>
                        </div> -->
                        
                        <div class="col-md-12" style="margin-top: 5px;text-align: right;" >
                            <button type="submit" class="btn btn-primary px-3">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Location</th>
                            <th>Employee ID</th>  
                        <th>Employee Name</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>ID Proof</th>
                            <th>Address Proof</th>
                            <th>DOB</th>
                            <th>SIN</th>
                            <th>BC DL/ID</th>
                            <th>Bank Name</th>
                            <th>Account Number</th>
                            <th>Bank Details</th>
                            <th style="background-color:#fff;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                        <tr>
                           
                            <td>{{$loop->iteration}}</td>
                            <td>{{$employee->location_name}}</td>
                            <td>{{$employee->employee_id}}</td>
                            <td>{{$employee->employee_name}}</td>
                            <td>{{$employee->address}}</td>
                            <td>{{$employee->contact_number}}</td>
                            <td>{{$employee->Email}}</td>
                            <td>{{$employee->ID_proof}}</td>
                            <td>{{$employee->address_proof}}</td>
                            <td>{{$employee->DOB}}</td>
                            <td>{{$employee->sin}}</td>
                            <td>{{$employee->bcdl}}</td>
                            <td>{{$employee->bank_name}}</td>
                            <td>{{$employee->account_number}}</td>
                            <td>{{$employee->bank_details}}</td>
                            
                            <td style="background-color:#fff;">
                                <button type="button" class="btn1 btn-outline-primary"><i class='fadeIn animated bx bx-message-add' data-bs-toggle="modal" data-bs-target="#exampleLargeModal"></i></button>
                                <button type="button" class="btn1 btn-outline-primary"><i class='bx bx-edit-alt me-0'></i></button>
                                <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> 
                            </td>
                        </tr>
                        @endforeach
                    
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!--end page wrapper -->

   
                    </div>

                </div>
           
        
        

        
        <!--end page wrapper -->

@stop
@section('js')
        <script>
            $(document).ready(function() {
                
                $("#straight").keyup(function() {
                    if(!$("#Only_Straight_hours").is(':checked')) {
                        $("#overtime1").val(parseFloat($("#straight").val()*1.5));
                    $("#overtime2").val(parseFloat($("#straight").val()*2));
                    $("#nighthours").val(parseFloat($("#straight").val()*2));
                    }
                })

                $("#Only_Straight_hours").change(function() {
                    if(this.checked) {
                        $("#overtime1,#overtime2,#nighthours").val('');
                        $("#overtime1,#overtime2,#nighthours").attr('readonly','readonly');
                        
                    }else{
                        $("#overtime1,#overtime2,#nighthours").removeAttr('readonly');
                        if($("#straight").val()){
                            $("#overtime1").val(parseFloat($("#straight").val()*1.5));
                    $("#overtime2").val(parseFloat($("#straight").val()*2));
                    $("#nighthours").val(parseFloat($("#straight").val()*2));
                        }
                    }
                })
                let payout_categories=[];
                $(".add-row").click(function() {
                    if (payout_categories.includes($('#category').val())) {
                        $("#payout_category_error").removeClass('d-none');
                    } else {
                        payout_categories.push($('#category').val());

                        $("#payout_category_error").addClass('d-none');
                    var category = $('#category option:selected').text().trim().replace(/\d+/g, "");
                    var straight = $('#straight').val();
                    var overtime1 = $('#overtime1').val();// .text()se text ayega id nh
                    var overtime2 = $('#overtime2').val();
                    var nighthours = $('#nighthours').val();
               
                    var markup =
            
                            '<tr><td><input type="hidden" name="select_categories[]" value="'+$('#category').val()+'"><input type="text"  style="border:none; width: 100%;" value="' + category + '"></td><td><input type="text" name="straight_pay_hours[]" style="border:none; width: 100%;" value="' + straight + '"></td><td><input type="text" name="overtime_hours1[]" style="border:none; width: 100%;" value="' + overtime1 + '"></td><td><input type="text" name="overtime_hours2[]" style="border:none; width: 100%;" value="' +
                            overtime2 +
                            '"></td><td><input type="text" name="night_hours_pay[]" style="border:none; width: 100%" value="' + nighthours + '"></td><td><button type="button" class="btn1 btn-outline-danger delete-row"><i class="bx bx-trash me-0"></i></button></td></tr>';
            
                        $(".add_more").append(markup);
              
                       $('#category').val('');
                       $('#straight').val('');
                       $('#overtime1').val('');
                        $('#overtime2').val('');
                        $('#nighthours').val('');
                    }
                    }
                    
                )
                // Find and remove selected table rows
                $("tbody").delegate(".delete-row", "click", function() {
                    var mpsqnty=$(this).parents("tr").find('input[name="mpsqnty[]"]').val()
                    var ptrqnty=$(this).parents("tr").find('input[name="ptrqnty[]"]').val()
            
                    var grandtotal1 =$('#grandtotal1').val();
                    var grandtotal2 =$('#grandtotal2').val();
            
                    var total1= parseFloat(grandtotal1)-parseFloat(mpsqnty)
                    var total2= parseFloat(grandtotal2)-parseFloat(ptrqnty)
                    $('#grandtotal1').val(total1);
                    $('#grandtotal2').val(total2);
            
                    $(this).parents("tr").remove();
            
                    // final_calculations();
            
            
                });
            })
        </script>
                @stop