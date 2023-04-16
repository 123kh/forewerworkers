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
                                <select class="form-select mb-3" aria-label="Default select example" name="select_location">
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
                                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="Only_Straight_hours">
                                    <label class="form-check-label" for="flexCheckDefault">Only Straight hours applicable</label>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            
                            <!-- <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Select Location</label>
                                <select class="form-select mb-3" aria-label="Default select example">
                                    <option selected>Pune</option>
                                    <option value="1">Nagpur</option>
                                    <option value="2">Amravati</option>
                                </select>
                            </div> -->
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
                                <label for="inputFirstName" class="form-label">Straight pay hours</label>
                                <input type="number" step="0.001" class="form-control" id="straight" placeholder="Straight Pay hours" > 
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Overtime 1.5 pay hours</label>
                                <input type="number" step="0.001" class="form-control" id="overtime1" placeholder="Overtime 1.5 pay hours"> 
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Overtime 2.0 pay hours</label>
                                <input type="number" step="0.001" class="form-control" id="overtime2" placeholder="Overtime 2.0 pay hours" > 
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Night hours pay</label>
                                <input type="number" step="0.001" class="form-control" id="nighthours" placeholder="Night hours pay" > 
                            </div>
                            <div class="col-md-2" style="margin-top: 6vh;" >
                                <button type="button" class="btn btn-primary px-3 add-row">ADD</button>
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
                                                    <th scope="col">Straight pay hours</th>
                                                    <th scope="col">Overtime 1.5 pay hours</th>
                                                    <th scope="col">Overtime 2.0 pay hours</th>
                                                    <th scope="col">Night hours pay</th>
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
    

    
    <!--end page wrapper -->

                        </form>

                    </div>

                </div>
            </div>
        </div>
        

        
        <!--end page wrapper -->

@stop
@section('js')
        <script>
            $(document).ready(function() {
            
                $(".add-row").click(function() {
                    var category = $('#category option:selected').text().trim();//trim function se space jata hai
                    var straight = $('#straight').val();
                    var overtime1 = $('#overtime1').val();// .text()se text ayega id nh
                    var overtime2 = $('#overtime2').val();
                    var nighthours = $('#nighthours').val();
               
                    var markup =
            
                            '<tr><td><input type="hidden" name="select_categories[]" value="'+$('#category').val()+'"><input type="text"  required="" style="border:none; width: 100%;" value="' + category + '"></td><td><input type="text" name="straight_pay_hours[]" required="" style="border:none; width: 100%;" value="' + straight + '"></td><td><input type="text" name="overtime_hours1[]" required="" style="border:none; width: 100%;" value="' + overtime1 + '"></td><td><input type="text" name="overtime_hours2[]" style="border:none; width: 100%;" value="' +
                            overtime2 +
                            '"></td><td><input type="text" name="night_hours_pay[]" required="" style="border:none; width: 100%" value="' + nighthours + '"></td><td><button type="button" class="btn1 btn-outline-danger delete-row"><i class="bx bx-trash me-0"></i></button></td></tr>';
            
            
                           
                        $(".add_more").append(markup);
              
                       $('#category').val('');
                       $('#straight').val('');
                       $('#overtime1').val('');
                      
                        $('#overtime2').val('');
                        $('#nighthours').val('');
                       
                        
                
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