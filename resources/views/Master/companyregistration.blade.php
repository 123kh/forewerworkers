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
                    
                            <h5 class="mb-0 text-primary">Company Resgistration </h5>
{{-- 
                            {{testfunction()}} --}}
                        </div>
                        <hr>
                        <form class="row g-2" action="{{route('master.create_company')}}" method="post">
                            @csrf	
                            <!-- <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Select Date </label>
                                <input type="date" class="form-control" id="inputFirstName" placeholder="Market Open Time"> 
                            </div> -->
                            
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Company Name" name="company_name"> 
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label"> Transit Number </label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Transit Number" name="transit_number"> 
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label"> Institution Number </label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Institution Number" name="institution_number"> 
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label"> Account Number </label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Account Number" name="account_number"> 
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Address</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Address" name="address"> 
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">ZIP</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="ZIP" name="zip"> 
                            </div> 
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Contact Person</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Contact Person" name="contact_person"> 
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Email</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Email" name="email"> 
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Contact Number" name="contact_number"> 
                            </div>
                            <!-- <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Payrun</label>
                                <input type="date" class="form-control" id="inputFirstName" placeholder="Payrun"> 
                            </div>
                            <div class="col-md-1" style="margin-top: 6vh;">
                                <button type="submit" class="btn btn-primary px-3">Add</button>
                            </div> -->
                            
                            <!-- <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">Starting Number</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Starting Number"> 
                            </div> -->
                            <hr>
                            <div class="card-title d-flex align-items-center">
                    
                                <h5 class="mb-0 text-primary">Payout Settings<h5>
                            </div>
                            <!-- <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Select Location</label>
                                <select class="form-select mb-3" aria-label="Default select example">
                                    <option selected>Pune</option>
                                    <option value="1">Nagpur</option>
                                    <option value="2">Amravati</option>
                                    
                                </select>
                            </div> -->
                            <!-- <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Add Location</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="Add Location"> 
                            </div> -->
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Select Categories</label>
                                <select class="form-select mb-3" aria-label="Default select example" id="category" >
                                    <option value="">Select</option>
                                    @foreach ($cat as $cat)
                                    <option value="{{ $cat->id }}">
                                       {{ucWords($cat->add_category)}} </option>
                                    @endforeach
                                   
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Straight pay hours</label>
                                <input type="number" step="0.1" class="form-control" id="straight" placeholder="Straight Pay hours" > 
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Overtime 1.5 pay hours</label>
                                <input type="number" step="0.1" class="form-control" id="overtime1" placeholder="Overtime 1.5 pay hours"> 
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Overtime 2.0 pay hours</label>
                                <input type="number" step="0.1" class="form-control" id="overtime2" placeholder="Overtime 2.0 pay hours" > 
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Night hours pay</label>
                                <input type="number" step="0.1" class="form-control" id="nighthours" placeholder="Night hours pay" > 
                            </div>
                            <div class="col-md-2" style="margin-top: 6vh;" >
                                <button type="button" class="btn btn-primary px-3 add-row">ADD</button>
                            </div>
                            <!-- <div class="row"> -->
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

        @stop
@section('js')
        <script>
            $(document).ready(function() {
            
                $(".add-row").click(function() {
                    var category = $('#category option:selected').text();
                    var straight = $('#straight').val();
                    var overtime1 = $('#overtime1').val();// .text()se text ayega id nh
                    var overtime2 = $('#overtime2').val();
                    var nighthours = $('#nighthours').val();
               
                    var markup =
                            '<tr><td><input type="hidden" value="'+$('#category').val()+'" name="select_categories[]" ><input type="text"  style="border:none; width: 100%;" value="' + category + '"></td><td><input type="text" name="straight_pay_hours[]" required="" style="border:none; width: 100%;" value="' + straight + '"></td><td><input type="text" name="overtime_hours1[]" required="" style="border:none; width: 100%;" value="' + overtime1 + '"></td><td><input type="text" name="overtime_hours2[]" style="border:none; width: 100%;" value="' +
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